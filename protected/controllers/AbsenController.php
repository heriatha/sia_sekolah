<?php

class AbsenController extends MyController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
//			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','listAbsenByAdmin','listAbsenByGuru','absenSiswaHariIni'),
				'expression' => 'Yii::app()->user->isAdmin()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('absenSiswaHariIni','listAbsenByGuru'),
				'expression' => 'Yii::app()->user->isGuru()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                $model=new Absen('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('view',array(
			'viewModel'=>$this->loadModel($id),'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Absen;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Absen']))
		{
			$model->attributes=$_POST['Absen'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Absen','create');
			if($is_success){
				$this->redirect(array('view','id'=>$model->id));
                        }else{
                            $this->render('create',array(
                                    'model'=>$model
                            ));
                        }
		}else{
                    if($_GET['ajax'])
                        $this->renderModal('create',array(
                                'model'=>$model,
                        ));
                    else
                        $this->render('create',array(
                                'model'=>$model,
                        ));
                }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Absen']))
		{
			$model->attributes=$_POST['Absen'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Absen','update');
			if($is_success)
				$this->redirect(array('view','id'=>$model->id));
		}
                if($_GET['ajax'])
                    $this->renderModal('update',array(
                            'model'=>$model,
                    ));
                else{
                    $this->render('update',array(
                                    'model'=>$model
                            ));
                }
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                $is_success=$this->loadModel($id)->delete();
                $this->notice($is_success,'Absen','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Absen');
		//$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		//));
                $this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Absen('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Absen']))
			$model->attributes=$_GET['Absen'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Absen::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='absen-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        function actionAbsenSiswaHariIni($id_kelas_aktif=null,$id_absen=null,$tanggal=null){
            if($tanggal==null){
                $tanggal=date('d/m/Y');
            }
            if($_POST){
                $absen=  Absen::model()->getAbsenByTanggal($this->date2mysql($_POST['tanggal']));
                $isSuccess= Absen::model()->absenSiswa($absen['id'],$_POST['absenSiswa']);
                $this->notice($isSuccess, "Absen Siswa", 'update');
                $id_absen=$absen['id'];
//                $this->show_array($_POST);
            }
            if($id_kelas_aktif==null){
                $tahunAjaran= TahunAjaran::model()->getTahunAjaranAktif();
                $userId     = Yii::app()->user->getUserId();
                $guru       = Guru::model()->findByAttributes(array('id_user'=>$userId));
                $kelasAktif = KelasAktif::model()->findByAttributes(array('id_guru_walikelas'=>$guru->id,'id_tahun_ajaran'=>$tahunAjaran['id']));
                $kelasAktif = KelasAktif::model()->getKelasAktif($kelasAktif->id);
            }else{
                $kelasAktif = KelasAktif::model()->getKelasAktif($id_kelas_aktif);
            }
            
            if($id_absen==null){
                $absen= Absen::model()->getAbsenByTanggal($this->date2mysql($tanggal));
                $id_absen=$absen['id'];
            }else{
                $absen= Absen::model()->findByPk($id_absen);
                $tanggal=$this->datefmysql($absen['tanggal']);
            }
            $data['tanggal']   =$tanggal;
            $data['idAbsen']   =$id_absen; 
            $data['kelasAktif']=$kelasAktif;
            $data['siswaList'] = Rapor::model()->getRaporByKelasAktif($kelasAktif['id']);
            $data['id_kelas_aktif']=$kelasAktif->id;
            $this->render('absenSiswaHariIni',$data);
        }
        public function actionListAbsenByGuru($id_kelas_aktif=null)
	{
                $tahunAjaran= TahunAjaran::model()->getTahunAjaranAktif();
                if($id_kelas_aktif==null){
                    $userId     = Yii::app()->user->getUserId();
                    $guru       = Guru::model()->findByAttributes(array('id_user'=>$userId));
                    $kelasAktif = KelasAktif::model()->findByAttributes(array('id_guru_walikelas'=>$guru->id,'id_tahun_ajaran'=>$tahunAjaran['id']));
                    $kelasAktif = KelasAktif::model()->getKelasAktif($kelasAktif->id);
                }else{
                    $kelasAktif = KelasAktif::model()->getKelasAktif($id_kelas_aktif);
                    $guru       = Guru::model()->findByPk($kelasAktif['id_guru_walikelas']);
                }
                $data['isAdmin']   =  Yii::app()->user->isAdmin();
                if($data['isAdmin']){
                    $data['kelasAktifList'] =  KelasAktif::model()->getKelasByTahunAjaran($tahunAjaran['id']);
                }
                $data['kelasAktif']=$kelasAktif;
		$model=new Absen('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Absen']))
			$model->attributes=$_GET['Absen'];
                
                $model->id_tahun_ajaran=$tahunAjaran;
                $data['model']=$model;
		$this->render('listAbsenByGuru',$data);
	}
        public function actionListAbsenByAdmin(){
            $tahunAjaran= TahunAjaran::model()->getTahunAjaranAktif();
            $data['kelasAktif'] =  KelasAktif::model()->getKelasByTahunAjaran($tahunAjaran['id']);
            $this->render('listAbsenByAdmin',$data);
        }
}

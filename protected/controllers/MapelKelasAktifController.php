<?php

class MapelKelasAktifController extends MyController
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','delete','viewMapelByKelasAktif','setGuruMapel','nilaiSiswa'),
                                'expression' => 'Yii::app()->user->isAdmin()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('nilaiSiswa'),
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
                $model=new MapelKelasAktif('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('view',array(
			'viewModel'=>$this->loadModel($id),'model'=>$model,
		));
	}
        public function actionViewMapelByKelasAktif($id_kelas_aktif){
            $model=new MapelKelasAktif();
            $data['data']=$model->getMapelByKelasAktif($id_kelas_aktif);
            $kelasAktifModel=new KelasAktif();
            $data['kelas']=$kelasAktifModel->getKelasAktif($id_kelas_aktif);
            $tahunAjaranModel=new TahunAjaran();
            $data['tahunAjaran']=$tahunAjaranModel->getTahunAjaranById($data['kelas']['id_tahun_ajaran']);
            $guruModel=new Guru();
            $data['guruList']   =$guruModel->getGuru();
            $data['id_kelas_aktif']=$id_kelas_aktif;
            $this->render('viewMapelByKelasAktif',$data);
            
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MapelKelasAktif;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MapelKelasAktif']))
		{
			$model->attributes=$_POST['MapelKelasAktif'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Mapel Kelas Aktif','create');
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

		if(isset($_POST['MapelKelasAktif']))
		{
			$model->attributes=$_POST['MapelKelasAktif'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Mapel Kelas Aktif','update');
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
                $this->notice($is_success,'Mapel Kelas Aktif','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('MapelKelasAktif');
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
		$model=new MapelKelasAktif('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MapelKelasAktif']))
			$model->attributes=$_GET['MapelKelasAktif'];

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
		$model=MapelKelasAktif::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        public function actionSetGuruMapel($id_kelas_aktif){
            $mapelAktifModel=new MapelKelasAktif();
            $mapelAktifModel->setGuruMapel($_POST['pengampu']);
            $this->redirect(array('mapelKelasAktif/viewMapelByKelasAktif','id_kelas_aktif'=>$id_kelas_aktif));
        }
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mapel-kelas-aktif-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionNilaiSiswa($id_mapel_kelas_aktif=null){
            $guruModel=new Guru();
            $nilaiSiswaModel=new NilaiSiswa();
            $raporModel=new Rapor();
            $mapelAktifModel=new MapelKelasAktif();
            if($_POST){
                $this->notice(NilaiSiswa::model()->simpanNilai($_POST['nilai']), 'Nilai Siswa', 'update');
            }
            $tahunAjaranAktif               = TahunAjaran::model()->getTahunAjaranAktif();
            $data['id_mapel_kelas_aktif']   = $id_mapel_kelas_aktif;
            if($id_mapel_kelas_aktif!=null)
                $data['siswaList']              = NilaiSiswa::model()->getNilaiSiswaByMapel($id_mapel_kelas_aktif);
            else
                $data['siswaList']              = array();
            $data['pengampu']               = $guruModel->findByUser(Yii::app()->user->getUserId());
            $data['mapelDiampu']            = $mapelAktifModel->getMapelByGuruPengampu($data['pengampu']['id'], $tahunAjaranAktif['id']);
            $this->render('nilaiSiswa',$data);
        }
}

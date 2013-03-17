<?php

class KelasAktifController extends MyController
{
    var $kelasModel;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

        function __construct($id, $module = null) {
            parent::__construct($id, $module);
            $this->kelasModel=new KelasAktif();
        }
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
				'actions'=>array('admin','delete','viewByTahunAjaran','tambahSiswa'),
				'expression' => 'Yii::app()->user->isAdmin()',
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
                $viewModel=$this->loadModel($id);
                $model=new KelasAktif('search');
		$model->unsetAttributes();  // clear any default values
                $model->attributes=array('id_tahun_ajaran'=>$viewModel->id_tahun_ajaran);
		$this->render('view',array(
			'viewModel'=>$viewModel,'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id_tahun_ajaran) {
            $model = new KelasAktif;
            $model->id_tahun_ajaran=$id_tahun_ajaran;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            $tahunAjaran= TahunAjaran::model()->findByPk($id_tahun_ajaran);
            $semester   = Semester::model()->findByPk($tahunAjaran['id_semester']);
            if (isset($_POST['KelasAktif'])) {
                $kelas=Kelas::model()->getKelas($_POST['id_tingkat_kelas'], $_POST['id_semester'], $_POST['id_kurikulum']);
                $model->id_kelas   = $kelas['id'];
                $model->attributes = $_POST['KelasAktif'];
                $is_success = $model->save();
                $this->notice($is_success, 'Kelas Aktif', 'create');
                if ($is_success) {
                    $this->redirect(array('view', 'id' => $model->id));
                } else {
                    $this->render('create', array(
                        'model' => $model,
                        'tahunAjaran'=>$tahunAjaran,
                        'semester'=>$semester,
                    ));
                }
            } else {
                if ($_GET['ajax'])
                    $this->renderModal('create', array(
                        'model' => $model,
                        'tahunAjaran'=>$tahunAjaran,
                        'semester'=>$semester,
                    ));
                else
                    $this->render('create', array(
                        'model' => $model,
                        'tahunAjaran'=>$tahunAjaran,
                        'semester'=>$semester,
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

		if(isset($_POST['KelasAktif']))
		{
			$model->attributes=$_POST['KelasAktif'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Kelas Aktif','update');
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
                $model=$this->loadModel($id);
                $idTahunAjaran=$model->id_tahun_ajaran;
                $is_success=$model->delete();
                $this->notice($is_success,'Kelas Aktif','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('KelasAktif');
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
		$model=new KelasAktif('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KelasAktif']))
			$model->attributes=$_GET['KelasAktif'];
                
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
		$model=KelasAktif::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='kelas-aktif-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionViewByTahunAjaran($id_tahun_ajaran){
            $data['id_tahun_ajaran']    = $id_tahun_ajaran;
            $data['kelasList']          = $this->kelasModel->getKelasByTahunAjaran($id_tahun_ajaran);
            $this->render('viewByTahunAjaran', $data);
        }
        public function actionTambahSiswa($id_kelas_aktif,$id_kelas_aktif_asal=-1){
            $siswaModel=new Siswa();
            $kelasAktifModel=new KelasAktif();
            $tahunAjaranModel=new TahunAjaran();
            
            if(isset($_POST['tambahSiswa'])){
                $this->notice($kelasAktifModel->tambahSiswa($id_kelas_aktif, $_POST['tambahSiswa']), 'Menambahkan siswa', 'insert');
            }
            $data['id_kelas_aktif_asal']=$id_kelas_aktif_asal;
            $data['id_kelas_aktif']=$id_kelas_aktif;
            
            $tahunAjaran=$tahunAjaranModel->getTahunAjaranAktif();
            
            $data['asalKelasAktif'] =$kelasAktifModel->getKelasByTahunAjaran($tahunAjaran['id']);
            $data['kelasTujuan']    =$kelasAktifModel->getKelasAktif($id_kelas_aktif);
            
            $data['siswaKelasAktif']=$siswaModel->getSiswaByKelasAktif($id_kelas_aktif);
            if($id_kelas_aktif_asal!=-1)
                $data['siswaKelasLama'] =$siswaModel->getSiswaByKelasAktif($id_kelas_aktif_asal,$kelasAktifModel->findByPk($id_kelas_aktif)->id_tahun_ajaran);
            else{
                $data['siswaKelasLama'] =$siswaModel->getSiswaBaru($data['kelasTujuan']['id_tingkat_kelas']);
            }
            
            $this->render('tambahSiswa',$data);
        }
}
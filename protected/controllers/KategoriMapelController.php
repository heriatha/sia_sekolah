<?php

class KategoriMapelController extends MyController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $kategoriModel;
        function __construct($id, $module = null) {
            parent::__construct($id, $module);
            $this->kategoriModel=new KategoriMapel();
        }

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
				'actions'=>array('admin','delete','CobaGridView','viewByKurikulum','loadMapel','pilihMapel',
                                    'tambahMapel','hapusMapel'),
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
                $model=new KategoriMapel('search');
		$model->unsetAttributes();  // clear any default values
		$this->render('view',array(
			'viewModel'=>$this->loadModel($id),'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id_kurikulum=null,$id_kategori=null)
	{
		$model=new KategoriMapel;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KategoriMapel']))
		{
			$model->attributes=$_POST['KategoriMapel'];
			if($model->save())
				$this->redirect(array('viewByKurikulum','id_kurikulum'=>$model->id_kurikulum));
                        else{
                            $this->render('create',array(
                                    'model'=>$model
                            ));
                        }
		}else{
                    if($id_kategori!=null){
                        $parentModel    = new KategoriMapel();
                        $parentKategori = $parentModel->findByPk($id_kategori);
                        $id_kurikulum   = $parentKategori['id_kurikulum'];
                    }
                    $model->id_kategori_parent=$id_kategori;
                    $model->id_kurikulum=$id_kurikulum;
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

		if(isset($_POST['KategoriMapel']))
		{
			$model->attributes=$_POST['KategoriMapel'];
			if($model->save())
				$this->redirect(array('viewByKurikulum','id_kurikulum'=>$model->id_kurikulum));
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
                $id_kurikulum=$model->id_kurikulum;
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('viewByKurikulum','id_kurikulum'=>$id_kurikulum));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('KategoriMapel');
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
		$model=new KategoriMapel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KategoriMapel']))
			$model->attributes=$_GET['KategoriMapel'];

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
		$model=KategoriMapel::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='kategori-mapel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionCobaGridView(){
             $model=new KategoriMapel;

            $this->render('cobaGridView', array('model' => $model));
        }
        
        public function actionViewByKurikulum($id_kurikulum){
            $kurikulum          = new Kurikulum();
            $data['kurikulum']  = $kurikulum->findByPk($id_kurikulum);
            
            $data['kategori']   = $this->kategoriModel->getKategoriByKurikulum($id_kurikulum);
            $this->renderRootContent('viewByKurikulum', $data);
        }
        
        public function actionLoadMapel($id_kurikulum=null,$id_kategori=null){
            $mapel=new Mapel();
            if($id_kategori!=null){
                $data['mapel']          = $mapel->getMapelByIdKategori($id_kategori);
                $kategori               = KategoriMapel::model()->findByPk($id_kategori);
                $data['id_kurikulum']   = $kategori['id_kurikulum'];
                $data['id_kategori']    = $id_kategori;
            }else if($id_kurikulum!=null && $id_kategori==null){
                //tanpa kategori
                $data['id_kurikulum']   =$id_kurikulum;
                $data['id_kategori']    = null;
                $data['mapel']          =$mapel->getMapelUncategoriesByIdKurikulum($id_kurikulum);
            }else{
                echo "data gagal di buka";
            }
            $this->renderModal('loadMapel', $data);
        }
        
        public function actionPilihMapel($id_kurikulum=null,$id_kategori=NULL){
            $mapelModel             = new Mapel();
            $data['pilihanMapel']   =$mapelModel->pilihanMapel($id_kurikulum);
            $data['id_kurikulum']   =$id_kurikulum;
            $data['id_kategori']    =$id_kategori;
            $this->renderModal('pilihMapel',$data);
        }
        
        public function actionTambahMapel($id_kurikulum=null,$id_kategori=null){
            $kategoriModel  = new KategoriMapel();
            if($id_kurikulum==null){
                $kategori=$kategoriModel->findByPk($id_kategori);
                $id_kurikulum=$kategori['id_kurikulum'];
            }
            $is_success=$kategoriModel->tambahMapel($_POST['mapel'],$id_kurikulum,$id_kategori);
            $this->notice($is_success, "matapelajaran", 'insert');
            $this->redirect(Yii::app()->createUrl('kategoriMapel/loadMapel',array('id_kategori'=>$id_kategori,'id_kurikulum'=>$id_kurikulum)));
        }
        public function actionHapusMapel($id_kurikulum,$id_kategori,$id_mapel){
            $kategoriModel  = new KategoriMapel();
            $is_success=$kategoriModel->hapusMapel($id_kurikulum,$id_kategori,$id_mapel);
            $this->notice($is_success, "matapelajaran", 'delete');
            $this->redirect(Yii::app()->createUrl('kategoriMapel/loadMapel',array('id_kategori'=>$id_kategori,'id_kurikulum'=>$id_kurikulum)));
        }
}

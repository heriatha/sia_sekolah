<?php

class KelasController extends MyController
{
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
				'actions'=>array('admin','delete','viewByKurikulum','loadMapel',
                                    'pilihMapel','tambahMapel','hapusMapel'),
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
                $model=new Kelas('search');
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
		$model=new Kelas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kelas']))
		{
			$model->attributes=$_POST['Kelas'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Kelas','create');
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

		if(isset($_POST['Kelas']))
		{
			$model->attributes=$_POST['Kelas'];
                        $is_success=$model->save();
                        $this->notice($is_success,'Kelas','update');
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
                $this->notice($is_success,'Kelas','delete');
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Kelas');
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
		$model=new Kelas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kelas']))
			$model->attributes=$_GET['Kelas'];

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
		$model=Kelas::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='kelas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        function actionViewByKurikulum($id_kurikulum){
            $data['view']           = 'viewByKurikulum';
            $data['tingkatKelas']  = TingkatKelas::model()->findAll();
            $data['semester']       = Semester::model()->findAll();
            $data['id_kurikulum']   = $id_kurikulum;
            $this->renderRootContent('viewByKurikulum', $data);
        }
        function actionLoadMapel($id_kurikulum=null,$id_tingkat_kelas=null,$id_semester=null,$id_kelas=null){
            $model              = new Kelas();
            if($id_kelas!=null){
                $data['kelas']      = $model->findByPk($id_kelas);
                $id_tingkat_kelas   = $data['kelas']['id_tingkat_kelas'];
                $id_semester        = $data['kelas']['id_semester'];
                $id_kurikulum       = $data['kelas']['id_kurikulum'];
            }else{
                $data['kelas']      = $model->getKelas($id_tingkat_kelas, $id_semester, $id_kurikulum);
            }
            $data['mapelList']  = $model->getMapel($id_tingkat_kelas, $id_semester, $id_kurikulum);
            
            $this->renderModal('loadMapel', $data);
        }
        public function actionPilihMapel($id_kelas){
            $mapelModel             = new Mapel();
            $data['pilihanMapel']   =$mapelModel->pilihanMapelKelas($id_kelas);
            $data['id_kelas']   =$id_kelas;
            $this->renderModal('pilihMapel',$data);
        }
        public function actionTambahMapel($id_kelas){
            $kelasModel =new Kelas();
            $is_success =$kelasModel->tambahMapel($_POST,$id_kelas);
            $this->notice($is_success, "matapelajaran", 'insert');
            $this->redirect(Yii::app()->createUrl('kelas/loadMapel',array('id_kelas'=>$id_kelas)));
        }
        public function actionHapusMapel($id_kelas,$id_mapel){
            $kelasModel =new Kelas();
            $is_success=$kelasModel->hapusMapel($id_kelas,$id_mapel);
            $this->notice($is_success, "matapelajaran", 'delete');
            $this->redirect(Yii::app()->createUrl('kelas/loadMapel',array('id_kelas'=>$id_kelas)));
        }
}

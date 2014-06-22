<?php

class PegawaiController extends Controller
{
	
	public $layout='//layouts/mainadmin';
	public $pageTitle='';
	public $menuactive='pegawai';
	
  public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'create','update', 'delete', 'view', 'slip', 'invoice'),
                'expression'=>'$user->isSuperAdmin',
            ),
            array('deny', // deny all other users
                'users' => array('*'),
            ),
        );
    }
    
	public function actionIndex()
	{
    $this->pageTitle = 'Pegawai';  
    $pegawai = Pegawai::model()->findAll();  
    
		$this->render('daftar',array('data'=>$pegawai));
	}
  
  /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
    $userAkses = new User;  
		$model=new Pegawai;
    $this->pageTitle = 'Pegawai Baru';
    $this->menuactive = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pegawai']))
		{
			$model->attributes = $_POST['Pegawai'];
			if($model->save())
				$this->redirect(array('/members/pegawai','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
      'modelUser'=>$userAkses  
		));
	}
	
  /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->pageTitle = 'Edit Pegawai Baru';
    $model=$this->loadModel($id);
    
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pegawai']))
		{
			$model->attributes=$_POST['Pegawai'];
			if($model->save())
				$this->redirect(array('/members/pegawai','id'=>$model->id));
		}

		$this->render('update',array(
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
		$model=Pegawai::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
<?php

class FileController extends Controller
{
  public $layout='//layouts/mainadmin';
  public $menuactive = 'penelitian';  
  
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('download'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
  
	public function actionDownload()
	{
    if ( empty($_GET['file']) ){
        $this->render('download404');
        Yii::app()->end();
    }
          
    $name	= $_GET['file'];	
    $upload_path = Yii::getPathOfAlias('webroot')."/files";  

    if( file_exists( $upload_path.'/'.$name ) ){
        Yii::app()->getRequest()->sendFile( $name , file_get_contents( $upload_path.'/'.$name ) );
    }
    else{
        $this->render('download404');
    }	
	}
}
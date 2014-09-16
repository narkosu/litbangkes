<?php

class DefaultController extends Controller
{
	public $layout    = '//layouts/mainadmin';
  public $pageTitle = 'MASTER';
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('index'),
					'users' => array('@'),
					),
				array('allow',
					'actions'=>array('admin','delete', 'view', 'slip', 'invoice'),
					'users' => array('admin'),
					),
				array('deny',  // deny all other users
						'users'=>array('*'),
						),
				);
	}
	
	public function actionIndex()
	{
		//echo Yii::app()->request->getQuery('user');
		
		$this->render('home');
	}
	
}
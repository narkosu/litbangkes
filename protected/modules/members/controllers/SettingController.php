<?php

class SettingController extends Controller
{
	public $layout = '//layouts/main_account';
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}	

	public function accessRules() {
		return array(
				array('allow',
					'actions'=>array('index','ajaxprofile','uploadavatar','loadavatar'),
					'users' => array('*'),
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
      
		$model = Profile::model()->findByPk(Yii::app()->user->id);
    if ( !$model ){
        $model = new Profile;
    }
    if ( !empty($_POST['Profile']) ) {
        $model->attributes = $_POST['Profile'];
        $model->user_id = Yii::app()->user->id;
        if ( $model->save() ){
            echo 'ok';
        }else{
          echo 'error';

        } 
    }
		$this->render('profile',array('model'=>$model));
	}
	
}
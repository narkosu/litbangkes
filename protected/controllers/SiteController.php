<?php

class SiteController extends Controller
{
	public $layout='/layouts/mainlogin';
  public $pageTitle='';
	public $menuactive='pegawai';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
      $this->layout='/layouts/mainadmin';
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
    
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
           
           $this->redirect(Yii::app()->user->returnUrl);
      }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
  
  /**
	 * Displays the contact page
	 */
	public function actionChangepassword()
	{
    $this->layout='/layouts/mainadmin';  
    $this->menuactive = 'gantipassword';  
    $pegawai = Yii::app()->user->getState('pegawai');
    $this->pageTitle = ( empty($pegawai) ? Yii::app()->user->name : $pegawai->nama);
    $model=new ChangePasswordForm;
    
    // collect user input data
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
           $user = User::model()->findByPk(Yii::app()->user->id);
           $user->generatePassword($model->password);
           if ($user->save()){
                Yii::app()->user->setFlash('password_success','Password sudah berubah.');
                $this->refresh();
               
           }
           
           
      }
		}
    
		$this->render('changepassword',array('model'=>$model));
	}
  
  public function actionTestEmail(){
        
      echo Yii::app()->emailManager->email('budisunarko@gmail.com', 'test email', '<b>Hello</b> <i>World<i>!','budi@sunarko.com',array(),null,false);
  }
}
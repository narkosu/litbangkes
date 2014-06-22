<?php

class MembersModule extends CWebModule
{
	public $filefolder = 'files/'; // Approot/...
		
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'members.models.*',
			
		));
    
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			/*if ( Yii::app()->user->isGuest ){
				Yii::app()->request->redirect(Yii::app()->homeUrl);
			}*/
        CModule::setParams(array());
			return true;
		}
		else
			return false;
	}
}

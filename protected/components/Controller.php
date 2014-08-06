<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
  
  public function AccessAsKabid(){
      return ( Yii::app()->user->isKabid || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin) ;
  }
  
  public function AccessAsKasubbid(){
      return ( Yii::app()->user->isKasubbid || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin) ;
  }
  
  public function AccessAsPPI(){
      return (Yii::app()->user->isPPI || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin );
  }
  
  public function AccessAsKapuslit(){
      return (Yii::app()->user->isKapuslit || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin);
  }
  
  public function AccessAsKI(){
      return (Yii::app()->user->isKI || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin);
  }
  
  public function AccessAsKE(){
      return (Yii::app()->user->isKE || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin);
  }
}
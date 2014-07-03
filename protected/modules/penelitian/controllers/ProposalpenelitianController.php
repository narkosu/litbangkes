<?php

class ProposalpenelitianController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/mainadmin';
  public $menuactive = 'penelitian'; 
  public $pageTitle = 'Proposal Penelitian'; 

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
				'expression'=>'$user->isSuperAdmin || $user->isMember || $user->isKabid ',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
        'expression'=>'$user->isSuperAdmin || $user->isMember',
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
    $validasi = ProposalValidasi::model()->find('proposal_id = '.$id);  
    $proposal = $this->loadModel($id);
    $modelFile = $proposal->file;
    
    if ( empty($validasi)){
        $validasi = new ProposalValidasi;
        $validasi->proposal_id = $id;
        $validasi->step = 1;
    }
    
    $validasi = $this->saveValidation($validasi, $_POST);
    
		$this->render('view',array(
			'model'=>$proposal,
      'modelFile'=>$modelFile,
			'validasi'=>$validasi,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->menuactive = 'pengajuan'; 
    $folder = Yii::getPathOfAlias('webroot')."/files";
    $model=new ProposalPenelitian;
    $modelFile=new FilePenelitian;
    
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
    
		if(isset($_POST['ProposalPenelitian']))
		{
      
			$model->attributes=$_POST['ProposalPenelitian'];
      $model->created_at = date('Y-m-d H:i:s');
			if($model->save()) {
          $modelFile->attributes=$_POST['FilePenelitian'];
          $modelFile->filename=CUploadedFile::getInstance($modelFile,'filename');
          if($modelFile->save())
          {
                $model->step = 1;
                $time = time();
                $newfilename = $time.'.'.$modelFile->filename->getExtensionName();
                $extension = $modelFile->filename->getExtensionName();
                $modelFile->filename->saveAs($folder . '/' . $newfilename); 
                $modelFile->filename = $newfilename;
                $modelFile->proposal_id = $model->id;
                $modelFile->step = $model->step;
                $modelFile->group_file = 'proposal';
                $modelFile->version = $time;
                $modelFile->uploaded_by = Yii::app()->user->id;
                $modelFile->created_at = date('Y-m-d H:i:s');
                $modelFile->save();
                $model->status = 1;
                
                $model->save();

                // redirect to success page
                
                $this->redirect(array('view','id'=>$model->id));
          }
				  
      }
		}

		$this->render('create',array(
			'model'=>$model,
      'modelFile'=>$modelFile  
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
    $modelFile=new FilePenelitian;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProposalPenelitian']))
		{
			$model->attributes=$_POST['ProposalPenelitian'];
			if($model->save()){
          
          if ( !empty($_POST['FilePenelitian']['filename'])) {
              
            $modelFile->attributes=$_POST['FilePenelitian'];
            $modelFile->filename=CUploadedFile::getInstance($modelFile,'filename');
            if($modelFile->save())
            {
                  $time = time();
                  $newfilename = $time.'.'.$modelFile->filename->getExtensionName();
                  $extension = $modelFile->filename->getExtensionName();
                  $modelFile->filename->saveAs($folder . '/' . $newfilename); 
                  $modelFile->filename = $newfilename;
                  $modelFile->proposal_id = $model->id;
                  $modelFile->step = $model->step;
                  $modelFile->group_file = 'proposal';
                  $modelFile->version = $time;
                  $modelFile->uploaded_by = Yii::app()->user->id;
                  $modelFile->created_at = date('Y-m-d H:i:s');
                  $modelFile->status = 1;
                  $modelFile->save();


                  $model->save();

                  // redirect to success page

                  $this->redirect(array('view','id'=>$model->id));
            }
          }
      }
		}

     
    if ( $model->status != ProposalPenelitian::STATUS_REVISI && $model->status != ProposalPenelitian::STATUS_DRAFT){
        $model->editable = false;    
    }
		$this->render('update',array(
			'model'=>$model,
      'modelFile'=>$modelFile  
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
    if ( Yii::app()->user->isSuperAdmin ) {
        $proposal = ProposalPenelitian::model()->findAll();
    } else if ( Yii::app()->user->isKabid ){
        $me = Yii::app()->user->getState('pegawai');
        
        $criteria = new CDbCriteria();
        $criteria->condition .= 'bidang_id = '.$me->bidang_id;
        $criteria->condition .= ' OR pegawai_id = '.$me->id;
        $proposal = ProposalPenelitian::model()->findAll($criteria);
    } else if ( Yii::app()->user->isKasubbid ){
        $me = Yii::app()->user->getState('pegawai');
        
        $criteria = new CDbCriteria();
        $criteria->condition .= '( bidang_id = '.$me->bidang_id;
        $criteria->condition .= ' AND  sub_bidang_id = '.$me->subbidang_id.' ) ';
        $criteria->condition .= ' OR pegawai_id = '.$me->id .' ';
        
        $proposal = ProposalPenelitian::model()->findAll($criteria);
    }else if ( Yii::app()->user->isMember ) {
        
        $me = Yii::app()->user->getState('pegawai');
        
        $criteria = new CDbCriteria();
        $criteria->condition .= 'pegawai_id = '.$me->id;
        $proposal = ProposalPenelitian::model()->findAll($criteria);
    }
    
    /*$dataProvider=new CActiveDataProvider('ProposalPenelitian');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
     * 
     */
     $this->render('index',array(
			'data'=>$proposal,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProposalPenelitian('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProposalPenelitian']))
			$model->attributes=$_GET['ProposalPenelitian'];

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
		$model=ProposalPenelitian::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='proposal-penelitian-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
  
  protected function saveValidation($model, $post){
      
    if(isset($post['ProposalValidasi']))
		{
      
			$model->attributes=$post['ProposalValidasi'];
      if ( $model->isNewRecord )
        $model->created_at = date('Y-m-d H:i:s');
      
      $model->updated_at = date('Y-m-d H:i:s');
      $model->created_by = Yii::app()->user->id;
			if($model->save()) {
          if ( $post['group_validasi'] == 'kabid'){
            if ( $model->validasi_kasubbid == 3 ) { // disetujui  
                $model->proposal->status = 3; // disetujui
                $model->proposal->save();
            }
          }
				  
          if ( $post['group_validasi'] == 'kasubbid'){
            if ( $model->validasi_kabid == 3 ) { // disetujui  
                $model->proposal->status = 3; // disetujui
                $model->proposal->save();
            }
          }
          
          if ( $post['group_validasi'] == 'ppi'){
            $model->proposal->status = $model->validasi_ppi;
            $model->proposal->save();
          }
          if ( $post['group_validasi'] == 'ki'){
            $model->proposal->status = $model->validasi_ppi;
            $model->proposal->save();
          }
          if ( $post['group_validasi'] == 'ke'){
            $model->proposal->status = $model->validasi_ppi;
            $model->proposal->save();
          }
				  return $model;
      }
    }
    return $model;
  }
}

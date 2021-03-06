<?php

class ProgrespenelitianController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
    $model = ProposalPenelitian::model()->findByPk($id);
    if ( $model->user_id == Yii::app()->user->id ){
         $this->redirect(array('/penelitian/progrespenelitian/create/id/' . $id));
    }
		//$model=new ProgresPenelitian;
    $this->pageTitle  = $model->nama_penelitian;
    $this->menuactive  = 'penelitian';
    $modelFile = $model->fileProgress;
    $groupFile = array();
    if ( !empty($modelFile) ) 
    foreach ($modelFile as $f){
        $groupFile[$f->group_file] = $f;
    } 
    
    $modelProgress['triwulan1'] = $this->loadModelByProposalId($id,'triwulan1');
    $modelProgress['triwulan2'] = $this->loadModelByProposalId($id,'triwulan2');
    $modelProgress['triwulan3'] = $this->loadModelByProposalId($id,'triwulan3');
    $modelProgress['triwulan4'] = $this->loadModelByProposalId($id,'triwulan4');
    if ( empty($modelProgress['triwulan3']) )
        $modelProgress['triwulan3'] = new ProgresPenelitian;
    if ( empty($modelProgress['triwulan4']) )
        $modelProgress['triwulan4'] = new ProgresPenelitian;
		$this->render('view',array(
			'model'=>$model,
			'modelProgress' => $modelProgress,
      'modelFile'=>  $modelFile,
      'groupFile'=>$groupFile
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
    $modelProgressSaved = false;  
    $folder = Yii::getPathOfAlias('webroot') . "/files";
    
    $model = ProposalPenelitian::model()->findByPk($id);
    if ($model->step < ProposalPenelitian::PROGRES ){
        $this->redirect(array('/penelitian/proposalpenelitian/view/id/' . $id));
        
    }
   
		//$model=new ProgresPenelitian;
    $this->pageTitle  = $model->nama_penelitian;
    $this->menuactive  = 'penelitian';
    $modelFile = $model->fileProgress;
    $groupFile = array();
    if ( !empty($modelFile) )
    foreach ($modelFile as $f){
        $groupFile[$f->group_file] = $f;
    } 
    
   /* triwulan1 */
    $modelProgress['triwulan1'] = $this->loadModelByProposalId($id,'triwulan1');
    if (empty($modelProgress['triwulan1']))
        $modelProgress['triwulan1'] = new ProgresPenelitian;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProgresPenelitian']['triwulan1']))
		{
			$modelProgress['triwulan1']->attributes=$_POST['ProgresPenelitian']['triwulan1'];
      
      if (!empty($_POST['ProgresPenelitian']['triwulan1']['tanggal_pangajuan_etik'])){
      
        list($mo,$da,$ya) = explode('/',$_POST['ProgresPenelitian']['triwulan1']['tanggal_pangajuan_etik']);
        $modelProgress['triwulan1']->tanggal_pangajuan_etik = $ya.'-'.$mo.'-'.$da;
      }
      
      $modelProgress['triwulan1']->proposal_id = $id;
			
      if($modelProgress['triwulan1']->save()){
         $modelProgressSaved = true;
      }
				//$this->redirect(array('create','id'=>$model->id));
		}
     
    /* triwulan1 */
    $modelProgress['triwulan2'] = $this->loadModelByProposalId($id,'triwulan2');
    if (empty($modelProgress['triwulan2']))
        $modelProgress['triwulan2'] = new ProgresPenelitian;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
    
		if( isset($_POST['ProgresPenelitian']['triwulan2']) )
		{
			$modelProgress['triwulan2']->attributes=$_POST['ProgresPenelitian']['triwulan2'];
      if (!empty($_POST['ProgresPenelitian']['triwulan2']['tanggal_pangajuan_etik'])){
        list($mo,$da,$ya) = explode('/',$_POST['ProgresPenelitian']['triwulan2']['tanggal_pangajuan_etik']);
        $modelProgress['triwulan2']->tanggal_pangajuan_etik = $ya.'-'.$mo.'-'.$da;
      }
      
      $modelProgress['triwulan2']->proposal_id = $id;
			if($modelProgress['triwulan2']->save())
         $modelProgressSaved = true;
		}
    
    /* triwulan1 */
    $modelProgress['triwulan3'] = $this->loadModelByProposalId($id,'triwulan3');
    if (empty($modelProgress['triwulan3']))
        $modelProgress['triwulan3'] = new ProgresPenelitian;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
    
		if(isset($_POST['ProgresPenelitian']['triwulan3']))
		{
			$modelProgress['triwulan3']->attributes=$_POST['ProgresPenelitian']['triwulan3'];
      if (!empty($_POST['ProgresPenelitian']['triwulan3']['tanggal_pangajuan_etik'])){
        list($mo,$da,$ya) = explode('/',$_POST['ProgresPenelitian']['triwulan3']['tanggal_pangajuan_etik']);
        $modelProgress['triwulan3']->tanggal_pangajuan_etik = $ya.'-'.$mo.'-'.$da;
      }
      $modelProgress['triwulan3']->proposal_id = $id;
			if($modelProgress['triwulan3']->save())
				$modelProgressSaved = true;
		}
    
    /* triwulan4 */
    $modelProgress['triwulan4'] = $this->loadModelByProposalId($id,'triwulan4');
    if (empty($modelProgress['triwulan4']))
        $modelProgress['triwulan4'] = new ProgresPenelitian;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProgresPenelitian']['triwulan4']))
		{
			$modelProgress['triwulan4']->attributes=$_POST['ProgresPenelitian']['triwulan4'];
      if (!empty($_POST['ProgresPenelitian']['triwulan4']['tanggal_pangajuan_etik'])){
        list($mo,$da,$ya) = explode('/',$_POST['ProgresPenelitian']['triwulan4']['tanggal_pangajuan_etik']);
        $modelProgress['triwulan4']->tanggal_pangajuan_etik = $ya.'-'.$mo.'-'.$da;
      }
      $modelProgress['triwulan4']->proposal_id = $id;
			if($modelProgress['triwulan4']->save())
				$modelProgressSaved = true;
		}
    
    if ( $modelProgressSaved ){
        if (!empty($_FILES['FilePenelitian']['name']['filename']))
            foreach ($_FILES['FilePenelitian']['name']['filename'] as $group => $files) {

              if (!empty($files)) {

                  $modelFile = new FilePenelitian;
                  $modelFile->proposal_id = $id;

                  $fileaja = CUploadedFile::getInstance($modelFile, 'filename[' . $group . ']');

                  if ($modelFile->save()) {

                      $time = time();
                      $newfilename = $group . '_' . $time . '.' . $fileaja->getExtensionName();
                      $extension = $fileaja->getExtensionName();

                      $fileaja->saveAs($folder . '/' . $newfilename);
                      $modelFile->filename = $newfilename;
                      $modelFile->proposal_id = $id;
                      $modelFile->step = ProposalPenelitian::PROGRES;
                      $modelFile->group_file = $group;
                      $modelFile->version = $time;
                      $modelFile->status = 1;
                      $modelFile->uploaded_by = Yii::app()->user->id;
                      $modelFile->created_at = date('Y-m-d H:i:s');
                      if ( !$modelFile->save() )
                          print_r($modelFile->getErrors());
                      //      $this->redirect(array('view','id'=>$model->id));
                  }
              }
            }
            $this->refresh();
    }
    
    $newModelFile = new FilePenelitian;
		$this->render('create',array(
			'model'=>$model,
			'modelProgress' => $modelProgress,
      'modelFile'=>  $modelFile,
      'newModelFile'=> $newModelFile,
      'groupFile'=>$groupFile
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProgresPenelitian']))
		{
			$model->attributes=$_POST['ProgresPenelitian'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('ProgresPenelitian');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProgresPenelitian('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProgresPenelitian']))
			$model->attributes=$_GET['ProgresPenelitian'];

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
		$model=ProgresPenelitian::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
  
  public function loadModelByProposalId($id, $periode)
	{
		$model=ProgresPenelitian::model()->find('proposal_id = '.$id.' and periode = "'.$periode.'"');
		
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='progres-penelitian-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

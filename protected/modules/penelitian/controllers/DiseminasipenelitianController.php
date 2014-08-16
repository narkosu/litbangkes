<?php

class DiseminasipenelitianController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/mainadmin';
    public $menuactive = 'penelitian';
    public $pageTitle = 'Diseminasi Penelitian';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'view','viewvalidasi','delete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $folder = Yii::getPathOfAlias('webroot') . "/files";
        $model = ProposalPenelitian::model()->findByPk($id);
        $newModelFile = new FilePenelitian;
        $diseminasiId = empty($_GET['edit']) ? '' : $_GET['edit'];
        
        if ( !empty($diseminasiId) ) {
            $modelDiseminasi = DiseminasiPenelitian::model()->findByPk($diseminasiId);
        } else {
            $modelDiseminasi = new DiseminasiPenelitian;
        }
        
        if ( isset($_POST['DiseminasiPenelitian']) ) {
            
            $modelDiseminasi->attributes = $_POST['DiseminasiPenelitian'];
            $modelDiseminasi->created_at = date('Y-m-d H:i:s');
            $modelDiseminasi->created_by = Yii::app()->user->id;
            
            if ( !empty($_POST['DiseminasiPenelitian']['tanggal']) ){
                list($mo,$da,$ya) = explode('/',$_POST['DiseminasiPenelitian']['tanggal']);
                $modelDiseminasi->tanggal = $ya.'-'.$mo.'-'.$da;
            }
            if ( $modelDiseminasi->save() ){
                
                if (!empty($_FILES['FilePenelitian']['name']['filename']) ) {
                        
                   $newModelFile->proposal_id = $id;

                   $fileaja = CUploadedFile::getInstance($newModelFile, 'filename');

                   if ($newModelFile->save()) {

                        $time = time();
                        $newfilename =  'diseminasi_' . $time . '.' . $fileaja->getExtensionName();
                        
                        $fileaja->saveAs($folder . '/' . $newfilename);
                        $newModelFile->filename = $newfilename;
                        $newModelFile->step = ProposalPenelitian::DISEMINASI;
                        $newModelFile->group_file = $modelDiseminasi->id;
                        $newModelFile->version = $time;
                        $newModelFile->status = 1;
                        $newModelFile->uploaded_by = Yii::app()->user->id;
                        $newModelFile->created_at = date('Y-m-d H:i:s');
                        if ( !$newModelFile->save() )
                            print_r($newModelFile->getErrors());
                        //      $this->redirect(array('view','id'=>$model->id));
                    }
                }
                
                $this->refresh();
            }else{
                print_r($modelDiseminasi->getErrors());
            }
        }
        
        $criteria = new CDbCriteria();
        $criteria->condition = 'status = 1';
        $count      = DiseminasiPenelitian::model()->count($criteria);
        $pages      = new CPagination($count);
        // results per page
        $pages->pageSize    = 2;
        $pages->applyLimit($criteria);
        $diseminasi = DiseminasiPenelitian::model()->findAll($criteria);
        
        $this->render('viewdiseminasi',
                      array(
                            'model' => $model,
                            'modelDiseminasi' => $modelDiseminasi,
                            'newModelFile' => $newModelFile,
                            'pages'=> $pages,
                            'data' => $diseminasi
                            )
                      );
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $diseminasi = $this->loadModel($id);
        $proposalid = $diseminasi->proposal_id;
        $diseminasi->status = -1;
        $diseminasi->save();
        
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('/penelitian/diseminasipenelitian/view/id/'.$proposalid));
        
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ProtokolPenelitian');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ProtokolPenelitian('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProtokolPenelitian']))
            $model->attributes = $_GET['ProtokolPenelitian'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded proposal penelitian id
     */
    public function loadModel($id) {
        
        $model = DiseminasiPenelitian::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModelByProposal($id) {
        $model = DiseminasiPenelitian::model()->find('proposal_id = :pid', array('pid' => $id));
        /*if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
         * 
         */
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'protokol-penelitian-form') {
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
            
            }
          }
				  
          if ( $post['group_validasi'] == 'kasubbid'){
            if ( $model->validasi_kabid == 3 ) { // disetujui  
                $model->proposal->status = 3; // disetujui
            
            }
          }
          
          if ( $post['group_validasi'] == 'ppi'){
            $model->proposal->status = $model->validasi_ppi;
            
          }
          
          if ( $post['group_validasi'] == 'kapuslit'){
            $model->proposal->status = $model->validasi_kapuslit;
            
          }
          
          if ( $post['group_validasi'] == 'ki'){
            $model->proposal->status = $model->validasi_ki;
            
          }
          if ( $post['group_validasi'] == 'ke'){
            $model->proposal->status = $model->validasi_ke;
            
          }
          
          if ( $model->validasi_kasubbid == 3 && $model->validasi_kabid == 3 && 
               $model->validasi_ppi == 3 && 
               $model->validasi_kapuslit == 3 ){
                $model->proposal->step = 3;  
          }
          $model->proposal->save();
				  return $model;
      }
    }
    return $model;
  }

  
}

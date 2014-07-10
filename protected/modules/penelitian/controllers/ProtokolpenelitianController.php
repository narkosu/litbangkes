<?php

class ProtokolpenelitianController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/mainadmin';
    public $menuactive = 'penelitian';
    public $pageTitle = 'Protokol Penelitian';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'view','viewvalidasi'),
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

        $model = ProposalPenelitian::model()->findByPk($id);

        if (empty($model)) {
            $this->redirect(array('/penelitian/proposalpenelitian'));
        }

        $validasi = $model->validasi; // hanya untuk proposal
        
        
        if (empty($validasi)) {
            $this->redirect(array('/penelitian/proposalpenelitian/view/id/' . $id));
        }
        
        
        if ( $validasi->validasi_ppi != 3 || $validasi->validasi_ki != 3 ) {
            $this->redirect(array('/penelitian/proposalpenelitian/view/id/' . $id));
        }
        
        $newModelFile = new FilePenelitian;
        $modelProtokol = $this->loadModelByProposal($id);
        
        $groupFile = array();
        if (empty($modelProtokol)) {

            /*$modelProtokol = new ProtokolPenelitian;
            $modelFile = new FilePenelitian;
            */
            
            $this->redirect(array('/penelitian/protokolpenelitian/create/id/' . $id));
            
        } else {

            $modelFile = $modelProtokol->file;
            if (!empty($modelFile))
                foreach ($modelFile as $_file) {

                    $groupFile[$_file->group_file] = $_file;
                }
        }


        $this->render('viewprotokol', array(
            'model' => $model,
            'newModelFile' => $newModelFile,
            'groupFile' => $groupFile,
            'modelFile' => $modelFile,
            'modelProtokol' => $modelProtokol,
        ));
    }
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionViewvalidasi($id) {

        $model = ProposalPenelitian::model()->findByPk($id);

        if (empty($model)) {
            $this->redirect(array('/penelitian/proposalpenelitian'));
        }

        $validasi = $model->validasi; // hanya untuk proposal
        
        
        if (empty($validasi)) {
            $this->redirect(array('/penelitian/proposalpenelitian/viewvalidasi/id/' . $id));
        }
        
        
        if ( $validasi->validasi_ppi != 3 || $validasi->validasi_ki != 3 ) {
            $this->redirect(array('/penelitian/proposalpenelitian/viewvalidasi/id/' . $id));
        }
        
        $newModelFile = new FilePenelitian;
        $modelProtokol = $this->loadModelByProposal($id);
        $groupFile = array();
        if (empty($modelProtokol)) {

            $modelProtokol = new ProtokolPenelitian;
            $modelFile = new FilePenelitian;
        } else {

            $modelFile = $modelProtokol->file;
            if (!empty($modelFile))
                foreach ($modelFile as $_file) {

                    $groupFile[$_file->group_file] = $_file;
                }
        }


        $this->render('viewvalidasi', array(
            'model' => $model,
            'newModelFile' => $newModelFile,
            'groupFile' => $groupFile,
            'modelFile' => $modelFile,
            'modelProtokol' => $modelProtokol,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $folder = Yii::getPathOfAlias('webroot') . "/files";

        $model = ProposalPenelitian::model()->findByPk($id);

        if (empty($model)) {
            $this->redirect(array('/penelitian/proposalpenelitian'));
        }

        $validasi = ProposalValidasi::model()->find('proposal_id = ' . $id . ' and step = 1');
        if (empty($validasi)) {
            $this->redirect(array('/penelitian/proposalpenelitian/view/id/' . $id));
        }

        if ($validasi->validasi_ppi != 3) {
            $this->redirect(array('/penelitian/proposalpenelitian/view/id/' . $id));
        }
        
        $newModelFile = new FilePenelitian;
        $modelProtokol = $this->loadModelByProposal($id);
        $groupFile = array();
        if (empty($modelProtokol)) {

            $modelProtokol = new ProtokolPenelitian;
            $modelFile = new FilePenelitian;
        } else {

            $modelFile = $modelProtokol->file;
            if (!empty($modelFile))
                foreach ($modelFile as $_file) {

                    $groupFile[$_file->group_file] = $_file;
                }
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ProtokolPenelitian'])) {


            $modelProtokol->attributes = $_POST['ProtokolPenelitian'];
            $modelProtokol->proposal_id = $id;

            if ( $modelProtokol->save() ) {
                
                foreach ($_FILES['FilePenelitian']['name']['filename'] as $group => $files) {
                    if (!empty($files)) {
                        $modelFile = new FilePenelitian;
                        $modelFile->attributes = $files;

                        $fileaja = CUploadedFile::getInstance($modelFile, 'filename[' . $group . ']');

                        if ($modelFile->save()) {

                            $time = time();
                            $newfilename = $group . '_' . $time . '.' . $fileaja->getExtensionName();
                            $extension = $fileaja->getExtensionName();

                            $fileaja->saveAs($folder . '/' . $newfilename);
                            $modelFile->filename = $newfilename;
                            $modelFile->proposal_id = $id;
                            $modelFile->step = $model->step;
                            $modelFile->group_file = $group;
                            $modelFile->version = $time;
                            $modelFile->status = 1;
                            $modelFile->uploaded_by = Yii::app()->user->id;
                            $modelFile->created_at = date('Y-m-d H:i:s');
                            $modelFile->save();
                            //      $this->redirect(array('view','id'=>$model->id));
                        }
                    }
                }
                $proposal = $modelProtokol->proposal;
                $proposal->step = ProposalPenelitian::ISPROTOKOL;
                $proposal->save();
                
                $this->refresh();
                //$this->redirect(array('view','id'=>$modelProtokol->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'newModelFile' => $newModelFile,
            'groupFile' => $groupFile,
            'modelFile' => $modelFile,
            'modelProtokol' => $modelProtokol,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ProtokolPenelitian'])) {
            $model->attributes = $_POST['ProtokolPenelitian'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ProtokolPenelitian::model()->findByPk($id);
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
        $model = ProtokolPenelitian::model()->find('proposal_id = :pid', array('pid' => $id));
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

}

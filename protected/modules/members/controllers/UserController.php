<?php

class UserController extends Controller {

    public $layout = '//layouts/mainadmin';
    public $pageTitle = '';
    public $menuactive = 'pegawai';

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('edit','profile','avatar','photo'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('index'),
                'expression' => '$user->isSuperAdmin',
            ),
            array('allow',
                'actions' => array('admin', 'create', 'update', 'delete', 'view'),
                'expression' => '$user->isSuperAdmin',
            ),
            array('deny', // deny all other users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        
        $this->pageTitle = 'Pegawai';
        $pegawai = Pegawai::model()->findAll();

        $this->render('daftar', array('data' => $pegawai));
    }

    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEdit() {
        $this->pageTitle = 'Edit User';
        $this->menuactive = 'editprofil';
        
        $model = User::model()->findByPk(Yii::app()->user->id);
        
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                
                Yii::app()->user->setFlash('editprofile_success','Edit profil sukses.');
                $this->refresh();

            }
        }
        
        if ( !empty($_FILES['avatar']['name'])){
            $this->saveAvatar(Yii::app()->user->id);
            $this->refresh();
        }
        
        $this->render('editprofile', array(
            'model' => $model,
            //'modelUser' => $userAccess
        ));
    }
    
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionProfile() {
        $this->pageTitle = 'Profil';
        $this->menuactive = 'editprofil';
        
        $model = Pegawai::model()->find('user_id ='.Yii::app()->user->id);
        
        if (!$model){
            $this->pageTitle .= ' '.ucfirst(Yii::app()->user->name);
            //$this->redirect(array('/members/pegawai'));
            $userAccess = Yii::app()->user;
        } else {
            $userAccess = $model->userAccess;
            $this->pageTitle .= ' '.ucfirst($model->nama);
        }
       
        
        if (empty($userAccess))
            $userAccess = new User;

        $this->render('profile', array(
            'model' => $model,
            'modelUser' => $userAccess
        ));
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Pegawai::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function saveAvatar($cid = ''){
        $folder = Yii::getPathOfAlias('webroot')."/files/avatar";
        if (empty($cid)) return;
        if ( !file_exists($folder)){
            @mkdir($folder);
        }

        $model = User::model()->findByPk($cid);
        $pegawaiModel = Pegawai::model()->find('user_id = '.$cid);

        //$oldLogo_id         = $model->picture_id;
        $oldLogo_picture    = $model->avatar;

        $file = CUploadedFile::getInstanceByName('avatar');

        $group = 'logo';
        $filename = 'avatar_'.md5($cid).'.'.$file->getExtensionName();

        $return = $file->saveAs($folder . '/' . $filename); 
        if ( !empty($return) ){
          $model->avatar =$filename;
          
          if ( $model->save() ){
              if ( $pegawaiModel ) {
                $pegawaiModel->photo = $filename;
                $pegawaiModel->save();
              }
              Yii::app()->user->setState('avatar',$filename);
             
          }else{
              return;
          }
        }
		// return the new file path
		//echo Yii::app()->baseUrl.'/photo/view/id/'.$return->id.'/version/logo';
	}
  
  public function actionPhoto($file)
	{
    $upload_path = Yii::getPathOfAlias('webroot')."/files/avatar/".$file;   
		if (!empty($upload_path) && $upload_path!='') {
        $request = Yii::app()->getRequest();
        
        echo $request->sendFile(basename($upload_path),file_get_contents($upload_path));
        //echo CHtml::image($upload_path,'avatar',array('width'=>'180px','max-height'=>'180px'
    //));
    }
	}
  
}
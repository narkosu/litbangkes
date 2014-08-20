<?php

/**
 * This is the model class for table "{{proposal_validasi}}".
 *
 * The followings are the available columns in table '{{proposal_validasi}}':
 * @property string $id
 * @property integer $proposal_id
 * @property integer $step
 * @property integer $revisi
 * @property integer $validasi_ppi
 * @property integer $validasi_ki
 * @property integer $validasi_ke
 * @property integer $created_by
 * @property string $created_at
 * @property string $updated_at
 */
class ProposalValidasi extends CActiveRecord
{
	const STATUS_REVISI = 2;
  const STATUS_SETUJU = 3;
  const STATUS_TOLAK = 4;
  public $editable = true;
  public $statusDocument = array(
                            '2'=>'Revisi',
                            '3'=>'Disetujui',
                            '4'=>'Ditolak',
                            ); 
  
   /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProposalValidasi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{proposal_validasi}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal_id, step, revisi, validasi_kabid, validasi_kasubbid, validasi_ppi, validasi_kapuslit, validasi_ki, validasi_ke, created_by', 'numerical', 'integerOnly'=>true),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, proposal_id, step, revisi, validasi_ppi, validasi_kapuslit, validasi_ki, validasi_ke, created_by, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
        'proposal'=>array(self::BELONGS_TO,'ProposalPenelitian','proposal_id'),
        'protokol'=>array(self::BELONGS_TO,'ProposalPenelitian','','on'=>'proposal_id = protokol.proposal_id '),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'proposal_id' => 'Proposal',
			'step' => 'Step',
			'revisi' => 'Revisi',
			'validasi_ppi' => 'Validasi Ppi',
			'validasi_ki' => 'Validasi Ki',
			'validasi_ke' => 'Validasi Ke',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('step',$this->step);
		$criteria->compare('revisi',$this->revisi);
		$criteria->compare('validasi_ppi',$this->validasi_ppi);
		$criteria->compare('validasi_ki',$this->validasi_ki);
		$criteria->compare('validasi_ke',$this->validasi_ke);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getStatus($field){
      return $this->statusDocument[$this->$field];
  }
  
  public function saveValidation($post){
      if(isset($post['ProposalValidasi']))
        {
          
          $this->attributes=$post['ProposalValidasi'];
          if ( $this->isNewRecord )
            $this->created_at = date('Y-m-d H:i:s');

          $this->updated_at = date('Y-m-d H:i:s');
          $this->created_by = Yii::app()->user->id;
          if($this->save()) {
              /* save for history */
              if ( $post['group_validasi'] == 'kabid'){
                if ( $this->validasi_kabid == 3 ) { // disetujui  
                    $this->proposal->status = $this->validasi_kabid; // disetujui
                    
                }
                
              }

             
              if ( $post['group_validasi'] == 'ppi'){
                $this->proposal->status = $this->validasi_ppi;
                
              }

              if ( $post['group_validasi'] == 'kapuslit'){
                $this->proposal->status = $this->validasi_kapuslit;
                
              }

              if ( $post['group_validasi'] == 'ki'){
                $this->proposal->status = $this->validasi_ki;
                
              }
              if ( $post['group_validasi'] == 'ke'){
                $this->proposal->status = $this->validasi_ke;
                
                //$validasiHistory->value_validasi = $this->validasi_ki;
              }
              $this->proposal->save();
              /*
            
              
              $validasiHistory = new ProposalValidasiHistory;
              $validasiHistory->proposal_id = $this->proposal_id;
              $validasiHistory->step = $this->step;
              $validasiHistory->level_validasi = $post['group_validasi'];
              $validasiHistory->value_validasi = $post['ProposalValidasi']['validasi_'.$validasiHistory->level_validasi];
              
              
              $validasiHistory->alasan = $post['ProposalValidasi']['alasan'];
              $validasiHistory->created_at = date('Y-m-d H:i:s');
              $validasiHistory->created_by = Yii::app()->user->id;
              $validasiHistory->save();
               * 
               */
              //Yii::app()->user->setFlash('history_validasi_id_'.$this->id,$validasiHistory->id);
              return $this;
          }
        }
        return $this;
        
  }
  
  function setValidasiHistory($post){
         $folder = Yii::getPathOfAlias('webroot')."/files/history";
         if ( !file_exists($folder)){
             @mkdir($folder);
         }
        $validasiHistory = new ProposalValidasiHistory;
        $validasiHistory->proposal_id = $this->proposal_id;
        $validasiHistory->step = $this->step;
        $validasiHistory->level_validasi = $post['group_validasi'];
        $validasiHistory->value_validasi = $post['ProposalValidasi']['validasi_'.$validasiHistory->level_validasi];

        $validasiHistory->alasan = $post['ProposalValidasi']['alasan'];
        $validasiHistory->created_at = date('Y-m-d H:i:s');
        $validasiHistory->created_by = Yii::app()->user->id;
        
          if($validasiHistory->save())
          {
                
                $fileaja=CUploadedFile::getInstance($validasiHistory,'file');
                if (!empty($fileaja) ) {
                    $time = time();
                    $newfilename = $post['group_validasi'].'_'.$time.'.'.$fileaja->getExtensionName();
                    $fileaja->saveAs($folder . '/' . $newfilename); 
                    $validasiHistory->file = $newfilename;
                    $validasiHistory->save();
                }
                
        } else{
            print_r($validasiHistory->getErrors());
        }
        
  }
}
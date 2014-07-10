<?php

/**
 * This is the model class for table "{{protokol_penelitian}}".
 *
 * The followings are the available columns in table '{{protokol_penelitian}}':
 * @property string $id
 * @property integer $proposal_id
 * @property integer $anggran
 * @property string $created_at
 */
class ProtokolPenelitian extends CActiveRecord
{
	const STATUS_DRAFT = 0;
  const STATUS_PROGRESS = 1;
  const STATUS_REVISI = 2;
  const STATUS_SETUJU = 3;
  const STATUS_TOLAK = 4;
  public $editable = true;
  public $statusDocument = array(
                            '0'=>'Draft',
                            '1'=>'Progress',
                            '2'=>'Revisi',
                            '3'=>'Disetujui',
                            '4'=>'Ditolak',
                            );   
   
   /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProtokolPenelitian the static model class
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
		return '{{protokol_penelitian}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal_id, anggaran', 'numerical', 'integerOnly'=>true),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, proposal_id, anggaran, created_at', 'safe', 'on'=>'search'),
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
        'file'=>array(self::HAS_MANY,'FilePenelitian','',
                        'on' => 'proposal_id = file.proposal_id',
                        'condition'=>"file.status = 1 && ( file.group_file = 'tor' || file.group_file = 'protokol' || file.group_file = 'rab')"),
        'validasi'=>array(self::HAS_ONE,'ProposalValidasi',''
                        ,'on' => 'proposal_id = validasi.proposal_id',
                        'condition'=>'validasi.step = 2'),
        'proposal'=>array(self::BELONGS_TO,'ProposalPenelitian','proposal_id')
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
			'anggran' => 'Anggran',
			'created_at' => 'Created At',
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
		$criteria->compare('anggran',$this->anggran);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getStatus(){
      return (!empty($this->statusDocument[$this->status]) ? $this->statusDocument[$this->status] : '');
  }
}
<?php

/**
 * This is the model class for table "{{proposal_validasi_history}}".
 *
 * The followings are the available columns in table '{{proposal_validasi_history}}':
 * @property string $id
 * @property integer $proposal_id
 * @property integer $step
 * @property string $level_validasi
 * @property integer $value_validasi
 * @property integer $alasan
 * @property integer $created_by
 * @property integer $author_by
 */
class ProposalValidasiHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProposalValidasiHistory the static model class
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
		return '{{proposal_validasi_history}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal_id, step, value_validasi, created_by', 'numerical', 'integerOnly'=>true),
			array('level_validasi', 'length', 'max'=>255),
			array('file', 'file', 'types'=>'jpg, gif, png, pdf, doc, xls, docx, xlsx', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, proposal_id, step, level_validasi, value_validasi, alasan, created_at, created_by', 'safe', 'on'=>'search'),
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
        'oleh'=>array(self::BELONGS_TO,'User','created_by'),
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
			'level_validasi' => 'Level Validasi',
			'value_validasi' => 'Value Validasi',
			'alasan' => 'Alasan',
			'created_by' => 'Created By',
			'author_by' => 'Author By',
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
		$criteria->compare('level_validasi',$this->level_validasi,true);
		$criteria->compare('value_validasi',$this->value_validasi);
		$criteria->compare('alasan',$this->alasan);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('author_by',$this->author_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
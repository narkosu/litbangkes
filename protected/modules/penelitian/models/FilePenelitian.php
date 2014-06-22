<?php

/**
 * This is the model class for table "{{file_penelitian}}".
 *
 * The followings are the available columns in table '{{file_penelitian}}':
 * @property string $id
 * @property integer $proposal_id
 * @property integer $step
 * @property string $group_file
 * @property integer $version
 * @property string $filename
 * @property integer $uploaded_by
 * @property string $created_at
 */
class FilePenelitian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FilePenelitian the static model class
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
		return '{{file_penelitian}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal_id, step, version, uploaded_by', 'numerical', 'integerOnly'=>true),
			array('group_file', 'length', 'max'=>11),
			array('filename', 'file', 'allowEmpty'=>true, 'types'=>'pdf, xls, xlsx'),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, proposal_id, step, group_file, version, filename, uploaded_by, created_at', 'safe', 'on'=>'search'),
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
			'group_file' => 'Group File',
			'version' => 'Version',
			'filename' => 'Outline / Draft Proposal',
			'uploaded_by' => 'Uploaded By',
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
		$criteria->compare('step',$this->step);
		$criteria->compare('group_file',$this->group_file,true);
		$criteria->compare('version',$this->version);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('uploaded_by',$this->uploaded_by);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "{{isu_strategis}}".
 *
 * The followings are the available columns in table '{{isu_strategis}}':
 * @property string $id
 * @property string $name
 * @property integer $status
 */
class IsuStrategis extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SumberDana the static model class
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
		return '{{isu_strategis}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, tahun_start, tahun_end', 'numerical', 'integerOnly'=>true),
			array('isu_strategis', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tahun_start, tahun_end, isu_strategis, status', 'safe', 'on'=>'search'),
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
			'isu_strategis' => 'Isu Strategis',
			'tahun' => 'Tahun',
			'status' => 'Status',
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
		$criteria->compare('isu_strategis',$this->isu_strategis,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function listArray(){
      $result = $this->findAll();
      $output = array();
      if ( !empty($result) )
      foreach ($result as $row){
          $output[$row->id] = $row->tahun_start.' - '.$row->tahun_end.' : '. $row->isu_strategis;
      }
      return $output;
  }
}
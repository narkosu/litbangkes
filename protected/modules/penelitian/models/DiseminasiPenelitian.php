<?php

/**
 * This is the model class for table "{{diseminasi_penelitian}}".
 *
 * The followings are the available columns in table '{{diseminasi_penelitian}}':
 * @property string $id
 * @property integer $proposal_id
 * @property string $tanggal
 * @property integer $tempat
 * @property integer $media
 * @property string $keterangan
 * @property string $created_at
 * @property integer $created_by
 */
class DiseminasiPenelitian extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiseminasiPenelitian the static model class
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
		return '{{diseminasi_penelitian}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal_id, , media, created_by', 'numerical', 'integerOnly'=>true),
			array('tanggal,media_url, tempat, keterangan, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, proposal_id, tanggal, tempat, media, keterangan, created_at, created_by', 'safe', 'on'=>'search'),
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
        'relmedia'=> array(self::BELONGS_TO,'MediaDiseminasi','media'),
        'file'=> array(self::HAS_ONE,'FilePenelitian','group_file')
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
			'tanggal' => 'Tanggal',
			'tempat' => 'Tempat',
			'media' => 'Media',
			'keterangan' => 'Keterangan',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
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
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tempat',$this->tempat);
		$criteria->compare('media',$this->media);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getTanggal(){
      if ( !empty($this->tanggal) ){
          list($year, $month, $day) = explode('-',$this->tanggal);
          $return = $month.'/'.$day.'/'.$year;
      }else{
          $return = '';
      }
      return $return;
      //return $this->tanggal_pangajuan_etik;
  }
}
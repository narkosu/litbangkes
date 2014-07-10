<?php

/**
 * This is the model class for table "{{pegawai}}".
 *
 * The followings are the available columns in table '{{pegawai}}':
 * @property integer $id
 * @property integer $id_departemen
 * @property string $nip
 * @property string $nama
 * @property string $jabatan
 * @property string $pendidikan
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property integer $tempat_tes
 * @property string $tgl_tes
 */
class Pegawai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
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
		return '{{pegawai}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
          'nip, pendidikan, tempat_lahir, tgl_lahir',
          'required'),
			array('bidang_id, subbidang_id, id_departemen', 'numerical', 'integerOnly'=>true),
			array('nip, nama', 'length', 'max'=>30),
			array('id_jabatan, tempat_lahir', 'length', 'max'=>50),
			array('pendidikan', 'length', 'max'=>10),
			array('satuan_kerja', 'length', 'max'=>255),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_departemen, nip, nama, satuan_kerja, id_jabatan, bidang_id, subbidang_id, pendidikan, tempat_lahir, tgl_lahir', 'safe', 'on'=>'search'),
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
        'userAccess'=>array(self::BELONGS_TO,'User','user_id'),
        'jabatan'=>array(self::BELONGS_TO,'Jabatan','id_jabatan'),
        'bidang'=>array(self::BELONGS_TO,'Bidang','bidang_id'),
        'subbidang'=>array(self::BELONGS_TO,'SubBidang','subbidang_id'),
        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_departemen' => 'Id Departemen',
			'nip' => 'Nip',
			'nama' => 'Nama',
			'id_jabatan' => 'Jabatan',
			'bidang_id' => 'Bidang',
			'subbidang_id' => 'Sub Bidang',
			'satuan_kerja' => 'Satuan Kerja',
			'pendidikan' => 'Pendidikan',
			'tempat_lahir' => 'Tempat Lahir',
			'tgl_lahir' => 'Tgl Lahir',
			
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_departemen',$this->id_departemen);
		$criteria->compare('nip',$this->nip,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('jabatan',$this->id_jabatan,true);
		$criteria->compare('pendidikan',$this->pendidikan,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getValidasiGroup(){
      if ( !empty($this->userAccess->ValidasiGroup) ){
            return $this->userAccess->ValidasiGroup;
      }
  }
  
  public function isJabatan(){
      if ( empty($this->id_jabatan) )
          return false;
      
      if ( !empty($this->jabatan) ){
            return true;
      }else{
          return false;
      }
  }
  
  public function getJabatan(){
      if ( !empty($this->jabatan) ){
            return $this->jabatan;
      }
  }
  
  
  public function isBidang(){
      if ( empty($this->bidang_id) )
          return false;
      
      if ( !empty($this->bidang) ){
            return true;
      }else{
          return false;
      }
  }
  
  public function getBidang(){
      if ( !empty($this->bidang) ){
            return $this->bidang;
      }
  }
  
  public function isSubBidang(){
      if ( empty($this->subbidang_id) )
          return false;
          
      if ( !empty($this->subbidang) ){
            return true;
      }else{
          return false;
      }
  }
  public function getSubbidang(){
      if ( !empty($this->subbidang) ){
            return $this->subbidang;
      }
  }
}

<?php

/**
 * This is the model class for table "{{progres_penelitian}}".
 *
 * The followings are the available columns in table '{{progres_penelitian}}':
 * @property string $id
 * @property integer $proposal_id
 * @property string $periode
 * @property string $pagu
 * @property string $tanggal_pangajuan_etik
 * @property integer $file_ijin_etik
 * @property string $narasi
 * @property string $realisasi_anggaran
 * @property string $masalah
 * @property string $tindak_lanjut
 * @property integer $created_by
 * @property string $created_at
 * @property integer $status
 */
class ProgresPenelitian extends CActiveRecord
{
	
  /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProgresPenelitian the static model class
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
		return '{{progres_penelitian}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('proposal_id, file_ijin_etik, created_by, status', 'numerical', 'integerOnly'=>true),
			array('periode', 'length', 'max'=>255),
			array('pagu, realisasi_anggaran', 'length', 'max'=>10),
			array('tindak_lanjut', 'length', 'max'=>11),
			array('tanggal_pangajuan_etik, narasi, masalah, created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, proposal_id, periode, pagu, tanggal_pangajuan_etik, file_ijin_etik, narasi, realisasi_anggaran, masalah, tindak_lanjut, created_by, created_at, status', 'safe', 'on'=>'search'),
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
			'periode' => 'Periode',
			'pagu' => 'Pagu',
			'tanggal_pangajuan_etik' => 'Tanggal Pangajuan Etik',
			'file_ijin_etik' => 'File Ijin Etik',
			'narasi' => 'Narasi',
			'realisasi_anggaran' => 'Realisasi Anggaran',
			'masalah' => 'Masalah',
			'tindak_lanjut' => 'Tindak Lanjut',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
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
		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('periode',$this->periode,true);
		$criteria->compare('pagu',$this->pagu,true);
		$criteria->compare('tanggal_pangajuan_etik',$this->tanggal_pangajuan_etik,true);
		$criteria->compare('file_ijin_etik',$this->file_ijin_etik);
		$criteria->compare('narasi',$this->narasi,true);
		$criteria->compare('realisasi_anggaran',$this->realisasi_anggaran,true);
		$criteria->compare('masalah',$this->masalah,true);
		$criteria->compare('tindak_lanjut',$this->tindak_lanjut,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getTanggalPengajuan(){
      if ( !empty($this->tanggal_pangajuan_etik) ){
          list($year, $month, $day) = explode('-',$this->tanggal_pangajuan_etik);
          $return = $month.'/'.$day.'/'.$year;
      }else{
          $return = '';
      }
      return $return;
      //return $this->tanggal_pangajuan_etik;
  }
}
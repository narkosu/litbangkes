<?php

/**
 * This is the model class for table "{{proposal_penelitian}}".
 *
 * The followings are the available columns in table '{{proposal_penelitian}}':
 * @property string $id
 * @property integer $user_id
 * @property integer $pegawai_id
 * @property string $nama_penelitian
 * @property integer $jabatan_fungsional_id
 * @property integer $sub_bidang_id
 * @property integer $jenis_penelitian_id
 * @property integer $tahun_anggaran
 * @property string $keywords
 * @property string $klien
 * @property integer $status
 * @property integer $step
 * @property string $created_at
 */
class ProposalPenelitian extends CActiveRecord
{
  const STATUS_DRAFT = 0;
  const STATUS_PROGRESS = 1;
  const STATUS_REVISI = 2;
  const STATUS_SETUJU = 3;
  const STATUS_TOLAK = 4;
  const ISPROPOSAL = 1;
  const ISPROTOKOL = 2;
  const PROGRES = 3;
  const OUTPUT = 4;
  
  
  public $editable = true;
  public $statusDocument = array(
                            '0'=>'Draft',
                            '1'=>'Progress',
                            '2'=>'Revisi',
                            '3'=>'Disetujui',
                            '4'=>'Ditolak',
                            );   
   
	public $positionDocument = array(
                            '1'=>'Proposal',
                            '2'=>'Protokol',
                            '3'=>'Progres',
                            '4'=>'Output',
                            );   
  
  public $clients = array(1=>'Dalam Negeri', 2=>'Luar Negeri',3=> 'Lain - Lain');
  /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProposalPenelitian the static model class
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
		return '{{proposal_penelitian}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' pegawai_id, jabatan_fungsional_id, sub_bidang_id, nama_penelitian', 'required'),
			array('user_id, pegawai_id, jabatan_fungsional_id, sub_bidang_id, pakar_id,jenis_penelitian_id, tahun_anggaran, status_record, status, step, klien', 'numerical', 'integerOnly'=>true),
			array('sumber_dana, detail_sumber_dana, jenis_penelitian_id, detail_klien', 'numerical', 'integerOnly'=>true),
			array('nama_penelitian, keywords, klien_lain, sumber_dana_lain', 'length', 'max'=>255),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, pegawai_id, nama_penelitian, jabatan_fungsional_id, sub_bidang_id, jenis_penelitian_id, tahun_anggaran, keywords, klien, status, step, created_at', 'safe', 'on'=>'search'),
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
        'pegawai'=>array(self::BELONGS_TO,'Pegawai','pegawai_id'),
        'jabatan'=>array(self::BELONGS_TO,'JabatanFungsional','jabatan_fungsional_id'),
        'subbidang'=>array(self::BELONGS_TO,'SubBidang','sub_bidang_id'),
        'pakar'=>array(self::BELONGS_TO,'Kepakaran','pakar_id'),
        'validasi'=>array(self::HAS_ONE,'ProposalValidasi','proposal_id','condition'=>'validasi.step = 1'),
        'jenispenelitian'=>array(self::BELONGS_TO,'JenisPenelitian','jenis_penelitian_id'),
        'file'=>array(self::HAS_MANY,'FilePenelitian','proposal_id','condition'=>'file.status = 1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'pegawai_id' => 'Pegawai',
			'nama_penelitian' => 'Nama Penelitian',
			'jabatan_fungsional_id' => 'Jabatan Fungsional',
			'sub_bidang_id' => 'Sub Bidang',
			'pakar_id' => 'Kepakaran',
			'jenis_penelitian_id' => 'Jenis Penelitian',
			'sumber_dana' => 'Sumber Dana',
			'tahun_anggaran' => 'Tahun Anggaran',
			'keywords' => 'Keywords',
			'klien' => 'Klien',
			'status' => 'Status',
			'step' => 'Step',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('pegawai_id',$this->pegawai_id);
		$criteria->compare('nama_penelitian',$this->nama_penelitian,true);
		$criteria->compare('jabatan_fungsional_id',$this->jabatan_fungsional_id);
		$criteria->compare('sub_bidang_id',$this->sub_bidang_id);
		$criteria->compare('jenis_penelitian_id',$this->jenis_penelitian_id);
		$criteria->compare('tahun_anggaran',$this->tahun_anggaran);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('klien',$this->klien,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('step',$this->step);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function getStatus(){
      
      return (!empty($this->statusDocument[$this->status]) ? $this->statusDocument[$this->status] : '');
  }
  
  public function getPosition(){
      return (!empty($this->positionDocument[$this->step]) ? $this->positionDocument[$this->step] : '');
  }
  
  public function getClients(){
      //print_r($this->clients);
      return $this->clients;
  }
  
  public function isValidasiKasubbid(){
      if ( empty( $this->validasi ) ) return false;
      
      return ( $this->validasi->validasi_kasubbid == 3 ) ;
  }
  
  public function isValidasiKabid(){
      if ( empty( $this->validasi ) ) return false;
      
      return ( $this->validasi->validasi_kabid == 3 ) ;
  }
  
  public function isValidasiPPI(){
      if ( empty( $this->validasi ) ) return false;
      
      return ( $this->validasi->validasi_kabid == 3 && $this->validasi->validasi_kasubbid ==3 ) ;
  }
  
  public function isValidasiPPIEditable(){
    if ( empty( $this->validasi ) ) return false;
      
    return ( $this->validasi->validasi_ppi != ProposalPenelitian::STATUS_SETUJU && $this->validasi->validasi_ppi != ProposalPenelitian::STATUS_TOLAK ) ;
  }
  
  public function isValidasiKapuslit(){
      if ( empty( $this->validasi ) ) return false;
      
      return ( $this->validasi->validasi_kabid == ProposalPenelitian::STATUS_SETUJU 
              && $this->validasi->validasi_kasubbid == ProposalPenelitian::STATUS_SETUJU
              && $this->validasi->validasi_ppi == ProposalPenelitian::STATUS_SETUJU ) ;
  }
  
  public function isValidasiKI(){
      if ( empty( $this->validasi ) ) return false;
      
      return ( $this->validasi->validasi_kapuslit == ProposalPenelitian::STATUS_SETUJU ) ;
  }
  
  public function isValidate(){
      return ($this->step == 1  );
  }
  
  public static function statusDocument($status){
      return ProposalPenelitian::model()->statusDocument[$status];
  }
}
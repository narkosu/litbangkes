<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>
<?php
// sementara
$jenisFile['proposal'] = array('main'=>'Outline / Draft Proposal','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['tor'] = array('main'=>'TOR','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['protokol'] = array('main'=>'Protokol','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['rab'] = array('main'=>'Rap','sub'=>'Upload file dalam bentuk Excel');

?>

<div id="tabs">
   <ul>
      <li><a href="#tabs-1">Informasi Penelitian</a></li>
      <?php if ( Yii::app()->user->isKabid ) { ?>
        <li><a href="#tabs-2">Validasi Porposal Oleh Kabid</a></li>
      <?php } ?>
      <?php if ( Yii::app()->user->isKasubbid ) { ?>
        <li><a href="#tabs-3">Validasi Porposal Oleh KaSubBid</a></li>
       <?php } ?>
      <?php if ( Yii::app()->user->isPPI ) { ?>
        <li><a href="#tabs-4">Validasi Porposal Oleh PPI</a></li>
       <?php } ?>
      <?php if ( Yii::app()->user->isKI ) { ?>
        <li><a <?php echo (($validasi->validasi_ppi == 3 ) ? 'href="#tabs-5"' : '') ?>>Validasi Proposal Oleh Komisi Ilmiah</a></li>
      <?php } ?>
      <?php if ( Yii::app()->user->isKE ) { ?>
        <li><a <?php echo (( $validasi->validasi_ki == 3 && $model->step == 2 ) ? 'href="#tabs-6"' : '') ?>>Validasi Protokol Oleh Komisi Etik</a></li>
      <?php } ?>
   </ul>

   <div id="tabs-1">
      <div class="stdform stdform2">
        <div class="par">
            <label>Status</label>    
            <span class="field">
                <span class="label label-info"><?php echo $model->getStatus() ?></span>
                
                <?php if ( !empty($validasi->validasi_kabid) ) { ?>
                    <span class="label label-info">
                        <?php 

                        echo $validasi->getStatus('validasi_kabid');
                        ?>
                        Kabid
                    </span>
                    <?php } ?>

                    <?php if ( !empty($validasi->validasi_kasubbid) ) { ?>
                    <span class="label label-info">
                        <?php 

                        echo $validasi->getStatus('validasi_kasubbid');
                        ?>
                        Kasubbid
                    </span>
                    <?php } ?>

                    <?php if ( !empty($validasi->validasi_ppi) ) { ?>
                    <span class="label label-info">
                        <?php 

                        echo $validasi->getStatus('validasi_ppi');
                        ?>
                        PPI
                    </span>
                    <?php } ?>
                    <?php if ( !empty($validasi->validasi_ki) ) { ?>
                    <span class="label label-info">
                        <?php 

                        echo $validasi->getStatus('validasi_ki');
                        ?>
                        KI
                     </span>
                    <?php } ?>

                    <?php if ( !empty($validasi->validasi_ke) ) { ?>
                    <span class="label label-info">
                        <?php 

                        echo $validasi->getStatus('validasi_ke');
                        ?>
                        KE
                     </span>
                    <?php } ?>
            </span>
            
            
        </div>

        <div class="par">
            <label>Nama</label>   
            <span class="field">
                <?php echo ucfirst($model->pegawai->nama) ?>
            </span>
        </div>
        <div class="par">
            <label>NIP</label>   
            <span class="field">
                <?php echo ucfirst($model->pegawai->nip) ?>
            </span>
        </div>
        <div class="par">
            <label>Satuan Kerja</label>   
            <span class="field">
                <?php ?>
            </span>
        </div>
        <div class="par">
            <label>Jabatan Fungsional</label>   
            <span class="field">
                <?php echo $model->jabatan->nama ?>
            </span>
        </div>
        <div class="par">
            <label>Sub Bidang</label>   
            <span class="field">
                <?php echo $model->subbidang->nama ?>
            </span>
        </div>
        <div class="par">
            <label>Judul Penelitian</label>   
            <span class="field">
                <?php echo $model->nama_penelitian ?>
            </span>

        </div>

        <div class="par">
            <label>Jenis Penelitian</label>  
            <span class="field">
                <?php echo $model->jenispenelitian->nama ?>
            </span>

        </div>
          <?php if ( $modelFile ){ 
            foreach ($modelFile as $file ){
            ?>
                <div class="par">
                    <label><?php echo $jenisFile[$file->group_file]['main'] ?>
                    <small><?php echo $jenisFile[$file->group_file]['sub'] ?></small></label>  
                        <span class="field">
                          <a href="<?php echo $file->filename; ?>"><?php echo $file->filename; ?></a>
                       </span>
                </div>
            <?php
              }
            } ?>
        

        <div class="par">
            <label>Tahun Anggaran</label>  
            <span class="field">
                <?php echo $model->tahun_anggaran; ?>
            </span>

        </div>

        <div class="par">
            <label>Keywords / Tags</label>  
            <span class="field">
                <?php echo  $model->keywords ?>
                
            </span>

        </div>

        <div class="par">
            <label>Klien</label> 
            <span class="field">
            <?php echo $model->klien; ?>
            </span>
        </div>
        <?php if ( $model->status == 0 ) { ?>
        <p class="stdformbutton">
        <button class="btn btn-primary">Pengajuan</button>
        </p>
        <?php } ?>
    </div>

   </div> <!-- tabs-1 -->
   
 <?php if ( Yii::app()->user->isKabid ) { ?>
   <div id="tabs-2">
       <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'validasi-ppi-form',
        'enableAjaxValidation'=>false,
         'htmlOptions'=>array('class'=>'stdform stdform2')
      )); ?>
      <input type="hidden" name="group_validasi" value="kabid">
        <p>
            <label>Ditolak Oleh KaBid</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_kabid]" value="4" <?php echo ( $validasi->validasi_kabid == 4 ? 'checked' : '');?> /> 
            </span>
        </p>

        <p>
            <label>Direvisi Oleh KaBid</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_kabid]" value="2" <?php echo ( $validasi->validasi_kabid == 2 ? 'checked' : '');?> />
            </span>
        </p>

        <p>
            <label>Disetujui Oleh KaBid</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_kabid]" value="3" <?php echo ( $validasi->validasi_kabid == 3 ? 'checked' : '');?> />
            </span>
        </p>
        <p class="stdformbutton">
                <button type="submit" class="btn btn-primary">Validasi</button>
            </p>
     <?php $this->endWidget(); ?>

   </div> <!-- tabs-2 -->
    <?php } ?>
    <?php if ( Yii::app()->user->isKasubbid ) { ?>
   <div id="tabs-3">
       <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'validasi-ppi-form',
        'enableAjaxValidation'=>false,
         'htmlOptions'=>array('class'=>'stdform stdform2')
      )); ?>
      <input type="hidden" name="group_validasi" value="kasubbid">
        <p>
            <label>Ditolak Oleh KaSubBid</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_kasubbid]" value="4" <?php echo ( $validasi->validasi_kasubbid == 4 ? 'checked' : '');?> /> 
            </span>
        </p>

        <p>
            <label>Direvisi Oleh KaSubBid</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_kasubbid]" value="2" <?php echo ( $validasi->validasi_kasubbid == 2 ? 'checked' : '');?> />
            </span>
        </p>

        <p>
            <label>Disetujui Oleh KaSubBid</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_kasubbid]" value="3" <?php echo ( $validasi->validasi_kasubbid == 3 ? 'checked' : '');?> />
            </span>
        </p>
        <p class="stdformbutton">
                <button type="submit" class="btn btn-primary">Validasi</button>
            </p>
     <?php $this->endWidget(); ?>

   </div> <!-- tabs-3 -->
   <?php } ?>
    <?php if ( Yii::app()->user->isPPI ) { ?>
   <div id="tabs-4">
       <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'validasi-ppi-form',
        'enableAjaxValidation'=>false,
         'htmlOptions'=>array('class'=>'stdform stdform2')
      )); ?>
      <input type="hidden" name="group_validasi" value="ppi">
        <p>
            <label>Ditolak Oleh PPI</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_ppi]" value="4" <?php echo ( $validasi->validasi_ppi == 4 ? 'checked' : '');?> /> 
            </span>
        </p>

        <p>
            <label>Direvisi Oleh PPI</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_ppi]" value="2" <?php echo ( $validasi->validasi_ppi == 2 ? 'checked' : '');?> />
            </span>
        </p>

        <p>
            <label>Disetujui Oleh PPI</label>
            <span class="field">
                <input type="radio" name="ProposalValidasi[validasi_ppi]" value="3" <?php echo ( $validasi->validasi_ppi == 3 ? 'checked' : '');?> />
            </span>
        </p>
        <p class="stdformbutton">
                <button type="submit" class="btn btn-primary">Validasi</button>
            </p>
     <?php $this->endWidget(); ?>

   </div> <!-- tabs-4 -->
    <?php } ?>
    <?php if ( Yii::app()->user->isKI ) { ?>
   <div id="tabs-5" <?php echo (($validasi->validasi_ppi == 3 ) ? '' : 'style="display:none;"') ?>>

      <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'validasi-ppi-form',
        'enableAjaxValidation'=>false,
         'htmlOptions'=>array('class'=>'stdform stdform2')
      )); ?>
       <input type="hidden" name="group_validasi" value="ki">
        <p>
            <label>Ditolak Oleh KI</label>
            <span class="field"><input type="radio" name="ProposalValidasi[validasi_ki]" value="4" <?php echo ( $validasi->validasi_ki == 4 ? 'checked' : '');?> /></span>
        </p>

        <p>
            <label>Disetujui Oleh KI</label>
            <span class="field"><input type="radio" name="ProposalValidasi[validasi_ki]" value="3" <?php echo ( $validasi->validasi_ki == 3 ? 'checked' : '');?> /></span>
        </p>
        <p class="stdformbutton">
                <button type="submit" class="btn btn-primary">Validasi</button>
            </p>
     <?php $this->endWidget(); ?>

   </div> <!-- tabs-5 -->
    <?php } ?>
    <?php if ( Yii::app()->user->isKE ) { ?>
   <div id="tabs-6" <?php echo (( $validasi->validasi_ki == 3 && $model->step == 2 ) ? '' : 'style="display:none;"') ?>>

      <form id="formpengajuan" class="stdform stdform2" method="post" action="">     
        <p>
            <label>Direvisi Oleh KE</label>
            <span class="field"><input type="checkbox" name="check2" /></span>
        </p>

        <p>
            <label>Diseutjui Oleh KI</label>
            <span class="field"><input type="checkbox" name="check2" /></span>
        </p>

        <p class="stdformbutton">
                <button class="btn btn-primary">Validasi</button>
            </p>
     </form>                       		

   </div> <!-- tabs-4 -->
    <?php } ?>


</div>                    

<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>


<div id="tabs">
   <ul>
      <li><a href="#tabs-1">Informasi Penelitian</a></li>
      <li><a href="#tabs-2">Validasi Porposal Oleh PPI</a></li>
      <li><a <?php echo (($validasi->validasi_ppi == 3 ) ? 'href="#tabs-3"' : '') ?>>Validasi Proposal Oleh Komisi Ilmiah</a></li>
      <li><a <?php echo (( $validasi->validasi_ki == 3 && $model->step == 2 ) ? 'href="#tabs-4"' : '') ?>>Validasi Protokol Oleh Komisi Etik</a></li>
   </ul>

   <div id="tabs-1">
      <div class="stdform stdform2">
        <div class="par">
            <label>Status</label>    
            <span class="field">
                <span class="label label-info"><?php echo $model->getStatus() ?></span>

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

   <div id="tabs-2">
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

   </div> <!-- tabs-2 -->

   <div id="tabs-3" <?php echo (($validasi->validasi_ppi == 3 ) ? '' : 'style="display:none;"') ?>>

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

   </div> <!-- tabs-3 -->

   <div id="tabs-4" <?php echo (( $validasi->validasi_ki == 3 && $model->step == 2 ) ? '' : 'style="display:none;"') ?>>

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



</div>                    

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
        <li><a href="#tabs-2">Progress Triwulan 1</a></li>
        <li><a href="#tabs-3">Progress Triwulan 2</a></li>
        <li><a href="#tabs-4">Progress Triwulan 3</a></li>
        <li><a href="#tabs-5">Progress Triwulan 4</a></li>
    </ul>

    <div id="tabs-1">
        <div class="par">
                <label>Status</label>    
                <span class="field">
                    <?php
                    if ($model->status == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($model->status == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($model->status == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php echo $model->getStatus() ?>
                    </span>
                    :
                    <?php if (!empty($validasi->validasi_kabid)) { ?>
                        <?php
                        if ($validasi->validasi_kabid == 3) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kabid == 2) { // revisi
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kabid == 4) { //ditolak
                            $labelValidasi = 'label-important';
                        } else {
                            $labelValidasi = 'label-info';
                        }
                        ?>
                        <span class="label <?php echo $labelValidasi ?>">
                            <?php
                            echo $validasi->getStatus('validasi_kabid');
                            ?>
                            Kabid
                        </span>
                    <?php } ?>

                    <?php if (!empty($validasi->validasi_kasubbid)) { ?>
                        <?php
                        if ($validasi->validasi_kasubbid == 3) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kasubbid == 2) { // revisi
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kasubbid == 4) { //ditolak
                            $labelValidasi = 'label-important';
                        } else {
                            $labelValidasi = 'label-info';
                        }
                        ?>
                        <span class="label <?php echo $labelValidasi ?>">
                            <?php
                            echo $validasi->getStatus('validasi_kasubbid');
                            ?>
                            Kasubbid
                        </span>
                    <?php } ?>

                    <?php if (!empty($validasi->validasi_ppi)) { ?>
                        <?php
                        if ($validasi->validasi_ppi == 3) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_ppi == 2) { // revisi
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_ppi == 4) { //ditolak
                            $labelValidasi = 'label-important';
                        } else {
                            $labelValidasi = 'label-info';
                        }
                        ?>
                        <span class="label <?php echo $labelValidasi ?>">
                            <?php
                            echo $validasi->getStatus('validasi_ppi');
                            ?>
                            PPI
                        </span>
                    <?php } ?>
                    <?php if (!empty($validasi->validasi_kapuslit)) { ?>
                        <?php
                        if ($validasi->validasi_kapuslit == 3) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kapuslit == 2) { // revisi
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kapuslit == 4) { //ditolak
                            $labelValidasi = 'label-important';
                        } else {
                            $labelValidasi = 'label-info';
                        }
                        ?>
                        <span class="label <?php echo $labelValidasi ?>">
                            <?php
                            echo $validasi->getStatus('validasi_kapuslit');
                            ?>
                            Kapuslit
                        </span>
                    <?php } ?>
                    
                    <?php if (!empty($validasi->validasi_ki)) { ?>
                        <?php
                        if ($validasi->validasi_ki == 3) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_ki == 2) { // revisi
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_ki == 4) { //ditolak
                            $labelValidasi = 'label-important';
                        } else {
                            $labelValidasi = 'label-info';
                        }
                        ?>
                        <span class="label <?php echo $labelValidasi ?>">
                            <?php
                            echo $validasi->getStatus('validasi_ki');
                            ?>
                            KI
                        </span>
                    <?php } ?>
                    
                    

                    <?php /*if (!empty($validasi->validasi_ke)) { ?>
                        <?php
                        if ($validasi->validasi_ke == 3) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_ke == 2) { // revisi
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_ke == 4) { //ditolak
                            $labelValidasi = 'label-important';
                        } else {
                            $labelValidasi = 'label-info';
                        }
                        ?>
                        <span class="label <?php echo $labelValidasi ?>">
                            <?php
                            echo $validasi->getStatus('validasi_ke');
                            ?>
                            KE
                        </span>
                    <?php } */ ?>
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
        
    </div>        

    <div id="tabs-2">
                         
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'progres-penelitian-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'stdform stdform2', 'enctype'=>'multipart/form-data')
          )); ?>
        <?php $form->hiddenField($modelProgres,'periode',array('value'=>'triwulan1')) ?>
          <p>
              <label>Pagu (Rp.)</label>
              <span class="field">
                  <?php echo $form->textField($modelProgres,'pagu',array('class'=>'input-medium')); ?>
                  
              </span>
          </p>

          <p>
              <label>Tanggal Pengajuan Etik</label>
              <span class="field">
                <?php echo $form->textField($modelProgres,'tanggal_pangajuan_etik',array('class'=>'input-small','id'=>'datepicker')); ?>  
                 &nbsp; <small><em>mm / dd / yyyy</em></small>
              </span>
          </p>

          <p>
              <label>Ijin Etik <small>Upload file dalam bentuk PDF</small></label>
              <span class="field">
                <?php echo $form->fileField($modelProgres,'file_ijin_etik',array('class'=>'uniform-file')); ?>
              </span>
          </p>

          <p>
              <label>Narasi</label>
              <span class="field">
                  
              <textarea cols="80" rows="3" name="ProgresPenelitian[narasi]" id="ProgresPenelitian_narasi" class="span9"><?php echo $modelProgres->narasi?></textarea>
          </p>

          <p>
              <label>Realisasi Anggaran (Rp.)</label>
              <span class="field">
                  <?php echo $form->textField($modelProgres,'realisasi_anggaran',array('class'=>'input-medium')); ?>
              </span>
          </p>

          <p>
              <label>Masalah / Kendala</label>
              <span class="field">
              <textarea cols="80" rows="3" name="ProgresPenelitian[masalah]" id="ProgresPenelitian_masalah" class="span9"><?php echo $modelProgres->masalah?></textarea>
              </span>
          </p>

          <p>
              <label>Tindak Lanjut</label>
              <span class="field">
              <textarea cols="80" rows="3" name="ProgresPenelitian[tindak_lanjut]" id="ProgresPenelitian_tindak_lanjut" class="span9"><?php echo $modelProgres->tindak_lanjut?></textarea>
              </span>
          </p>

          <p class="stdformbutton">
              <button class="btn btn-primary">Submit Pogress</button>
          </p>
        <?php $this->endWidget(); ?>

     </div> <!-- tabs-2 -->

    <div id="tabs-3">
    </div> <!-- tabs-3 -->

    <div id="tabs-4">
    </div> <!-- tabs-4 -->

    <div id="tabs-5">
    </div> <!-- tabs-5 -->

</div>
<script type="text/javascript">
  jQuery(document).ready(function(){
      jQuery('.uniform-file').uniform();
  });
</script> 
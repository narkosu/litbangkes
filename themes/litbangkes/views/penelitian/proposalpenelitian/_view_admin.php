<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>
<?php
// sementara
$jenisFile['proposal'] = array('main' => 'Outline / Draft Proposal', 'sub' => 'Upload file dalam bentuk PDF');
$jenisFile['tor'] = array('main' => 'TOR', 'sub' => 'Upload file dalam bentuk PDF');
$jenisFile['protokol'] = array('main' => 'Protokol', 'sub' => 'Upload file dalam bentuk PDF');
$jenisFile['rab'] = array('main' => 'Rap', 'sub' => 'Upload file dalam bentuk Excel');

?>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Informasi Penelitian</a></li>
        <?php if ($this->AccessAsKasubbid()) { ?>
            <li><a href="#tabs-3">Validasi Oleh KaSubBid</a></li>
        <?php } ?>

        <?php if ($this->AccessAsKabid() && $model->isValidasiKabid() ) { ?>
            <li><a href="#tabs-2">Validasi Oleh Kabid</a></li>
        <?php } ?>

        <?php if ($this->AccessAsPPI() && $model->isValidasiPPI()) { ?>
            <li><a href="#tabs-4">Validasi Oleh PPI</a></li>
        <?php } ?>
        <?php if ($this->AccessAsKapuslit() && $model->isValidasiKapuslit()) { ?>
            <li><a href="#tabs-validasi-kaspulit">Validasi Oleh Kapuslit</a></li>
        <?php } ?>
        <?php if ($this->AccessAsKI() && $model->isValidasiKI()) { ?>
            <li><a href="#tabs-5">Validasi Oleh Komisi Ilmiah</a></li>
        <?php } ?>
            <li><a href="#tabs-6">History Validasi</a></li>
            <li style="clear:both;"></li>
    </ul>

    <div id="tabs-1">
        <div class="stdform stdform2">
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
                    <?php echo $model->pegawai->satuan_kerja?>
                </span>
            </div>
            <div class="par">
                <label>Jabatan Fungsional</label>   
                <span class="field">
                    <?php echo $model->jabatanfungsi->nama ?>
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
            
            <?php /*
              <div class="par">
              <label>Jenis Penelitian</label>
              <span class="field">
              <?php echo $model->jenispenelitian->nama ?>
              </span>

              </div>
             * 
             */ ?>
            
            <div class="par">
                <label>Kepakaran</label>  
                <span class="field">
                    <?php if ( !empty($model->pakar) ) { ?>
                    <?php echo $model->pakar->nama_kepakaran ?>
                    <?php } ?>
                </span>

            </div>
 
            
            <?php
            if ($modelFile) {
                foreach ($modelFile as $file) {
                    ?>
                    <div class="par">
                        <label><?php echo $jenisFile[$file->group_file]['main'] ?>
                            <small><?php echo $jenisFile[$file->group_file]['sub'] ?></small></label>  
                        <span class="field">
                            <a href="<?php echo Yii::app()->createUrl('penelitian/file/download') . '?file=' . $file->filename ?>">
                                <?php echo $file->filename; ?>
                            </a>
                        </span>
                    </div>
                    <?php
                }
            }
            ?>
            
             
            <div class="par">
                <label>Sumber Dana</label>  
                <span class="field">
                    <?php if ( !empty($model->sumberdana) ) { ?>
                    <?php echo $model->sumberdana->name; ?>
                    <?php } ?>
                </span>

            </div>

            <div class="par">
                <label>Detail Sumber Dana</label>  
                <span class="field">
                    <?php if ( !empty($model->detailsumberdana) ) { ?>
                    <?php echo $model->detailsumberdana->nama; ?>
                    <?php } ?>
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
                    <?php echo $model->keywords ?>

                </span>

            </div>

            <div class="par">
                <label>Isu Strategis</label>  
                <span class="field">
                    <?php if ( !empty($model->isustrategis) ) { ?>
                      <?php echo $model->isustrategis->tahun.' : '.$model->isustrategis->isu_strategis; ?>  
                    <?php } ?>
                </span>

            </div>

            <div class="par">
                <label>Klien</label> 
                <span class="field">
                <?php if ( !empty($model->nmklien) ) { ?>   
                    <?php echo $model->nmklien->name; ?>
                <?php } ?>
                </span>
            </div>
        </div>

    </div> <!-- tabs-1 -->

    <?php 
    
    if ( $this->AccessAsKabid() && $model->isValidasiKabid() ) { 
        
        ?>
    
        <div id="tabs-2">
            <?php if ($model->isValidate() && $model->isValidasiKabidEditable()) { ?>

                <?php
                
                
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2', 'enctype'=>'multipart/form-data')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="kabid">
                <p>
                    <label>Ditolak Oleh KaBid</label>
                    <span class="field">
                        <input type="radio" group="kabid" class="validasiOption" name="ProposalValidasi[validasi_kabid]" value="4" <?php echo ( $validasi->validasi_kabid == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh KaBid</label>
                    <span class="field">
                        <input type="radio" group="kabid" class="validasiOption" name="ProposalValidasi[validasi_kabid]" value="2" <?php echo ( $validasi->validasi_kabid == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh KaBid</label>
                    <span class="field">
                        <input type="radio" group="kabid" class="validasiOption" name="ProposalValidasi[validasi_kabid]" value="3" <?php echo ( $validasi->validasi_kabid == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
                    </span>
                </p>
                
                <p id="kabid_revisi_file" style="display:none;">
                    <label>File Pendukung</label>
                    <span class="field">
                        <input type="file" name="ProposalValidasiHistory[file]" class="uniform-file">
                    </span>
                </p>
                
                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                <?php $this->endWidget(); ?>
            <?php } else { 
               //die; 
                ?>
                 <?php
                    if ($validasi->validasi_kabid == ProposalPenelitian::STATUS_SETUJU) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kabid == ProposalPenelitian::STATUS_REVISI ) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kabid == ProposalPenelitian::STATUS_TOLAK ) { //ditolak
                        $labelValidasi = 'label-important';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_kabid) ?>
                    </span>    
                </p>
            <?php } ?>  
        </div> <!-- tabs-2 -->
    <?php } ?>

    <?php if ( $this->AccessAsKasubbid() ) { ?>
        <div id="tabs-3">
            <?php if ( $model->isValidate() && !$model->isValidasiKasubbid()) { ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2', 'enctype'=>'multipart/form-data')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="kasubbid">
                <p>
                    <label>Ditolak Oleh KaSubBid</label>
                    <span class="field">
                        <input type="radio" group="kasubbid" class="validasiOption" name="ProposalValidasi[validasi_kasubbid]" value="4" <?php echo ( $validasi->validasi_kasubbid == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh KaSubBid</label>
                    <span class="field">
                        <input type="radio" group="kasubbid" class="validasiOption" name="ProposalValidasi[validasi_kasubbid]" value="2" <?php echo ( $validasi->validasi_kasubbid == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh KaSubBid</label>
                    <span class="field">
                        <input type="radio" group="kasubbid" class="validasiOption" name="ProposalValidasi[validasi_kasubbid]" value="3" <?php echo ( $validasi->validasi_kasubbid == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
                    </span>
                </p>
                <p id="kasubbid_revisi_file" style="display:none;">
                    <label>File Pendukung</label>
                    <span class="field">
                        <input type="file" name="ProposalValidasiHistory[file]" class="uniform-file">
                    </span>
                </p>
                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                <?php $this->endWidget(); ?>
            <?php } else { ?>  
                <?php
                    if ($validasi->validasi_kasubbid == ProposalPenelitian::STATUS_SETUJU) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kasubbid == ProposalPenelitian::STATUS_REVISI ) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kasubbid == ProposalPenelitian::STATUS_TOLAK ) { //ditolak
                        $labelValidasi = 'label-important';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_kasubbid) ?>
                    </span>    
                </p>
            <?php } ?>       
        </div> <!-- tabs-3 -->
    <?php } ?>

    <?php if ($this->AccessAsPPI() && $model->isValidasiPPI()) { ?>

        <div id="tabs-4">
            <?php if ( $model->isValidate() && $model->isValidasiPPIEditable()) { ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2', 'enctype'=>'multipart/form-data')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="ppi">
                <p>
                    <label>Ditolak Oleh PPI</label>
                    <span class="field">
                        <input type="radio" group="ppi" class="validasiOption" name="ProposalValidasi[validasi_ppi]" value="4" <?php echo ( $validasi->validasi_ppi == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh PPI</label>
                    <span class="field">
                        <input type="radio" group="ppi" class="validasiOption" name="ProposalValidasi[validasi_ppi]" value="2" <?php echo ( $validasi->validasi_ppi == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh PPI</label>
                    <span class="field">
                        <input type="radio" group="ppi" class="validasiOption" name="ProposalValidasi[validasi_ppi]" value="3" <?php echo ( $validasi->validasi_ppi == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
                    </span>
                </p>
                <p id="ppi_revisi_file" style="display:none;">
                    <label>File Pendukung</label>
                    <span class="field">
                        <input type="file" name="ProposalValidasiHistory[file]" class="uniform-file">
                    </span>
                </p>
                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                <?php $this->endWidget(); ?>
            <?php } else { ?>  
                <?php
                    if ($validasi->validasi_ppi == ProposalPenelitian::STATUS_SETUJU) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ppi == ProposalPenelitian::STATUS_REVISI ) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ppi == ProposalPenelitian::STATUS_TOLAK ) { //ditolak
                        $labelValidasi = 'label-important';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_ppi) ?>
                    </span>    
                </p>
            <?php } ?>
        </div> <!-- tabs-4 -->
    <?php } ?>
    <!-- Kapuslit -->
    <?php if ($this->AccessAsKapuslit() && $model->isValidasiKapuslit()) { ?>    

        <div id="tabs-validasi-kaspulit">
            <?php if ($model->isValidate() && $model->isValidasiKapuslitEditable()) { ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2', 'enctype'=>'multipart/form-data')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="kapuslit">
                <p>
                    <label>Ditolak Oleh Kapuslit</label>
                    <span class="field">
                        <input type="radio" group="kapuslit" class="validasiOption" name="ProposalValidasi[validasi_kapuslit]" value="4" <?php echo ( $validasi->validasi_kapuslit == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh Kapuslit</label>
                    <span class="field">
                        <input type="radio" group="kapuslit" class="validasiOption" name="ProposalValidasi[validasi_kapuslit]" value="2" <?php echo ( $validasi->validasi_kapuslit == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh Kapuslit</label>
                    <span class="field">
                        <input type="radio" group="kapuslit" class="validasiOption" name="ProposalValidasi[validasi_kapuslit]" value="3" <?php echo ( $validasi->validasi_kapuslit == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
                    </span>
                </p>
                <p id="kapuslit_revisi_file" style="display:none;">
                    <label>File Pendukung</label>
                    <span class="field">
                        <input type="file" name="ProposalValidasiHistory[file]" class="uniform-file">
                    </span>
                </p>
                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>
                <?php $this->endWidget(); ?>
            <?php } else { ?>  
                <?php
                    if ($validasi->validasi_kapuslit == ProposalPenelitian::STATUS_SETUJU) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kapuslit == ProposalPenelitian::STATUS_REVISI ) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_kapuslit == ProposalPenelitian::STATUS_TOLAK ) { //ditolak
                        $labelValidasi = 'label-important';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_kapuslit) ?>
                    </span>    
                </p>
            <?php } ?>


        </div> <!-- tabs-kapuslit -->
    <?php } ?>

    <?php if ($this->AccessAsKI() && $model->isValidasiKI()) { ?>

        <div id="tabs-5" <?php echo (($validasi->validasi_ppi == 3 ) ? '' : 'style="display:none;"') ?>>
            <?php if ($model->isValidate() && $model->isValidasiKIEditable()) { ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2', 'enctype'=>'multipart/form-data')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="ki">
                <p>
                    <label>Ditolak Oleh KI</label>
                    <span class="field"><input type="radio" group="ki" class="validasiOption" name="ProposalValidasi[validasi_ki]" value="4" <?php echo ( $validasi->validasi_ki == 4 ? 'checked' : ''); ?> /></span>
                </p>
                <p>
                    <label>Revisi Oleh KI</label>
                    <span class="field"><input type="radio" group="ki" class="validasiOption" name="ProposalValidasi[validasi_ki]" value="2" <?php echo ( $validasi->validasi_ki == 2 ? 'checked' : ''); ?> /></span>
                </p>

                <p>
                    <label>Disetujui Oleh KI</label>
                    <span class="field"><input type="radio" group="ki" class="validasiOption" name="ProposalValidasi[validasi_ki]" value="3" <?php echo ( $validasi->validasi_ki == 3 ? 'checked' : ''); ?> /></span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
                    </span>
                </p>
                <p id="ki_revisi_file" style="display:none;">
                    <label>File Pendukung</label>
                    <span class="field">
                        <input type="file" name="ProposalValidasiHistory[file]" class="uniform-file">
                    </span>
                </p>
                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                <?php $this->endWidget(); ?>
            <?php } else { ?>  
                 <?php
                    if ($validasi->validasi_ki == ProposalPenelitian::STATUS_SETUJU) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ki == ProposalPenelitian::STATUS_REVISI ) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ki == ProposalPenelitian::STATUS_TOLAK ) { //ditolak
                        $labelValidasi = 'label-important';
                    } else {
                        $labelValidasi = 'label-info';
                    }
                    ?>
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
                        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_ki) ?>
                    </span>    
                </p>
            <?php } ?>
        </div> <!-- tabs-5 -->
    <?php } ?>
        <div id="tabs-6">
            <?php if ( !empty($historyValidasi) ) { ?>
                <div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">


                <table class="table table-bordered" id="dyntable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0 nosort center">No</th>
                            <th class="head0">Judul Penelitian</th>
                            <th class="head0 center">Posisi Proposal</th>
                            <th class="head1 center">Level Validasi</th>
                            <th class="head0 center">Validasi</th>
                            <th class="head0 center">Alasan</th>
                            <th class="head0 center">File Pendukung</th>
                            <th class="head0 center">Diedit oleh</th>
                            <th class="head0 center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if ( !empty($historyValidasi) )
                        foreach ($historyValidasi as $index => $log) { ?>
                            <tr class="gradeX">
                                <td class="center"><?php echo $no ?></td>
                                <td><?php echo $log->proposal->nama_penelitian ?></td>
                                <td class="center"><?php echo ProposalPenelitian::documentPosition($log->step) ?></td>
                                <td class="center">
                                    <?php echo strtoupper($log->level_validasi) ?>
                                </td>

                                <td class="center"><?php echo ProposalPenelitian::statusValidasi($log->value_validasi) ?></td>
                                <td class="center"><?php echo $log->alasan ?></td>
                                <td class="center">
                                    <?php if ( !empty($log->file) ) { ?>
                                        <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file=history/'.$log->file ?>"><?php echo $log->file ?></a>
                                    <?php } ?>
                                </td>
                                <td class="left"><?php echo $log->oleh->username ?></td>
                                <td class="center">
                                    <?php echo $log->created_at ?>

                                </td>
                            </tr>
                        <?php 
                            $no++;
                        } ?>

                    </tbody>
                </table>

                <div class="pagination pagination-centered pagination-small" >
                    <?php
                    /*
                    $this->widget('CLinkPager', array(
                        'pages' => $pages,
                    ));*/
                    ?>
                </div>


                <?php /*  <div class="pagination pagination-centered pagination-small">
                    <ul>
                      <li><a href="#">Previous</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">6</a></li>
                      <li><a href="#">Next</a></li>
                    </ul>
                  </div>
                  */?>
                </div>
            <?php } ?>
        </div>

</div>                    
<script type="text/javascript">
  jQuery(document).ready(function(){
      jQuery('.uniform-file').uniform();
      
      jQuery('.validasiOption').click(function(){
          var groupvalidasi = jQuery(this).attr('group');
          var validasivalue = jQuery(this).val();
          if ( validasivalue == 2 || validasivalue == 4) {
              jQuery("#"+groupvalidasi+"_revisi_file").show();
          }else{
              jQuery("#"+groupvalidasi+"_revisi_file").hide();
          }
      });
  });
</script>
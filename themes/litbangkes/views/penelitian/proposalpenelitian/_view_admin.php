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
            <li><a href="#tabs-3">Validasi Porposal Oleh KaSubBid</a></li>
        <?php } ?>

        <?php if ($this->AccessAsKabid() && $validasi->validasi_kasubbid == 3 ) { ?>
            <li><a href="#tabs-2">Validasi Porposal Oleh Kabid</a></li>
        <?php } ?>

        <?php if ($this->AccessAsPPI() && $model->isValidasiPPI()) { ?>
            <li><a href="#tabs-4">Validasi Porposal Oleh PPI</a></li>
        <?php } ?>
        <?php if ($this->AccessAsKapuslit() && $model->isValidasiKapuslit()) { ?>
            <li><a href="#tabs-validasi-kaspulit">Validasi Porposal Oleh Kapuslit</a></li>
        <?php } ?>
        <?php if ($this->AccessAsKI() && $model->isValidasiKI()) { ?>
            <li><a <?php echo (($validasi->validasi_ppi == 3 ) ? 'href="#tabs-5"' : '') ?>>Validasi Proposal Oleh Komisi Ilmiah</a></li>
        <?php } ?>
        <?php if ($this->AccessAsKE() && Yii::app()->user->isKE) { ?>
            <li><a <?php echo (( $validasi->validasi_ki == 3 && $model->step == 2 ) ? 'href="#tabs-6"' : '') ?>>Validasi Protokol Oleh Komisi Etik</a></li>
        <?php } ?>
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
            <?php /*
              <div class="par">
              <label>Jenis Penelitian</label>
              <span class="field">
              <?php echo $model->jenispenelitian->nama ?>
              </span>

              </div>
             * 
             */ ?>
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
                <label>Klien</label> 
                <span class="field">
                    <?php echo $model->klien; ?>
                </span>
            </div>
            <?php if ($model->status == 0) { ?>
                <p class="stdformbutton">
                    <button class="btn btn-primary">Pengajuan</button>
                </p>
            <?php } ?>
        </div>

    </div> <!-- tabs-1 -->

    <?php if ( $this->AccessAsKabid() && $validasi->validasi_kasubbid == 3 ) { ?>
        <div id="tabs-2">
            <?php if ($model->isValidate() && !$model->isValidasiKabid()) { ?>

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="kabid">
                <p>
                    <label>Ditolak Oleh KaBid</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kabid]" value="4" <?php echo ( $validasi->validasi_kabid == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh KaBid</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kabid]" value="2" <?php echo ( $validasi->validasi_kabid == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh KaBid</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kabid]" value="3" <?php echo ( $validasi->validasi_kabid == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
                    </span>
                </p>
                
                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                <?php $this->endWidget(); ?>
            <?php } else { ?>
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
                    'htmlOptions' => array('class' => 'stdform stdform2')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="kasubbid">
                <p>
                    <label>Ditolak Oleh KaSubBid</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kasubbid]" value="4" <?php echo ( $validasi->validasi_kasubbid == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh KaSubBid</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kasubbid]" value="2" <?php echo ( $validasi->validasi_kasubbid == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh KaSubBid</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kasubbid]" value="3" <?php echo ( $validasi->validasi_kasubbid == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
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
                    'htmlOptions' => array('class' => 'stdform stdform2')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="ppi">
                <p>
                    <label>Ditolak Oleh PPI</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_ppi]" value="4" <?php echo ( $validasi->validasi_ppi == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh PPI</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_ppi]" value="2" <?php echo ( $validasi->validasi_ppi == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh PPI</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_ppi]" value="3" <?php echo ( $validasi->validasi_ppi == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
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
            <?php if ($model->isValidate()) { ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="kapuslit">
                <p>
                    <label>Ditolak Oleh Kapuslit</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kapuslit]" value="4" <?php echo ( $validasi->validasi_kapuslit == 4 ? 'checked' : ''); ?> /> 
                    </span>
                </p>

                <p>
                    <label>Direvisi Oleh Kapuslit</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kapuslit]" value="2" <?php echo ( $validasi->validasi_kapuslit == 2 ? 'checked' : ''); ?> />
                    </span>
                </p>

                <p>
                    <label>Disetujui Oleh Kapuslit</label>
                    <span class="field">
                        <input type="radio" name="ProposalValidasi[validasi_kapuslit]" value="3" <?php echo ( $validasi->validasi_kapuslit == 3 ? 'checked' : ''); ?> />
                    </span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
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
            <?php if ($model->isValidate()) { ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'validasi-ppi-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'stdform stdform2')
                ));
                ?>
                <input type="hidden" name="group_validasi" value="ki">
                <p>
                    <label>Revisi Oleh KI</label>
                    <span class="field"><input type="radio" name="ProposalValidasi[validasi_ki]" value="2" <?php echo ( $validasi->validasi_ki == 2 ? 'checked' : ''); ?> /></span>
                </p>

                <p>
                    <label>Disetujui Oleh KI</label>
                    <span class="field"><input type="radio" name="ProposalValidasi[validasi_ki]" value="3" <?php echo ( $validasi->validasi_ki == 3 ? 'checked' : ''); ?> /></span>
                </p>
                <p>
                    <label>Alasan</label>
                    <span class="field">
                        <textarea name="ProposalValidasi[alasan]" class="input-xxlarge"></textarea>
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

    <?php /*
      <?php if (Yii::app()->user->isKE) { ?>
      <div id="tabs-6" <?php echo (( $validasi->validasi_ki == 3 && $model->step == 2 ) ? '' : 'style="display:none;"') ?>>
      <?php if ($model->isValidate()) { ?>
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
      <?php } else { ?>
      <p><?php echo $model->getStatus() ?></p>
      <?php } ?>
      </div> <!-- tabs-4 -->
      <?php } ?>
     */ ?>


</div>                    

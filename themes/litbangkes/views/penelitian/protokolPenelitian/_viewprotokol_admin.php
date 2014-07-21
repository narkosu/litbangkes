<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Informasi Penelitian</a></li>
        <?php if (Yii::app()->user->isKabid) { ?>
            <li><a href="#tabs-2">Validasi Porposal Oleh Kabid</a></li>
        <?php } ?>
        <?php if (Yii::app()->user->isKasubbid) { ?>
            <li><a href="#tabs-3">Validasi Porposal Oleh KaSubBid</a></li>
        <?php } ?>
        <?php if ((Yii::app()->user->isPPI || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin) && $model->isValidasiPPI()) { ?>
            <li><a href="#tabs-4">Validasi Porposal Oleh PPI</a></li>
        <?php } ?>
        <?php if ((Yii::app()->user->isKapuslit || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin) && $model->isValidasiKapuslit()) { ?>
            <li><a href="#tabs-validasi-kaspulit">Validasi Porposal Oleh Kapuslit</a></li>
        <?php } ?>

    </ul>

    <div id="tabs-1">
        <div class="par">
            <label>Status</label>    
            <span class="field">
                <?php
                if ($modelProtokol->status == 3) {
                    $labelValidasi = 'label-success';
                } else if ($modelProtokol->status == 2) { // revisi
                    $labelValidasi = 'label-success';
                } else if ($modelProtokol->status == 4) { //ditolak
                    $labelValidasi = 'label-important';
                } else if ($modelProtokol->status == 1) { //progres
                    $labelValidasi = 'label-warning';
                } else {
                    $labelValidasi = 'label-info';
                }
                ?>
                <span class="label <?php echo $labelValidasi ?>">
                    <?php echo $modelProtokol->getStatus() ?>
                </span>
                :
                <?php if (!empty($validasi->validasi_ppi)) { ?>
                    <?php
                    if ($validasi->validasi_ppi == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ppi == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ppi == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
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
                <?php if (!empty($validasi->validasi_ki)) { ?>
                    <?php
                    if ($validasi->validasi_ki == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ki == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ki == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
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

                <?php if (!empty($validasi->validasi_ke)) { ?>
                    <?php
                    if ($validasi->validasi_ke == 3) {
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ke == 2) { // revisi
                        $labelValidasi = 'label-success';
                    } else if ($validasi->validasi_ke == 4) { //ditolak
                        $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                        $labelValidasi = 'label-warning';
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
                <?php } ?>
            </span>
        </div>

        <div class="par">
            <label>Nama</label>   
            <span class="field">
                <?php echo ucfirst($pegawai->nama) ?>
            </span>
        </div>
        <div class="par">
            <label>NIP</label>   
            <span class="field">
                <?php echo ucfirst($pegawai->nip) ?>
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

            <label>Upload TOR</label>   
            <span class="field">
                <?php if (!empty($groupFile['tor'])) { ?>
                    <a href="<?php echo Yii::app()->createUrl('penelitian/file/download') . '?file=' . $groupFile['tor']->filename ?>">
                        <?php echo $groupFile['tor']->filename ?>
                    </a>    
                <?php } ?>
            </span>

        </div>

        <div class="par">

            <label>Upload Protokol</label>   
            <span class="field">
                <?php if (!empty($groupFile['protokol'])) { ?>
                    <a href="<?php echo Yii::app()->createUrl('penelitian/file/download') . '?file=' . $groupFile['protokol']->filename ?>">
                        <?php echo $groupFile['protokol']->filename ?>
                    </a>
                <?php } ?>
            </span>

        </div>


        <div class="par">
            <label>Anggaran</label>  
            <span class="field">
                <?php echo $modelProtokol->anggaran; ?>
            </span>

        </div>

        <div class="par">

            <label>Upload RAB</label>   
            <span class="field">

                <?php if (!empty($groupFile['rab'])) { ?>
                    <a href="<?php echo Yii::app()->createUrl('penelitian/file/download') . '?file=' . $groupFile['rab']->filename ?>">
                        <?php echo $groupFile['rab']->filename ?>
                    </a>    
                <?php } ?>
            </span>

        </div>

    </div> <!-- tabs-1 -->

    <?php if (Yii::app()->user->isKabid) { ?>
        <?php if ($modelProtokol->isValidate()) {
            $validasi->validasi_kabid = (empty($validasi->validasi_kabid) ? '' : $validasi->validasi_kabid);
            ?>
            <div id="tabs-2">
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
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_kabid) ?>
                    </span>    
                </p>
        <?php } ?>  
        </div> <!-- tabs-2 -->
    <?php } ?>
        <?php if (Yii::app()->user->isKasubbid) { ?>
        <div id="tabs-3">
            <?php if ($model->isValidate()) { ?>
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

                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                        <?php $this->endWidget(); ?>
                    <?php } else { ?>  
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
                <?php echo ProposalPenelitian::statusDocument($validasi->validasi_kasubbid) ?>
                    </span>    
                </p>
        <?php } ?>       
        </div> <!-- tabs-3 -->
        <?php } ?>

        <?php if ((Yii::app()->user->isPPI || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin) && $modelProtokol->isValidasiPPI()) { ?>
        <div id="tabs-4">
            <?php if ($model->isValidate()) { ?>
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

                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

        <?php $this->endWidget(); ?>
            <?php } else { ?>  
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
            <?php echo ProposalPenelitian::statusDocument($validasi->validasi_ppi) ?>
                    </span>    
                </p>
            <?php } ?>
        </div> <!-- tabs-4 -->
        <?php } ?>

        <?php if ((Yii::app()->user->isPPI || Yii::app()->user->isSuperAdmin || Yii::app()->user->isAdmin) && $modelProtokol->isValidasiKapuslit()) { ?>
        <div id="tabs-validasi-kaspulit">
            <?php if ($modelProtokol->isValidate()) { ?>
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

                <p class="stdformbutton">
                    <button type="submit" class="btn btn-primary">Validasi</button>
                </p>

                <?php $this->endWidget(); ?>
        <?php } else { ?>  
                <p>
                    <span class="label <?php echo $labelValidasi ?>">
        <?php echo ProposalPenelitian::statusDocument($validasi->validasi_kapuslit) ?>
                    </span>    
                </p>
    <?php } ?>
        </div> <!-- tabs-4 -->
<?php } ?>


</div>  

<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>

<div class="stdform stdform2">
    <div class="par">
        <label>Status</label>    
        <span class="field">
            <span class="label label-info">
                <?php 
                echo $model->getStatus();
                ?>
            </span>
            
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

    <div class="par">
        <label>Tahun Anggaran</label>  
        <span class="field">
            <?php echo $model->tahun_anggaran; ?>
        </span>

    </div>

    <div class="par">
        <label>Keywords / Tags</label>  
        <span class="field">
            <div id="tags_tagsinput" class="tagsinput" style="width: 300px; height: 100px;">
                <?php $tags = explode(",", $model->keywords); ?>
                <?php if (!empty($tags))
                    foreach ($tags as $tag) {
                        ?>
                        <span class="tag"><span><?php echo ucfirst($tag) ?></span></span>
    <?php } ?> 
            </div>    
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


<?php
$cs = Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.tagsinput.min.js', CClientScript::POS_END);
?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#ProposalPenelitian_keywords').tagsInput();
    });
</script>  

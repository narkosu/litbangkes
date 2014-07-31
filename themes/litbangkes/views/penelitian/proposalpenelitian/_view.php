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
<div class="stdform stdform2">
    <div class="par">
        <label>Status</label>    
        <span class="field">
            <?php if ( $model->status == 3 ) {
                        $labelValidasi = 'label-success';
                    } else if ($model->status == 2) { // revisi
                         $labelValidasi = 'label-success';
                    } else if ($model->status == 4) { //ditolak
                         $labelValidasi = 'label-important';
                    } else if ($model->status == 1) { //progres
                         $labelValidasi = 'label-warning';
                    }else {
                        $labelValidasi = 'label-info';
                    }
                ?>
                    <span class="label <?php echo $labelValidasi?>">
                        <?php echo $model->getStatus() ?>
                    </span>
                : 
                <?php if ( !empty($validasi->validasi_kabid) ) { ?>
                <?php if ( $validasi->validasi_kabid == 3 ) {
                            $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kabid == 2) { // revisi
                             $labelValidasi = 'label-success';
                        } else if ($validasi->validasi_kabid == 4) { //ditolak
                             $labelValidasi = 'label-important';
                        } else if ($model->status == 1) { //progres
                         $labelValidasi = 'label-warning';
                        } else {
                        $labelValidasi = 'label-info';
                    }
                ?>
                    <span class="label <?php echo $labelValidasi?>">
                        <?php 
                            echo $validasi->getStatus('validasi_kabid');
                        ?>
                        Kabid
                    </span>
                    <?php } ?>

                    <?php if ( !empty($validasi->validasi_kasubbid) ) { ?>
                        <?php if ( $validasi->validasi_kasubbid == 3 ) {
                                    $labelValidasi = 'label-success';
                                } else if ($validasi->validasi_kasubbid == 2) { // revisi
                                     $labelValidasi = 'label-success';
                                } else if ($validasi->validasi_kasubbid == 4) { //ditolak
                                     $labelValidasi = 'label-important';
                                } else if ($model->status == 1) { //progres
                                    $labelValidasi = 'label-warning';
                                } else {
                                  $labelValidasi = 'label-info';
                                }
                        ?>
                    <span class="label <?php echo $labelValidasi?>">
                        <?php 

                        echo $validasi->getStatus('validasi_kasubbid');
                        ?>
                        Kasubbid
                    </span>
                    <?php } ?>

                    <?php if ( !empty($validasi->validasi_ppi) ) { ?>
                    <?php if ( $validasi->validasi_ppi == 3 ) {
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
                    <span class="label <?php echo $labelValidasi?>">
                        <?php 

                        echo $validasi->getStatus('validasi_ppi');
                        ?>
                        PPI
                    </span>
                    <?php } ?>
                    <?php if ( !empty($validasi->validasi_ki) ) { ?>
                    <?php if ( $validasi->validasi_ki == 3 ) {
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
                    <span class="label <?php echo $labelValidasi?>">
                        <?php 

                        echo $validasi->getStatus('validasi_ki');
                        ?>
                        KI
                     </span>
                    <?php } ?>

                    <?php if ( !empty($validasi->validasi_ke) ) { ?>
                    <?php if ( $validasi->validasi_ke == 3 ) {
                                    $labelValidasi = 'label-success';
                                } else if ($validasi->validasi_ke == 2) { // revisi
                                     $labelValidasi = 'label-success';
                                } else if ($validasi->validasi_ke == 4) { //ditolak
                                     $labelValidasi = 'label-important';
                                } else if ($model->status == 1) { //progres
                                    $labelValidasi = 'label-warning';
                               }else {
                                    $labelValidasi = 'label-info';
                                }
                        ?>
                    <span class="label <?php echo $labelValidasi?>">
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
 */?>
    
    
    <div class="par">
        <label>Kepakaran</label>  
        <span class="field">
            <?php echo $model->pakar->nama_kepakaran ?>
        </span>

    </div>
 
    <?php if ( $modelFile ){ 
            foreach ($modelFile as $file ){
            ?>
                <div class="par">
                    <label><?php echo $jenisFile[$file->group_file]['main'] ?>
                    <small><?php //echo $jenisFile[$file->group_file]['sub'] ?></small></label>  
                        <span class="field">
                          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$file->filename ?>">
                              <?php echo $file->filename; ?>
                          </a>
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
            <div id="tags_tagsinput" class="tagsinputx" >
                <?php //$tags = explode(",", $model->keywords); ?>
                <?php echo $model->keywords; ?>
                <?php /*if (!empty($tags))
                    foreach ($tags as $tag) {
                        ?>
                        <span class="tag"><span><?php echo ucfirst($tag) ?></span></span>
    <?php } */ ?> 
            </div>    
        </span>

    </div>

    <div class="par">
        <label>Isu Strategis</label>  
        <span class="field">
              <?php echo $model->isustrategis->tahun.' : '.$model->isustrategis->isu_strategis; ?>  
        </span>

    </div>
    
    <div class="par">
        <label>Klien</label> 
        <span class="field">
<?php echo $model->nmklien->name; ?>
        </span>
    </div>
    <?php /*if ( $model->status == 0 ) { ?>
    <p class="stdformbutton">
    <button class="btn btn-primary">Pengajuan</button>
    </p>
    <?php }*/ ?>
</div>


<?php
$cs = Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.tagsinput.min.js', CClientScript::POS_END);
?>

<script type="text/javascript">
    /*jQuery(document).ready(function() {
        jQuery('#ProposalPenelitian_keywords').tagsInput();
    });*/
</script>  

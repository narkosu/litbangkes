	<?php
	/* @var $this ProposalPenelitianController */
	/* @var $model ProposalPenelitian */
	/* @var $form CActiveForm */
    $jenisFile['output_abstrak'] = array('main'=>'Abstrak','sub'=>'Upload file dalam bentuk PDF');
    $jenisFile['output_summary'] = array('main'=>'Summary','sub'=>'Upload file dalam bentuk PDF');
    $jenisFile['output_laporan'] = array('main'=>'Laporan Penelitian','sub'=>'Upload file dalam bentuk PDF');
    $jenisFile['output_raw_data'] = array('main'=>'Raw Data Penelitian','sub'=>'Upload file dalam bentuk PDF');
    $jenisFile['output_draft_artikel'] = array('main'=>'Draft Artikel','sub'=>'Upload file dalam bentuk PDF');
    $jenisFile['output_penelitian'] = array('main'=>'Output Penelitian','sub'=>'Upload file dalam bentuk PDF'); 
  $pegawai = $model->pegawai;
  
	?>
	<div class="stdform stdform2">
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
<?php 
print_r($groupFile);
if ( $jenisFile ){ 
    foreach ($jenisFile as $group=>$groupname ){
        
    ?>
        <div class="par">
            <label><?php echo $groupname['main'] ?>
            <small><?php echo $groupname['sub'] ?></small></label>  
                <span class="field">
                    <?php if ( !empty($groupFile[$group]) ) { ?>
                  <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile[$group]->filename ?>">
                      <?php echo $groupFile[$group]->filename; ?>
                  </a>
                    <?php } ?>
               </span>
        </div>
    <?php
      }
} ?>
  </div>

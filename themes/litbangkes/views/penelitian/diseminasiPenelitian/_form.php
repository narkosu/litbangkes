<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */

$jenisFile['proposal'] = array('main'=>'Outline / Draft Proposal','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['tor'] = array('main'=>'TOR','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['protokol'] = array('main'=>'Protokol','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['rab'] = array('main'=>'Rap','sub'=>'Upload file dalam bentuk Excel');
$jenisFile['output_abstrak'] = array('main'=>'Abstrak','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['output_summary'] = array('main'=>'Summary','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['output_laporan'] = array('main'=>'Laporan Penelitian','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['output_raw_data'] = array('main'=>'Raw Data Penelitian','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['output_draft_artikel'] = array('main'=>'Draft Artikel','sub'=>'Upload file dalam bentuk PDF');
$jenisFile['output_penelitian'] = array('main'=>'Output Penelitian','sub'=>'Upload file dalam bentuk PDF');

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-penelitian-form',
	'enableAjaxValidation'=>false,
  'htmlOptions'=>array('class'=>'stdform stdform2', 'enctype'=>'multipart/form-data')
)); ?>
<?php 

    $pegawai = $model->pegawai;
    echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) );
    echo $form->hiddenField($modelOutput,'proposal_id',array('value'=>$model->id) );
?>
	<?php //echo $form->errorSummary($model); ?>
<?php /*
	<div class="par">
		<?php echo $form->labelEx($model,'user_id'); ?>
      <span class="field">
		<?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) ); ?>
      </span>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
*/?>
    <?php
    echo $form->hiddenField($model,'pegawai_id', array('value'=> $pegawai->id));
    ?>

	
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
<div class="par">
      
		  <label><?php echo $jenisFile['output_abstrak']['main'] ?>
      <small><?php echo $jenisFile['output_abstrak']['sub'] ?></small></label>
      <span class="field">
         <?php echo $form->fileField($newModelFile,'filename[output_abstrak]', array('class'=>'uniform-file')); ?>   
          <?php if ( !empty($groupFile['output_abstrak']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['output_abstrak']->filename ?>">
            <?php echo $groupFile['output_abstrak']->filename?>
          </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[output_abstrak]'); ?>
	</div>
<div class="par">
      
		  <label><?php echo $jenisFile['output_summary']['main'] ?>
      <small><?php echo $jenisFile['output_summary']['sub'] ?></small></label>
      <span class="field">
         <?php echo $form->fileField($newModelFile,'filename[output_summary]', array('class'=>'uniform-file')); ?>   
          <?php if ( !empty($groupFile['output_summary']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['output_summary']->filename ?>">
            <?php echo $groupFile['output_summary']->filename?>
          </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[output_summary]'); ?>
	</div>
  <div class="par">
      
		  <label><?php echo $jenisFile['output_laporan']['main'] ?>
      <small><?php echo $jenisFile['output_laporan']['sub'] ?></small>
      </label>   
      <span class="field">
         <?php echo $form->fileField($newModelFile,'filename[output_laporan]', array('class'=>'uniform-file')); ?>   
          <?php if ( !empty($groupFile['output_laporan']) ) { ?>
           <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['output_laporan']->filename ?>">
            <?php echo $groupFile['output_laporan']->filename?>
           </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[output_laporan]'); ?>
	</div>

<div class="par">
      
		  <label><?php echo $jenisFile['output_raw_data']['main'] ?>
      <small><?php echo $jenisFile['output_raw_data']['sub'] ?></small></label>
      <span class="field">
         <?php echo $form->fileField($newModelFile ,'filename[output_raw_data]', array('class'=>'uniform-file')); ?> 
          <?php if ( !empty($groupFile['output_raw_data']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['output_raw_data']->filename ?>">
          <?php echo $groupFile['output_raw_data']->filename?>
          </a>
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[output_raw_data]'); ?>
	</div>


	<div class="par">
      
		  <label><?php echo $jenisFile['output_draft_artikel']['main'] ?>
      <small><?php echo $jenisFile['output_draft_artikel']['sub'] ?></small></label>
      <span class="field">
         <?php echo $form->fileField($newModelFile,'filename[output_draft_artikel]', array('class'=>'uniform-file')); ?>   
          <?php if ( !empty($groupFile['output_draft_artikel']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['output_draft_artikel']->filename ?>">
            <?php echo $groupFile['output_draft_artikel']->filename?>
          </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[output_draft_artikel]'); ?>
	</div>
<div class="par">
      
		  <label><?php echo $jenisFile['output_penelitian']['main'] ?>
      <small><?php echo $jenisFile['output_penelitian']['sub'] ?></small></label>
      <span class="field">
         <?php echo $form->fileField($newModelFile,'filename[output_penelitian]', array('class'=>'uniform-file')); ?>   
          <?php if ( !empty($groupFile['output_penelitian']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['output_penelitian']->filename ?>">
            <?php echo $groupFile['output_penelitian']->filename?>
          </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[output_penelitian]'); ?>
	</div>
	
<?php if ( $model->editable ) { ?>
  <div class="stdformbutton">
		
      <button type="submit" class="btn btn-primary">
          <?php echo $modelOutput->isNewRecord ? 'Upload Output' : 'Simpan'?>
      </button>
      <button type="reset" class="btn">Reset Form</button>
	</div>
<?php } ?>
<?php $this->endWidget(); ?>
<script type="text/javascript">
  jQuery(document).ready(function(){
      jQuery('.uniform-file').uniform();
  });
</script>  
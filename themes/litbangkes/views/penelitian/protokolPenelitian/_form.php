<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-penelitian-form',
	'enableAjaxValidation'=>false,
  'htmlOptions'=>array('class'=>'stdform stdform2', 'enctype'=>'multipart/form-data')
)); ?>
<?php 

    $pegawai = $model->pegawai;
    echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) );
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
         <?php echo $form->fileField($newModelFile,'filename[tor]'); ?>   
          <?php if ( !empty($groupFile['tor']) ) { ?>
           <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['tor']->filename ?>">
            <?php echo $groupFile['tor']->filename?>
           </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[tor]'); ?>
	</div>

<div class="par">
      
		  <label>Upload Protokol</label>   
      <span class="field">
         <?php echo $form->fileField($newModelFile ,'filename[protokol]'); ?> 
          <?php if ( !empty($groupFile['protokol']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['protokol']->filename ?>">
          <?php echo $groupFile['protokol']->filename?>
          </a>
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[protokol]'); ?>
	</div>


	<div class="par">
		<?php echo $form->labelEx($modelProtokol,'anggaran'); ?>
      <span class="field">
		<?php echo $form->textField($modelProtokol,'anggaran'); ?>
      </span>
		<?php echo $form->error($modelProtokol,'anggaran'); ?>
	</div>

	<div class="par">
      
		  <label>Upload RAB</label>   
      <span class="field">
         <?php echo $form->fileField($newModelFile,'filename[rab]'); ?>   
          <?php if ( !empty($groupFile['rab']) ) { ?>
          <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$groupFile['rab']->filename ?>">
            <?php echo $groupFile['rab']->filename?>
          </a>    
          <?php } ?>
      </span>
		<?php echo $form->error($newModelFile,'filename[rab]'); ?>
	</div>

	
<?php if ( $model->editable ) { ?>
  <div class="stdformbutton">
		
      <button type="submit" class="btn btn-primary">
          <?php echo $modelProtokol->isNewRecord ? 'Upload Protokol Baru' : 'Simpan'?>
      </button>
      <button type="reset" class="btn">Reset Form</button>
	</div>
<?php } ?>
<?php $this->endWidget(); ?>

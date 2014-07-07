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
if ( Yii::app()->user->isMember ) {
    $pegawai = Yii::app()->user->getState('pegawai');
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
            <?php echo $pegawai->nip ?>
        </span>
    </div>
    <div class="par">
        <label>Satuan Kerja</label>   
        <span class="field">
            <?php echo ucfirst($pegawai->satuan_kerja) ?>
        </span>
    </div>
<?php } ?>

<?php  if ( Yii::app()->user->isSuperAdmin ) { 
    $listPegawai=CHtml::listData(Pegawai::model()->findAll(), 'id', 'nama');;
?>
<div class="par">
		<?php echo $form->labelEx($model,'pegawai_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'pegawai_id',$listPegawai, array('empty' => 'Pilih Pegawai')); ?>
      </span>
		<?php echo $form->error($model,'pegawai_id'); ?>
	</div>
<?php } ?>
	<div class="par">
		<?php echo $form->labelEx($model,'nama_penelitian'); ?>
      <span class="field">
		<?php echo $form->textField($model,'nama_penelitian',array('size'=>60,'maxlength'=>255)); ?>
      </span>
		<?php echo $form->error($model,'nama_penelitian'); ?>
	</div>
    <?php
    $listJabatanFungsional=CHtml::listData(JabatanFungsional::model()->findAll(), 'id', 'nama');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'jabatan_fungsional_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'jabatan_fungsional_id',$listJabatanFungsional, array('empty' => 'Pilih Jabatan Fungsional')); ?>
      </span>
		<?php echo $form->error($model,'jabatan_fungsional_id'); ?>
	</div>
<?php
    $listSubBidang=CHtml::listData(SubBidang::model()->findAll(), 'id', 'nama');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'sub_bidang_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'sub_bidang_id',$listSubBidang, array('empty' => 'Pilih Sub Bidang')); ?>
      </span>
		<?php echo $form->error($model,'sub_bidang_id'); ?>
	</div>

<?php
    $listPakar=CHtml::listData(Kepakaran::model()->findAll(), 'id', 'nama_kepakaran');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'pakar_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'pakar_id',$listSubBidang, array('empty' => 'Pilih Kepakaran')); ?>
      </span>
		<?php echo $form->error($model,'pakar_id'); ?>
	</div>

  <div class="par">
      
		<?php echo $form->labelEx($modelFile,'filename'); ?>
      <?php if ( $model->file ){ 
            foreach ($model->file as $file ){
            ?>
                <span class="field">
                    <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$file->filename ?>">`
                        <?php echo $file->filename; ?>   
                    </a>      
               </span>
            <?php
            }
          } ?>
      <span class="field">
         <?php echo $form->fileField($modelFile,'filename'); ?>   
      </span>
		<?php echo $form->error($modelFile,'filename'); ?>
	</div>

  <?php
    $listJenisPenelitian=CHtml::listData(JenisPenelitian::model()->findAll(), 'id', 'nama');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'jenis_penelitian_id'); ?>
      <span class="field">
            <?php echo $form->dropDownList($model, 'jenis_penelitian_id',$listJenisPenelitian, array('empty' => 'Pilih Jenis Penelitian')); ?>
      </span>
		<?php echo $form->error($model,'jenis_penelitian_id'); ?>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'tahun_anggaran'); ?>
      <span class="field">
		<?php echo $form->textField($model,'tahun_anggaran'); ?>
      </span>
		<?php echo $form->error($model,'tahun_anggaran'); ?>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'keywords'); ?>
      <span class="field">
		<?php echo $form->textField($model,'keywords',array('size'=>160,'maxlength'=>255,'class'=>'input-large')); ?>
      </span>
		<?php echo $form->error($model,'keywords'); ?>
    
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'klien (Optional )'); ?>
      <span class="field">
		<?php //echo $form->textField($model,'klien',array('size'=>60,'maxlength'=>255)); ?>
      <?php $clients = $model->getClients(); 
     
      ?>
      <?php echo $form->dropDownList($model, 'klien', $clients, array('empty' => 'Pilih Klien')); ?>    
      </span>
		<?php echo $form->error($model,'klien'); ?>
	</div>
<?php if ( $model->editable ) { ?>
  <div class="stdformbutton">
		
      <button type="submit" class="btn btn-primary">
          <?php echo $model->isNewRecord ? 'Proposal Penelitian Baru' : 'Simpan'?>
      </button>
      <button type="reset" class="btn">Reset Form</button>
	</div>
<?php } ?>
<?php $this->endWidget(); ?>
<?php
$cs=Yii::app()->clientScript;

$cs->registerScriptFile( Yii::app()->theme->baseUrl .'/js/jquery.tagsinput.min.js', CClientScript::POS_END);

?>

<script type="text/javascript">
  /*jQuery(document).ready(function(){
      jQuery('#ProposalPenelitian_keywords').tagsInput();
  });*/
</script>  
  
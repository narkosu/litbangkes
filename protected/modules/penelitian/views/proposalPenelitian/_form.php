<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-penelitian-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pegawai_id'); ?>
		<?php echo $form->textField($model,'pegawai_id'); ?>
		<?php echo $form->error($model,'pegawai_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_penelitian'); ?>
		<?php echo $form->textField($model,'nama_penelitian',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_penelitian'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabatan_fungsional_id'); ?>
		<?php echo $form->textField($model,'jabatan_fungsional_id'); ?>
		<?php echo $form->error($model,'jabatan_fungsional_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_bidang_id'); ?>
		<?php echo $form->textField($model,'sub_bidang_id'); ?>
		<?php echo $form->error($model,'sub_bidang_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_penelitian_id'); ?>
		<?php echo $form->textField($model,'jenis_penelitian_id'); ?>
		<?php echo $form->error($model,'jenis_penelitian_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_anggaran'); ?>
		<?php echo $form->textField($model,'tahun_anggaran'); ?>
		<?php echo $form->error($model,'tahun_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'klien'); ?>
		<?php echo $form->textField($model,'klien',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'klien'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step'); ?>
		<?php echo $form->textField($model,'step'); ?>
		<?php echo $form->error($model,'step'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
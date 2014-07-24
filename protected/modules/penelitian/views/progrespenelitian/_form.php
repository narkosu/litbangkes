<?php
/* @var $this ProgrespenelitianController */
/* @var $model ProgresPenelitian */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'progres-penelitian-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_id'); ?>
		<?php echo $form->textField($model,'proposal_id'); ?>
		<?php echo $form->error($model,'proposal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periode'); ?>
		<?php echo $form->textField($model,'periode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'periode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pagu'); ?>
		<?php echo $form->textField($model,'pagu',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pagu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_pangajuan_etik'); ?>
		<?php echo $form->textField($model,'tanggal_pangajuan_etik'); ?>
		<?php echo $form->error($model,'tanggal_pangajuan_etik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_ijin_etik'); ?>
		<?php echo $form->textField($model,'file_ijin_etik'); ?>
		<?php echo $form->error($model,'file_ijin_etik'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'narasi'); ?>
		<?php echo $form->textArea($model,'narasi',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'narasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realisasi_anggaran'); ?>
		<?php echo $form->textField($model,'realisasi_anggaran',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'realisasi_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'masalah'); ?>
		<?php echo $form->textArea($model,'masalah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'masalah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tindak_lanjut'); ?>
		<?php echo $form->textField($model,'tindak_lanjut',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'tindak_lanjut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
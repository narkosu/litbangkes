<?php
/* @var $this ProtokolPenelitianController */
/* @var $model ProtokolPenelitian */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'protokol-penelitian-form',
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
		<?php echo $form->labelEx($model,'anggran'); ?>
		<?php echo $form->textField($model,'anggran'); ?>
		<?php echo $form->error($model,'anggran'); ?>
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
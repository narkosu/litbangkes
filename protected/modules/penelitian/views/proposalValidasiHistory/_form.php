<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $model ProposalValidasiHistory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-validasi-history-form',
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
		<?php echo $form->labelEx($model,'step'); ?>
		<?php echo $form->textField($model,'step'); ?>
		<?php echo $form->error($model,'step'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level_validasi'); ?>
		<?php echo $form->textField($model,'level_validasi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'level_validasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value_validasi'); ?>
		<?php echo $form->textField($model,'value_validasi'); ?>
		<?php echo $form->error($model,'value_validasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alasan'); ?>
		<?php echo $form->textArea($model,'alasan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alasan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
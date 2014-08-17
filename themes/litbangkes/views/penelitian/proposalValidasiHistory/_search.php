<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $model ProposalValidasiHistory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposal_id'); ?>
		<?php echo $form->textField($model,'proposal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step'); ?>
		<?php echo $form->textField($model,'step'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level_validasi'); ?>
		<?php echo $form->textField($model,'level_validasi',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value_validasi'); ?>
		<?php echo $form->textField($model,'value_validasi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alasan'); ?>
		<?php echo $form->textArea($model,'alasan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
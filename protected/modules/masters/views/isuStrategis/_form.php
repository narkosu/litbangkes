<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'isu-strategis-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_start'); ?>
		<?php echo $form->textField($model,'tahun_start'); ?>
		<?php echo $form->error($model,'tahun_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_end'); ?>
		<?php echo $form->textField($model,'tahun_end'); ?>
		<?php echo $form->error($model,'tahun_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isu_strategis'); ?>
		<?php echo $form->textField($model,'isu_strategis',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'isu_strategis'); ?>
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
<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */
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
		<?php echo $form->label($model,'tahun_start'); ?>
		<?php echo $form->textField($model,'tahun_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun_end'); ?>
		<?php echo $form->textField($model,'tahun_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isu_strategis'); ?>
		<?php echo $form->textField($model,'isu_strategis',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
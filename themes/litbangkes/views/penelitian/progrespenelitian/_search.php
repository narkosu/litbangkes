<?php
/* @var $this ProgrespenelitianController */
/* @var $model ProgresPenelitian */
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
		<?php echo $form->label($model,'periode'); ?>
		<?php echo $form->textField($model,'periode',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagu'); ?>
		<?php echo $form->textField($model,'pagu',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_pangajuan_etik'); ?>
		<?php echo $form->textField($model,'tanggal_pangajuan_etik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'file_ijin_etik'); ?>
		<?php echo $form->textField($model,'file_ijin_etik'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'narasi'); ?>
		<?php echo $form->textArea($model,'narasi',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'realisasi_anggaran'); ?>
		<?php echo $form->textField($model,'realisasi_anggaran',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'masalah'); ?>
		<?php echo $form->textArea($model,'masalah',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tindak_lanjut'); ?>
		<?php echo $form->textField($model,'tindak_lanjut',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
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
<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
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
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pegawai_id'); ?>
		<?php echo $form->textField($model,'pegawai_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_penelitian'); ?>
		<?php echo $form->textField($model,'nama_penelitian',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jabatan_fungsional_id'); ?>
		<?php echo $form->textField($model,'jabatan_fungsional_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sub_bidang_id'); ?>
		<?php echo $form->textField($model,'sub_bidang_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_penelitian_id'); ?>
		<?php echo $form->textField($model,'jenis_penelitian_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun_anggaran'); ?>
		<?php echo $form->textField($model,'tahun_anggaran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'klien'); ?>
		<?php echo $form->textField($model,'klien',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step'); ?>
		<?php echo $form->textField($model,'step'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
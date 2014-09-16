<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'isu-strategis-form',
	'enableAjaxValidation'=>false,
  'htmlOptions'=>array('class'=>'stdform stdform2')  
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="par">
		<?php echo $form->labelEx($model,'tahun_start'); ?>
      <span class="field">
		<?php echo $form->textField($model,'tahun_start'); ?>
          <?php echo $form->error($model,'tahun_start'); ?>
      </span>
    
		
    
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'tahun_end'); ?>
      <span class="field">
		<?php echo $form->textField($model,'tahun_end'); ?>
		<?php echo $form->error($model,'tahun_end'); ?>
      </span>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'isu_strategis'); ?>
      <span class="field">
		<?php echo $form->textField($model,'isu_strategis',array('size'=>60,'maxlength'=>255,'class'=>'xlarge')); ?>
		<?php echo $form->error($model,'isu_strategis'); ?>
      </span>
	</div>


	<div class="par stdformbutton">
		
      <button type="submit" class="btn btn-primary">
          <?php echo $model->isNewRecord ? 'Buat' : 'Simpan'?>
      </button>
      <button type="reset" class="btn">Reset Form</button>
	</div>

<?php $this->endWidget(); ?>


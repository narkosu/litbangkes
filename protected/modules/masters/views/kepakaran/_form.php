<?php
/* @var $this MediaDiseminasiController */
/* @var $model MediaDiseminasi */
/* @var $form CActiveForm */
?>

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
		<?php echo $form->labelEx($model,'nama_kepakaran'); ?>
      <span class="field">
		<?php echo $form->textField($model,'nama_kepakaran'); ?>
          <?php echo $form->error($model,'nama_kepakaran'); ?>
      </span>
    
		
    
	</div>

	<div class="par stdformbutton">
		
      <button type="submit" class="btn btn-primary">
          <?php echo $model->isNewRecord ? 'Buat' : 'Simpan'?>
      </button>
      <button type="reset" class="btn">Reset Form</button>
	</div>

<?php $this->endWidget(); ?>

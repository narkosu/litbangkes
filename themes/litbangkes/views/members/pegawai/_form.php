<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pegawai-form',
	'enableAjaxValidation'=>false,
   'htmlOptions'=>array('class'=>'stdform stdform2')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
<?php /*
	<div class="par">
		<?php echo $form->labelEx($model,'id_departemen'); ?>
		<?php echo $form->textField($model,'id_departemen'); ?>
		<?php echo $form->error($model,'id_departemen'); ?>
	</div>
*/?>
	<div class="par">
		<?php echo $form->labelEx($model,'nip'); ?>
      <span class="field">
        <?php echo $form->textField($model,'nip',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'nip'); ?>
     </span>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'nama'); ?>
      <span class="field">
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30)); ?>
      </span>    
		<?php echo $form->error($model,'nama'); ?>
	</div>
	<div class="par">
		<?php echo $form->labelEx($model,'pendidikan'); ?>
      <span class="field">
		<?php echo $form->textField($model,'pendidikan',array('size'=>10,'maxlength'=>10)); ?>
      </span>
		<?php echo $form->error($model,'pendidikan'); ?>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
 <span class="field">

		<?php echo $form->textField($model,'tempat_lahir',array('size'=>50,'maxlength'=>50)); ?>
 </span>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'tgl_lahir'); ?>
       <span class="field">

		<?php echo $form->textField($model,'tgl_lahir'); ?>
       </span>
		<?php echo $form->error($model,'tgl_lahir'); ?>
	</div>
  
  <div class="par">
      <label>HAK AKSES</label>
          
       <span class="field">
           <input type="checkbox" name="hakAkses" value="1">
           Memiliki Hak Akses
       </span>
	</div>
  
  <div class="par">
		<?php echo $form->labelEx($modelUser,'username'); ?>
       <span class="field">

		<?php echo $form->textField($modelUser,'username'); ?>
       </span>
		<?php echo $form->error($modelUser,'username'); ?>
	</div>
  
  <div class="par">
		<?php echo $form->labelEx($modelUser,'password'); ?>
       <span class="field">

		<?php echo $form->textField($modelUser,'password'); ?>
       </span>
		<?php echo $form->error($modelUser,'password'); ?>
	</div>
  
	<div class="stdformbutton">
      
      <button type="submit" class="btn btn-primary"><?php echo $model->isNewRecord ? 'Pegawai Baru' : 'Simpan'?></button>
      <button type="reset" class="btn">Reset Form</button>
      
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('htmlOptions'=>array('class'=>'btn btn-primary'))); ?>
	</div>

<?php $this->endWidget(); ?>


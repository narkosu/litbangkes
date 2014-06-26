<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>

	<div class="contentinner content-editprofile">
    <div class="widgetcontent bordered">
      <div class="row-fluid">

            <div class="span9">
                
                 <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'pegawai-form',
                        'enableAjaxValidation'=>false,
                         'htmlOptions'=>array('class'=>'editprofileform')
                      )); ?>   
                  <h4>Ganti Password</h4>
                  <?php if ( Yii::app()->user->hasFlash('password_success') ) { ?>
                  <p class="alert alert-success">
                      <?php echo Yii::app()->user->getFlash('password_success');?>
                  </p>
                  <?php }?>
                    <p>
                      <label>Password baru:</label>
                      <?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>130,'class'=>'input-xlarge')); ?>
                      <?php echo $form->error($model,'password'); ?>
                    </p>
                    <p>
                      <label>Sekali Lagi:</label>
                      <?php echo $form->passwordField($model,'repassword',array('size'=>30,'maxlength'=>130,'class'=>'input-xlarge')); ?>
                      <?php echo $form->error($model,'repassword'); ?>
                    </p>
                    <p>
                      <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </p>
                <?php $this->endWidget(); ?>
            </div><!--span9-->
        </div><!--row-fluid-->
    </div><!--widgetcontent-->
</div><!--contentinner-->




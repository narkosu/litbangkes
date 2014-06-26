<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>




	<div class="contentinner content-editprofile">
    <h4 class="widgettitle nomargin">Edit Profile</h4>
      <div class="widgetcontent bordered">
        <div class="row-fluid">
            <div class="span3 profile-left">
                <?php if ( Yii::app()->user->hasFlash('editprofile_success') ) { ?>
                  <p class="alert alert-success">
                      <?php echo Yii::app()->user->getFlash('editprofile_success');?>
                  </p>
                  <?php }?>
                <h4>Your Profile Photo</h4>

                  <div class="profilethumb">
                    <a href="">Change Thumbnail</a>
                      <img src="img/profilethumb.png" alt="" class="img-polaroid" />
                  </div><!--profilethumb-->

              </div><!--span3-->
              <div class="span9">
                  <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'pegawai-form',
                        'enableAjaxValidation'=>false,
                         'htmlOptions'=>array('class'=>'editprofileform')
                      )); ?>
                    <h4>Informasi Dasar</h4>
                      <p>
                        <label>Nama Lengkap:</label>
                        <?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>130,'class'=>'input-xlarge')); ?>
                        
                      </p>
                      <p>
                        <label>NIP:</label>
                        <?php echo $form->textField($model,'nip',array('size'=>30,'maxlength'=>130,'class'=>'input-xlarge')); ?>
                        
                      </p>
                      <p>
                        <label>Email:</label>
                            <?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>130,'class'=>'input-xlarge')); ?>
                        <?php echo $form->error($model,'email'); ?>
                      </p>

                      <p>
                        <label>Satuan Kerja:</label>
                          <?php echo $form->textField($model,'satuan_kerja',array('size'=>30,'maxlength'=>130,'class'=>'input-xxlarge')); ?>
                        
                      </p>

                      <p>
                        <label style="padding:0">Password</label>
                          <a href="gantipassword.html">Ganti Password?</a>
                      </p>
                      <p>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                      </p>
                  <?php $this->endWidget(); ?>
              </div><!--span9-->
          </div><!--row-fluid-->
      </div><!--widgetcontent-->
  </div><!--contentinner-->




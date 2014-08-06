<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>




	<div class="contentinner content-editprofile">
    <h4 class="widgettitle nomargin">Profile</h4>
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
                  
                    <h4>Informasi Dasar</h4>
                    <?php if (!empty($model)) { ?>
                      <p>
                        <label>Nama Lengkap:</label>
                        <span><?php echo $model->nama ?></span>
                      </p>
                      <p>
                        <label>NIP:</label>
                        <?php // echo $form->textField($model,'nip',array('size'=>30,'maxlength'=>130,'class'=>'input-xlarge')); ?>
                        <span><?php echo $model->nip ?></span>
                      </p>
                      <p>
                        <label>Email:</label>
                        <span><?php echo $model->email ?></span>
                      </p>

                      <p>
                        <label>Satuan Kerja:</label>
                          <span><?php echo $model->satuan_kerja ?></span>
                        
                      </p>
                    <?php } else { ?>
                      <p>
                        <label>Username:</label>
                        <span><?php echo Yii::app()->user->name ?></span>
                      </p>
                      
                    <?php } ?>
                      <p>
                        <label style="padding:0">
                            <a href="<?php echo Yii::app()->createUrl('site/changepassword')?>" class="btn">Ganti Password?</a> 
                        <a href="<?php echo Yii::app()->createUrl('members/pegawai/edit')?>"  class="btn">Edit Profil?</a></label>
                          
                      </p>
                      
              </div><!--span9-->
          </div><!--row-fluid-->
      </div><!--widgetcontent-->
  </div><!--contentinner-->




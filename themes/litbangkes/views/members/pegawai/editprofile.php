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
                 <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'avatar-pegawai-form',
                        'enableAjaxValidation'=>false,
                         'htmlOptions'=>array('class'=>'editprofileform','enctype'=>'multipart/form-data')
                      )); ?>
                    <?php if ( Yii::app()->user->hasFlash('editprofile_success') ) { ?>
                      <p class="alert alert-success">
                          <?php echo Yii::app()->user->getFlash('editprofile_success');?>
                      </p>
                      <?php }?>
                      <h4>Your Profile Photo</h4>
                      <?php $avatar = Yii::app()->baseUrl.'/files/avatar/'.Yii::app()->user->getState('avatar');?>
                      <div class="profilethumb" style="float:left;">
                        <a href="">Change Thumbnail</a>
                        <div style="">
                          <img src="<?php echo $avatar?>" alt="" id="mainavatar" class="img-polaroid" style="height:181px;" />
                          <input class="avatar" type="file" name="avatar">
                        </div>
                      </div><!--profilethumb-->
                      <div style="clear:both"></div>
                      <div >
                        
                        <button type="submit" class="btn btn-primary">Ganti Avatar</button>
                      </div>
                  <?php $this->endWidget(); ?>
              
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

  <script type="text/javascript">
    jQuery(document).ready(function(){
        
      jQuery("input.avatar").change(function(e) {
        
         var input = e.originalEvent.srcElement;
         
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                
                jQuery('#mainavatar')
                    .attr('src', e.target.result)
                    .height(180)
                    ;
            };

            reader.readAsDataURL(input.files[0]);
        }
        });
        
    

  
  });  
  </script>
      



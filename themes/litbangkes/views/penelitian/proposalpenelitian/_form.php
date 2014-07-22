<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */
/* @var $form CActiveForm */
$yearNow = date("Y");
$yearFrom = $yearNow ;
$yearTo = $yearNow + 5;
$arrYears = array();
    	 
foreach (range($yearFrom, $yearTo) as $number) {
    $arrYears[$number] = $number; 
}
//$arrYears = array_reverse($arrYears, false);
		 

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-penelitian-form',
	'enableAjaxValidation'=>false,
  'htmlOptions'=>array('class'=>'stdform stdform2', 'enctype'=>'multipart/form-data')
)); ?>
<?php 
if ( Yii::app()->user->isMember ) {
    $pegawai = Yii::app()->user->getState('pegawai');
    echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) );
?>
	<?php //echo $form->errorSummary($model); ?>
<?php /*
	<div class="par">
		<?php echo $form->labelEx($model,'user_id'); ?>
      <span class="field">
		<?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id) ); ?>
      </span>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
*/?>
    <?php
    echo $form->hiddenField($model,'pegawai_id', array('value'=> $pegawai->id));
    ?>

	
  <div class="par">
        <label>Nama</label>   
        <span class="field">
            <?php echo ucfirst($pegawai->nama) ?>
        </span>
    </div>
    <div class="par">
        <label>NIP</label>   
        <span class="field">
            <?php echo $pegawai->nip ?>
        </span>
    </div>
    <div class="par">
        <label>Satuan Kerja</label>   
        <span class="field">
            <?php echo ucfirst($pegawai->satuan_kerja) ?>
        </span>
    </div>
<?php } ?>

<?php  if ( Yii::app()->user->isSuperAdmin ) { 
    $listPegawai=CHtml::listData(Pegawai::model()->findAll(), 'id', 'nama');;
?>
<div class="par">
		<?php echo $form->labelEx($model,'pegawai_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'pegawai_id',$listPegawai, array('empty' => 'Pilih Pegawai','class'=>"uniformselect"			)); ?>
      </span>
		<?php echo $form->error($model,'pegawai_id'); ?>
	</div>
<?php } ?>
	<div class="par">
		<?php echo $form->labelEx($model,'nama_penelitian'); ?>
      <span class="field">
		<?php echo $form->textField($model,'nama_penelitian',array('size'=>60,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
      </span>
		<?php echo $form->error($model,'nama_penelitian'); ?>
	</div>
    <?php
    $listJabatanFungsional=CHtml::listData(JabatanFungsional::model()->findAll(), 'id', 'nama');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'jabatan_fungsional_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'jabatan_fungsional_id',$listJabatanFungsional, array('empty' => 'Pilih Jabatan Fungsional','class'=>"uniformselect"			)); ?>
      </span>
		<?php echo $form->error($model,'jabatan_fungsional_id'); ?>
	</div>
<?php
    $listSubBidang=CHtml::listData(SubBidang::model()->findAll(), 'id', 'nama');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'sub_bidang_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'sub_bidang_id',$listSubBidang, array('empty' => 'Pilih Sub Bidang','class'=>"uniformselect"			)); ?>
      </span>
		<?php echo $form->error($model,'sub_bidang_id'); ?>
	</div>

<?php
    $listPakar=CHtml::listData(Kepakaran::model()->findAll(), 'id', 'nama_kepakaran');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'pakar_id'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model, 'pakar_id',$listPakar, array('empty' => 'Pilih Kepakaran','class'=>"uniformselect")); ?>
      </span>
		<?php echo $form->error($model,'pakar_id'); ?>
	</div>

  <div class="par">
      
		<?php echo $form->labelEx($modelFile,'filename'); ?>
      <?php if ( $model->file ){ 
            foreach ($model->file as $file ){
            ?>
                <span class="field">
                    <a href="<?php echo Yii::app()->createUrl('penelitian/file/download').'?file='.$file->filename ?>">`
                        <?php echo $file->filename; ?>   
                    </a>      
               </span>
            <?php
            }
          } ?>
      <span class="field">
         <?php echo $form->fileField($modelFile,'filename',array('class'=>'uniform-file')); ?>   
      </span>
		<?php echo $form->error($modelFile,'filename'); ?>
	</div>

  <?php
  /*
    $listJenisPenelitian=CHtml::listData(JenisPenelitian::model()->findAll(), 'id', 'nama');;
    ?>
	<div class="par">
		<?php echo $form->labelEx($model,'jenis_penelitian_id'); ?>
      <span class="field">
            <?php echo $form->dropDownList($model, 'jenis_penelitian_id',$listJenisPenelitian, array('empty' => 'Pilih Jenis Penelitian','class'=>"uniformselect")); ?>
      </span>
		<?php echo $form->error($model,'jenis_penelitian_id'); ?>
	</div>
  */?>  
  <div class="par">
		<?php //echo $form->labelEx($model,'sumber_dana'); ?>
      <span class="field">
      <?php $sumberdanalist = $model->getClients(); 
      ?>
      <?php //echo $form->dropDownList($model, 'sumber_dana', $sumberdanalist, array('empty' => 'Pilih Sumber Dana')); ?>  
      </span>
		<?php echo $form->error($model,'sumber_dana'); ?>
	</div>
  <div class="par">
		<?php echo $form->labelEx($model,'sumber_dana'); ?>
      <span class="field">
    <?php echo $form->dropDownList($model, 'sumber_dana',$sumberdanalist, array('empty' => 'Pilih Sumber Dana',
							'ajax'=>array(
                                'type'=>'POST',                          
                                'url'=>CController::createUrl('/masters/sumberdana/detaillist'),
                                'dataType'=>'json',
                                'success'=>"function(data){
                                            if (data.error){
                                                $('#subdetailsumberdana').hide();
                                                $('#sumberdana_lain').hide();
                                            }else{
                                                if (!data.lain){
                                                    $('#sumberdana_lain').hide()
                                                    var subdetail = $('#ProposalPenelitian_detail_sumber_dana');
                                                    var option = '<option value=\'\'>Detail Sumber Dana</option>';
                                                    $.each(data.result,function(i,v){
                                                        option = option + '<option value=\''+i+'\'>'+v+'</option>';
                                                        console.log(option);
                                                    });
                                                    subdetail.html(option);
                                                    $('#subdetailsumberdana').show();
                                                }
                                                
                                                if (data.lain){
                                                    $('#sumberdana_lain').show();
                                                    $('#subdetailsumberdana').hide();
                                                }
                                                
                                            }

                                        }",
                            'data'=>array('sumber_dana'=>'js:this.value'),
                                 ),'class'=>"uniformselect"));
		?>
      </span>
  </div>

  <div class="par" id="subdetailsumberdana" style="display:none;">
		<?php echo $form->labelEx($model,'detail_sumber_dana'); ?>
      <span class="field">
    <?php echo $form->dropDownList($model, 'detail_sumber_dana',array(), 
                                    array('empty' => 'Pilih Detail Sumber Dana','class'=>"uniformselect"			)
                                 );
		?>
      </span>
  </div>

  <div class="par" id="sumberdana_lain" style="display:none;">
		<?php echo $form->labelEx($model,'sumber_dana_lain'); ?>
      <span class="field">
        <?php echo $form->textField($model,'sumber_dana_lain',array('size'=>160,'maxlength'=>255,'class'=>'input-large')); ?>
      </span>
  </div>
	<div class="par">
		<?php echo $form->labelEx($model,'tahun_anggaran'); ?>
      <span class="field">
		<?php echo $form->dropDownList($model,'tahun_anggaran',$arrYears,array('class'=>"uniformselect"));?>      
      </span>
		<?php echo $form->error($model,'tahun_anggaran'); ?>
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'keywords'); ?>
      <span class="field">
		<?php echo $form->textField($model,'keywords',array('size'=>160,'maxlength'=>255,'class'=>'input-xxlarge')); ?>
      </span>
		<?php echo $form->error($model,'keywords'); ?>
    
	</div>

	<div class="par">
		<?php echo $form->labelEx($model,'klien (Optional )'); ?>
      <span class="field">
		<?php //echo $form->textField($model,'klien',array('size'=>60,'maxlength'=>255)); ?>
      <?php $clients = $model->getClients(); 
     
      ?>
      <?php echo $form->dropDownList($model, 'klien', $clients, array('empty' => 'Pilih Klien',
          'ajax'=>array(
                                'type'=>'POST',                          
                                'url'=>CController::createUrl('/masters/klien/detaillist'),
                                'dataType'=>'json',
                                'success'=>"function(data){
                                            if (data.error){
                                                $('#subdetailklien').hide();
                                                $('#klien_lain').hide();
                                            }else{
                                                if (!data.lain){
                                                    $('#klien_lain').hide()
                                                    var subdetail = $('#ProposalPenelitian_detail_klien');
                                                    var option = '<option value=\'\'>Detail Klien</option>';
                                                    $.each(data.result,function(i,v){
                                                        option = option + '<option value=\''+i+'\'>'+v+'</option>';
                                                        console.log(option);
                                                    });
                                                    subdetail.html(option);
                                                    $('#subdetailklien').show();
                                                }
                                                
                                                if (data.lain){
                                                    $('#klien_lain').show();
                                                    $('#subdetailklien').hide();
                                                }
                                                
                                            }

                                        }",
                            'data'=>array('klien'=>'js:this.value'),
                                 ),
          'class'=>"uniformselect"			)); ?>    
      </span>
		<?php echo $form->error($model,'klien'); ?>
	</div>

<div class="par" id="subdetailklien" style="display:none;">
    <?php echo $form->labelEx($model,'detail_klien'); ?>
      <span class="field">
    <?php echo $form->dropDownList($model, 'detail_klien',array(), 
                                    array('empty' => 'Pilih Detail Klien','class'=>"uniformselect"			)
                                 );
    ?>
      </span>
  </div>
 <div class="par" id="klien_lain" style="display:none;">
		<?php echo $form->labelEx($model,'klien_lain'); ?>
      <span class="field">
        <?php echo $form->textField($model,'klien_lain',array('size'=>160,'maxlength'=>255,'class'=>'input-large')); ?>
      </span>
  </div>
<?php if ( $model->editable ) { ?>
  <div class="stdformbutton">
		
      <button type="submit" class="btn btn-primary">
          <?php echo $model->isNewRecord ? 'Proposal Penelitian Baru' : 'Simpan'?>
      </button>
      <button type="reset" class="btn">Reset Form</button>
	</div>
<?php } ?>
<?php $this->endWidget(); ?>
<?php
$cs=Yii::app()->clientScript;

$cs->registerScriptFile( Yii::app()->theme->baseUrl .'/js/jquery.tagsinput.min.js', CClientScript::POS_END);

?>

<script type="text/javascript">
  jQuery(document).ready(function(){
      jQuery('.uniform-file').uniform();
  });
</script>  
  
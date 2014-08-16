<div id="tabsx">
    <ul>
        <li><a href="#tabs-2">Daftar Diseminasi</a></li>
        <li><a href="#tabs-1">Form Diseminasi</a></li>
        <li style="clear:both;"></li>
    </ul>

    <div id="tabs-1">
        <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-penelitian-form',
	'enableAjaxValidation'=>false,
  'htmlOptions'=>array('class'=>'stdform stdform2', 'enctype'=>'multipart/form-data')
)); 
        ?>
        <?php echo $form->hiddenField($modelDiseminasi,'proposal_id', array('value'=>$model->id)) ?>
			<p>
			  <label>Media</label>
			  <span class="field">
            <?php 
            $listMedia = array('1'=>'Media Cetak', '2' => 'Media Elektronik', '3'=> 'Media Internet', '4'=>'Lain -lain');
            echo $form->dropDownList($modelDiseminasi, 'media', $listMedia, array('empty' => 'Pilih Media','class'=>"uniformselect"			)); ?>
            </span>
			</p>
			<p>
				<label>Tanggal</label>
				<span class="field">
            <?php echo $form->textField($modelDiseminasi, 'tanggal', array('value'=> $modelDiseminasi->getTanggal(),'class'=>'input-small','id'=>'datepicker')); ?> 
            &nbsp; <small><em>mm / dd / yyyy</em></small>
            </span>
			</p>
			
			<p>
				<label>Tempat</label>
				
				  <span class="field">
              <?php echo $form->textField($modelDiseminasi,'tempat',array('class'=>'input-medium')); ?>
          </span>
				
			</p>
			
			<p>
				<label>Keterangan</label>
				<span class="field">
				<?php echo $form->textarea($modelDiseminasi,'keterangan'); ?>
        </span>
			</p>
			
			<p>
				<label>Upload File Pendukung</label>
				<span class="field">
          <?php echo $form->fileField($newModelFile,'filename', array('class'=>'uniform-file')); ?>   
				</span>
			</p>
      
      <div class="stdformbutton">
		
            <button type="submit" class="btn btn-primary">
                <?php echo $modelDiseminasi->isNewRecord ? 'Tambah Diseminasi' : 'Simpan'?>
            </button>
            <button type="reset" class="btn">Reset Form</button>
        </div>
		<?php $this->endWidget(); ?>
     
    </div> <!-- tabs-1 -->

	<div id="tabs-2">
        <div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">
           <table class="table table-bordered" id="dyntable">
               <colgroup>
                   <col class="con0" style="align: center; width: 4%" />
                   <col class="con1" />
                   <col class="con0" />
                   <col class="con1" />
                   <col class="con0" />
               </colgroup>
               <thead>
                   <tr>
                       <th class="head0 nosort center">No</th>
                       <th class="head0">Media</th>
                       <th class="head0 center">Tanggal</th>
                       <th class="head1 center">Tempat</th>
                       <th class="head0 center">Keterangan</th>
                       <th class="head0 center">File Pendukung</th>
                       <th class="head0 center">Tindakan</th>
                   </tr>
               </thead>
               <tbody>
                   <?php 
                   $no = ($pages->getCurrentPage() * $pages->getPageSize()) + 1;
                   if ( !empty($data) )
                   foreach ($data as $index => $diseminasi) { ?>
                       <tr class="gradeX">
                           <td class="center"><?php echo $no ?></td>
                           <td><?php echo $diseminasi->relmedia->nama ?></td>
                           <td class="center"><?php echo $diseminasi->getTanggal() ?></td>
                           <td class="center">
                               <?php echo $diseminasi->tempat ?>
                           </td>
                           <td class="left"><?php echo $diseminasi->keterangan ?></td>
                           <td class="center">
                               <?php if (!empty($diseminasi->file) )  {  ?>
                               <a href="<?php echo Yii::app()->createUrl('penelitian/file/download)?file='. $diseminasi->file->filename )?>"><?php echo $diseminasi->file->filename ?></a>
                               <?php } ?>
                           </td>
                           
                           <td class="center">
                               <?php if (Yii::app()->user->isSuperAdmin || (  Yii::app()->user->id == $diseminasi->created_by)) { ?>
                                   <a href="<?php echo Yii::app()->createUrl('/penelitian/diseminasipenelitian/view/id/' . $model->id).'?edit='.$diseminasi->id ?>" class="btn btn-warning">Edit</a> 
                                   <a href="<?php echo Yii::app()->createUrl('/penelitian/diseminasipenelitian/delete/id/' . $diseminasi->id) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin untuk menghapus?');">Delete</a> 
                               <?php } ?>

                           </td>
                       </tr>
                   <?php 
                       $no++;
                   } ?>

               </tbody>
           </table>

           <div class="pagination pagination-centered pagination-small" >
               <?php

               $this->widget('CLinkPager', array(
                   'pages' => $pages,
               ));
               ?>
           </div>


           <?php /*  <div class="pagination pagination-centered pagination-small">
               <ul>
                 <li><a href="#">Previous</a></li>
                 <li><a href="#">1</a></li>
                 <li><a href="#">2</a></li>
                 <li><a href="#">3</a></li>
                 <li><a href="#">4</a></li>
                 <li><a href="#">5</a></li>
                 <li><a href="#">6</a></li>
                 <li><a href="#">Next</a></li>
               </ul>
             </div>
             */?>
           </div>
	</div> <!-- tabs-2-->
</div>

<script type="text/javascript">
  jQuery(document).ready(function(){
      jQuery('.uniform-file').uniform();
      <?php if ( !$modelDiseminasi->isNewRecord ) { ?>
         jQuery("#tabsx").tabs({ active: 1 });
      <?php } else{  ?>
          jQuery("#tabsx").tabs();
      <?php } ?>
  });
</script>  
<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */

$this->breadcrumbs=array(
	'Halaman Depan'=>array('index'),
	'Proposal Penelitian'=>array('index'),
	$model->nama_penelitian=>array('view','id'=>$model->id),
	'Update',
);


?>
<div class="row-fluid">
<div class="span16">

  <h4 class="widgettitle nomargin shadowed">Update Pegawai</h4>
  <div class="widgetcontent bordered shadowed nopadding">
<?php echo $this->renderPartial('_form', array('model'=>$model,
      'modelFile'=>$modelFile  )); ?>
</div><!--widgetcontent-->                     

  </div><!--span16-->

</div><!--row-fluid-->
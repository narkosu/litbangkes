<?php
/* @var $this IsuStrategisController */
/* @var $model IsuStrategis */

$this->breadcrumbs=array(
	'Isu Strategises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IsuStrategis', 'url'=>array('index')),
	array('label'=>'Manage IsuStrategis', 'url'=>array('admin')),
);
?>

<div class="contentinner content-dashboard">
<div class="row-fluid">
<div class="span16">

  <h4 class="widgettitle nomargin shadowed">Update Media Diseminasi</h4>
  <div class="widgetcontent bordered shadowed nopadding">
      <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
  </div><!--widgetcontent-->                     

  </div><!--span16-->

</div><!--row-fluid-->
</div>
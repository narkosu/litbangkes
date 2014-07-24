<?php
/* @var $this ProgrespenelitianController */
/* @var $model ProgresPenelitian */

$this->breadcrumbs=array(
	'Progres Penelitians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProgresPenelitian', 'url'=>array('index')),
	array('label'=>'Manage ProgresPenelitian', 'url'=>array('admin')),
);
?>

<h1>Create ProgresPenelitian</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
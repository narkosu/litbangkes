<?php
/* @var $this SumberdanaController */
/* @var $model SumberDana */

$this->breadcrumbs=array(
	'Sumber Danas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SumberDana', 'url'=>array('index')),
	array('label'=>'Create SumberDana', 'url'=>array('create')),
	array('label'=>'View SumberDana', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SumberDana', 'url'=>array('admin')),
);
?>

<h1>Update SumberDana <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this SumberdanaController */
/* @var $model SumberDana */

$this->breadcrumbs=array(
	'Sumber Danas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SumberDana', 'url'=>array('index')),
	array('label'=>'Manage SumberDana', 'url'=>array('admin')),
);
?>

<h1>Create SumberDana</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
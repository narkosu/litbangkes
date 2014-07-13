<?php
/* @var $this SumberdanaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sumber Danas',
);

$this->menu=array(
	array('label'=>'Create SumberDana', 'url'=>array('create')),
	array('label'=>'Manage SumberDana', 'url'=>array('admin')),
);
?>

<h1>Sumber Danas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

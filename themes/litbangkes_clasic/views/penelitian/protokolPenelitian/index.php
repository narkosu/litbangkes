<?php
/* @var $this ProtokolPenelitianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Protokol Penelitians',
);

$this->menu=array(
	array('label'=>'Create ProtokolPenelitian', 'url'=>array('create')),
	array('label'=>'Manage ProtokolPenelitian', 'url'=>array('admin')),
);
?>

<h1>Protokol Penelitians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

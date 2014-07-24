<?php
/* @var $this ProgrespenelitianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Progres Penelitians',
);

$this->menu=array(
	array('label'=>'Create ProgresPenelitian', 'url'=>array('create')),
	array('label'=>'Manage ProgresPenelitian', 'url'=>array('admin')),
);
?>

<h1>Progres Penelitians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

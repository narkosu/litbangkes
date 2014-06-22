<?php
/* @var $this ProposalPenelitianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proposal Penelitians',
);

$this->menu=array(
	array('label'=>'Create ProposalPenelitian', 'url'=>array('create')),
	array('label'=>'Manage ProposalPenelitian', 'url'=>array('admin')),
);
?>

<h1>Proposal Penelitians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

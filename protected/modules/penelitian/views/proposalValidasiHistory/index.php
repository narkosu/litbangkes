<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proposal Validasi Histories',
);

$this->menu=array(
	array('label'=>'Create ProposalValidasiHistory', 'url'=>array('create')),
	array('label'=>'Manage ProposalValidasiHistory', 'url'=>array('admin')),
);
?>

<h1>Proposal Validasi Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

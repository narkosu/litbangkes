<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $model ProposalValidasiHistory */

$this->breadcrumbs=array(
	'Proposal Validasi Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProposalValidasiHistory', 'url'=>array('index')),
	array('label'=>'Create ProposalValidasiHistory', 'url'=>array('create')),
	array('label'=>'Update ProposalValidasiHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProposalValidasiHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProposalValidasiHistory', 'url'=>array('admin')),
);
?>

<h1>View ProposalValidasiHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proposal_id',
		'step',
		'level_validasi',
		'value_validasi',
		'alasan',
		'created_at',
		'created_by',
	),
)); ?>

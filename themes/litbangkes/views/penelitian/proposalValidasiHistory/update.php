<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $model ProposalValidasiHistory */

$this->breadcrumbs=array(
	'Proposal Validasi Histories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProposalValidasiHistory', 'url'=>array('index')),
	array('label'=>'Create ProposalValidasiHistory', 'url'=>array('create')),
	array('label'=>'View ProposalValidasiHistory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProposalValidasiHistory', 'url'=>array('admin')),
);
?>

<h1>Update ProposalValidasiHistory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
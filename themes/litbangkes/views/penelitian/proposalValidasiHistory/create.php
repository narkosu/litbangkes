<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $model ProposalValidasiHistory */

$this->breadcrumbs=array(
	'Proposal Validasi Histories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProposalValidasiHistory', 'url'=>array('index')),
	array('label'=>'Manage ProposalValidasiHistory', 'url'=>array('admin')),
);
?>

<h1>Create ProposalValidasiHistory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */

$this->breadcrumbs=array(
	'Proposal Penelitians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProposalPenelitian', 'url'=>array('index')),
	array('label'=>'Manage ProposalPenelitian', 'url'=>array('admin')),
);
?>

<h1>Create ProposalPenelitian</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
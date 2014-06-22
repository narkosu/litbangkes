<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */

$this->breadcrumbs=array(
	'Proposal Penelitians'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProposalPenelitian', 'url'=>array('index')),
	array('label'=>'Create ProposalPenelitian', 'url'=>array('create')),
	array('label'=>'View ProposalPenelitian', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProposalPenelitian', 'url'=>array('admin')),
);
?>

<h1>Update ProposalPenelitian <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
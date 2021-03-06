<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $model ProposalValidasiHistory */

$this->breadcrumbs=array(
	'Proposal Validasi Histories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProposalValidasiHistory', 'url'=>array('index')),
	array('label'=>'Create ProposalValidasiHistory', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('proposal-validasi-history-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Proposal Validasi Histories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proposal-validasi-history-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'proposal_id',
		'step',
		'level_validasi',
		'value_validasi',
		'alasan',
		/*
		'created_at',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

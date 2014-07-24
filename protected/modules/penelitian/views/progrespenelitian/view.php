<?php
/* @var $this ProgrespenelitianController */
/* @var $model ProgresPenelitian */

$this->breadcrumbs=array(
	'Progres Penelitians'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProgresPenelitian', 'url'=>array('index')),
	array('label'=>'Create ProgresPenelitian', 'url'=>array('create')),
	array('label'=>'Update ProgresPenelitian', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProgresPenelitian', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProgresPenelitian', 'url'=>array('admin')),
);
?>

<h1>View ProgresPenelitian #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proposal_id',
		'periode',
		'pagu',
		'tanggal_pangajuan_etik',
		'file_ijin_etik',
		'narasi',
		'realisasi_anggaran',
		'masalah',
		'tindak_lanjut',
		'created_by',
		'created_at',
		'status',
	),
)); ?>

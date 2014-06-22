<?php
/* @var $this ProposalPenelitianController */
/* @var $model ProposalPenelitian */

$this->breadcrumbs=array(
	'Proposal Penelitians'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProposalPenelitian', 'url'=>array('index')),
	array('label'=>'Create ProposalPenelitian', 'url'=>array('create')),
	array('label'=>'Update ProposalPenelitian', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProposalPenelitian', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProposalPenelitian', 'url'=>array('admin')),
);
?>

<h1>View ProposalPenelitian #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'pegawai_id',
		'nama_penelitian',
		'jabatan_fungsional_id',
		'sub_bidang_id',
		'jenis_penelitian_id',
		'tahun_anggaran',
		'keywords',
		'klien',
		'status',
		'step',
		'created_at',
	),
)); ?>

<?php
/* @var $this ProposalPenelitianController */
/* @var $data ProposalPenelitian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::encode($data->pegawai_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_penelitian')); ?>:</b>
	<?php echo CHtml::encode($data->nama_penelitian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabatan_fungsional_id')); ?>:</b>
	<?php echo CHtml::encode($data->jabatan_fungsional_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_bidang_id')); ?>:</b>
	<?php echo CHtml::encode($data->sub_bidang_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_penelitian_id')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_penelitian_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('klien')); ?>:</b>
	<?php echo CHtml::encode($data->klien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step')); ?>:</b>
	<?php echo CHtml::encode($data->step); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>

</div>
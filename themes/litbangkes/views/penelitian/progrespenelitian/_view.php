<?php
/* @var $this ProgrespenelitianController */
/* @var $data ProgresPenelitian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_id')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode')); ?>:</b>
	<?php echo CHtml::encode($data->periode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu')); ?>:</b>
	<?php echo CHtml::encode($data->pagu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_pangajuan_etik')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_pangajuan_etik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_ijin_etik')); ?>:</b>
	<?php echo CHtml::encode($data->file_ijin_etik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('narasi')); ?>:</b>
	<?php echo CHtml::encode($data->narasi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('masalah')); ?>:</b>
	<?php echo CHtml::encode($data->masalah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tindak_lanjut')); ?>:</b>
	<?php echo CHtml::encode($data->tindak_lanjut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>
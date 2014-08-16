<?php
/* @var $this ProposalValidasiHistoryController */
/* @var $data ProposalValidasiHistory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_id')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step')); ?>:</b>
	<?php echo CHtml::encode($data->step); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_validasi')); ?>:</b>
	<?php echo CHtml::encode($data->level_validasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_validasi')); ?>:</b>
	<?php echo CHtml::encode($data->value_validasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alasan')); ?>:</b>
	<?php echo CHtml::encode($data->alasan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>
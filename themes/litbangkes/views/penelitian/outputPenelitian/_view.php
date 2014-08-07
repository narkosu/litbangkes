<?php
/* @var $this ProtokolPenelitianController */
/* @var $data ProtokolPenelitian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_id')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anggran')); ?>:</b>
	<?php echo CHtml::encode($data->anggran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />


</div>
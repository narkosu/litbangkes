<?php
/* @var $this IsuStrategisController */
/* @var $data IsuStrategis */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_start')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_end')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isu_strategis')); ?>:</b>
	<?php echo CHtml::encode($data->isu_strategis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>
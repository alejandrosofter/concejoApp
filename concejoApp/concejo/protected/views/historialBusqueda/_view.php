<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHistorialBusqueda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idHistorialBusqueda), array('view', 'id'=>$data->idHistorialBusqueda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cadenaBusqueda')); ?>:</b>
	<?php echo CHtml::encode($data->cadenaBusqueda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaBusqueda')); ?>:</b>
	<?php echo CHtml::encode($data->fechaBusqueda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iphttp')); ?>:</b>
	<?php echo CHtml::encode($data->iphttp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proxy')); ?>:</b>
	<?php echo CHtml::encode($data->proxy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipaccess')); ?>:</b>
	<?php echo CHtml::encode($data->ipaccess); ?>
	<br />


</div>
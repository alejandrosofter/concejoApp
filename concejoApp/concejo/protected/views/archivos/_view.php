<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro_id')); ?>:</b>
	<?php echo CHtml::encode($data->registro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resolucion')); ?>:</b>
	<?php echo CHtml::encode($data->resolucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacarga')); ?>:</b>
	<?php echo CHtml::encode($data->fechacarga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('palabrasclaves')); ?>:</b>
	<?php echo CHtml::encode($data->palabrasclaves); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoria); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fojas')); ?>:</b>
	<?php echo CHtml::encode($data->fojas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rutaarchivo')); ?>:</b>
	<?php echo CHtml::encode($data->rutaarchivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_file_name')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_content_type')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_content_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_file_size')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_file_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_updated_at); ?>
	<br />

	*/ ?>

</div>
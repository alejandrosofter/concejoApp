<?php
$this->breadcrumbs=array(
	'Archivoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Archivos', 'url'=>array('index')),
	array('label'=>'Create Archivos', 'url'=>array('create')),
	array('label'=>'Update Archivos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Archivos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Archivos', 'url'=>array('admin')),
);
?>

<h1>View Archivos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'registro_id',
		'resolucion',
		'fechacarga',
		'comentario',
		'palabrasclaves',
		'categoria',
		'titulo',
		'fojas',
		'rutaarchivo',
		'created_at',
		'updated_at',
		'pdf_file_name',
		'pdf_content_type',
		'pdf_file_size',
		'pdf_updated_at',
	),
)); ?>

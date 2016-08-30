<?php
$this->breadcrumbs=array(
	'Historial Busquedas'=>array('index'),
	$model->idHistorialBusqueda,
);

$this->menu=array(
	array('label'=>'List HistorialBusqueda', 'url'=>array('index')),
	array('label'=>'Create HistorialBusqueda', 'url'=>array('create')),
	array('label'=>'Update HistorialBusqueda', 'url'=>array('update', 'id'=>$model->idHistorialBusqueda)),
	array('label'=>'Delete HistorialBusqueda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idHistorialBusqueda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HistorialBusqueda', 'url'=>array('admin')),
);
?>

<h1>View HistorialBusqueda #<?php echo $model->idHistorialBusqueda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idHistorialBusqueda',
		'ip',
		'cadenaBusqueda',
		'fechaBusqueda',
		'iphttp',
		'proxy',
		'ipaccess',
	),
)); ?>

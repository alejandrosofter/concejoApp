<?php
$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Movimientos', 'url'=>array('index')),
	array('label'=>'Create Movimientos', 'url'=>array('create')),
	array('label'=>'Update Movimientos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Movimientos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Movimientos', 'url'=>array('admin')),
);
?>

<h1>View Movimientos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'registro_id',
		'fecha',
		'area_id',
		'tipoMovimiento',
		'estado',
		'comentario',
		'created_at',
		'updated_at',
	),
)); ?>

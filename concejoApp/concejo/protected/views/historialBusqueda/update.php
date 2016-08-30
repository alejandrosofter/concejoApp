<?php
$this->breadcrumbs=array(
	'Historial Busquedas'=>array('index'),
	$model->idHistorialBusqueda=>array('view','id'=>$model->idHistorialBusqueda),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar HistorialBusqueda', 'url'=>array('index')),
	array('label'=>'Nuevo HistorialBusqueda', 'url'=>array('create')),
);
?>
<header id="page-header">
<h1 id="page-title">Actualizar registro HistorialBusqueda <?php echo $model->idHistorialBusqueda; ?></h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
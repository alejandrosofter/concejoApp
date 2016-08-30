<?php
$this->breadcrumbs=array(
	'Historial Busquedas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar HistorialBusqueda', 'url'=>array('index')),
);
?>
<header id="page-header">
<h1 id="page-title">Nuevo HistorialBusqueda</h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
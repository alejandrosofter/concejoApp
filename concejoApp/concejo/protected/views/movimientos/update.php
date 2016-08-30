<?php
$this->breadcrumbs=array(
	'Movimientos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Nuevo Movimientos', 'url'=>array('create')),
);
?>
<header id="page-header">
<h1 id="page-title">Modificar</h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
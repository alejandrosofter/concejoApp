<?php
$this->breadcrumbs=array(
	'Movimientos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
);
?>
<header id="page-header">
<h1 id="page-title">Nuevo Movimiento</h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
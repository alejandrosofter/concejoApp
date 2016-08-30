<?php
$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listar Archivos', 'url'=>array('index')),
	array('label'=>'Nuevo Archivos', 'url'=>array('create')),
);
?>
<header id="page-header">
<h1 id="page-title">Modificar Ordenanza</h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
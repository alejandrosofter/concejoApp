<?php
$this->breadcrumbs=array(
	'Archivos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Archivos', 'url'=>array('index')),
);
?>
<header id="page-header">
<h1 id="page-title">Nuevo Archivo <small> PDF de ordenanza</small></h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
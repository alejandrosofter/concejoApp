<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Areas', 'url'=>array('index')),
);
?>
<header id="page-header">
<h1 id="page-title">Nueva Area</h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
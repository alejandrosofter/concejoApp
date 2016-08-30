<?php
$this->breadcrumbs=array(
	'Registros'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Registros', 'url'=>array('index')),
);
?>
<header id="page-header">
<h1 id="page-title">Nuevo Registro</h1>
</header>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?if(isset($_GET['imprime']) && $_GET['imprime']!=''){?>
<script>
$.fancybox( {href : 'index.php?r=registros/imprimir&id=<?=$_GET["id"]?>',width:'1000px', type : 'iframe'} );
</script>
<?}?>
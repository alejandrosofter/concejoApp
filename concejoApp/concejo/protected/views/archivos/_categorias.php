<?$categorias=$model->getCategoriasBusqueda();?>
<h4 onclick='clickCategoria()' style='cursor:pointer'>Categorias (<?=count($categorias);?>) <small><?=isset($_GET['categoria'])?$_GET['categoria']:'';?></small> </h4>
<table id='categorias_' class="table table-condensed">
<?
$i=0;
foreach($categorias as $cat){?>

<?if($i==0)echo '<tr>'?>
<td><a href='index.php?r=archivos/index&Archivos[buscar]=<?=isset($_GET["Archivos"])?$_GET["Archivos"]["buscar"]:"";?>&categoria=<?=$cat->categoria;?>'> <?=$cat->categoria;?> (<?=$cat->cantidad;?>)</a> </td>
<?if($i==5){echo '</tr>';$i=0;}?>

<? $i++;}?>
</table>
<script>
$('#categorias_').hide();
function clickCategoria()
{
	 if ($('#categorias_').is(':visible'))
	 	$('#categorias_').hide();
	 	else $('#categorias_').show();
}
</script>
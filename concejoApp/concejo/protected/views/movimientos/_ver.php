<h1>Movimientos <?=$registro->numerointerno;?> <small><?=count($registro->movimientos).' movimientos';?></small></h1>
<table class="table table-condensed">
<tr><th>Fecha</th><th>Area</th><th>Comentario</th><th>Tipo Movimiento</th><th>Estado</th></tr>
<? foreach($registro->movimientos as $mov){?>

<tr><td> <?=Yii::app()->dateFormatter->format("dd/MM/yyyy HH:mm",$mov->fecha);?> </td> <td> <?=isset($mov->area)?$mov->area->nombreArea:'-';?> </td> <td> <?=$mov->comentario==''?'-':$mov->comentario;?> </td><td> <?=$mov->tipoMovimiento;?> </td><td> <?=$mov->estado;?> </td><td><a target='_blank' href='index.php?r=movimientos/update&id=<?=$mov->id;?>'><img src='images/iconos/famfam/pencil.png'/></a></td></tr>


<?}?>
</table>
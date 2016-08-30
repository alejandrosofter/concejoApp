<?php
$this->breadcrumbs=array(
	'Historial de Busquedas',
);
$this->menu=array(
	
);
?>

<header id="page-header">
<h1 id="page-title">Historial Busquedas</h1>
</header>
<?=$this->renderPartial('_search',array('model'=>$model));?><?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'historial-busqueda-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		array(
            'type'=>'html',
            'header'=>'Fecha',
            'value'=>'"<small>".Yii::app()->dateFormatter->format("dd-MM-yyyy HH:mm",$data->fechaBusqueda)."</small>"',
            'htmlOptions'=>array('style'=>'width: 90px'),
            ),
		'cadenaBusqueda',
		
		'ipaccess',
		
	),
)); ?>

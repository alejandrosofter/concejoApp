<?php
$this->breadcrumbs=array(
	'Movimientos',
);
$this->menu=array(
	array('label'=>'Nuevo Movimiento', 'url'=>array('create')),
);
?>

<header id="page-header">
<h1 id="page-title">Administración de Movimientos</h1>
</header>
<?=$this->renderPartial('_search',array('model'=>$model));?><?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movimientos-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		array(
            'type'=>'html',
            'header'=>'Fecha',
            'value'=>'"<small>".Yii::app()->dateFormatter->format("dd/MM/yyyy",$data->fecha)."</small>"',
            'htmlOptions'=>array('style'=>'width: 80px'),
            ),
		'registro.nombre',
	
		'area.nombreArea',
		'tipoMovimiento',
		'estado',
		'comentario',
		/*
		
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'CButtonColumn','template'=>'{update} {delete}','buttons'=>array(
				'update' => array(
                'visible'=>'Yii::app()->user->checkAccess("Movimientos.Update")',

            ),
				'delete' => array(
                'visible'=>'Yii::app()->user->checkAccess("Movimientos.Delete")',

            ),

		)
		),
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Movimientoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Movimientos', 'url'=>array('index')),
	array('label'=>'Nuevo Movimientos', 'url'=>array('create')),
);


<h1>Administracion Movimientoses</h1>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movimientos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'registro_id',
		'fecha',
		'area_id',
		'tipoMovimiento',
		'estado',
		/*
		'comentario',
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

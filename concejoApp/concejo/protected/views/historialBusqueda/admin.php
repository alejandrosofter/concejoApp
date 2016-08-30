<?php
$this->breadcrumbs=array(
	'Historial Busquedas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar HistorialBusqueda', 'url'=>array('index')),
	array('label'=>'Nuevo HistorialBusqueda', 'url'=>array('create')),
);


<h1>Administracion Historial Busquedas</h1>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'historial-busqueda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idHistorialBusqueda',
		'ip',
		'cadenaBusqueda',
		'fechaBusqueda',
		'iphttp',
		'proxy',
		/*
		'ipaccess',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

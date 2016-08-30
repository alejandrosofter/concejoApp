<?php
$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Registros', 'url'=>array('index')),
	array('label'=>'Nuevo Registros', 'url'=>array('create')),
);


<h1>Administracion Registroses</h1>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registros-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'informacionAdicional',
		'expediente',
		'asunto',
		'remitente',
		'tipoRemitente',
		/*
		'dni',
		'telefono',
		'fechaIngreso',
		'fojas',
		'comentario',
		'numeroOrdenaza',
		'year',
		'comision_id',
		'estado',
		'created_at',
		'updated_at',
		'tipoRegistro',
		'numeronota',
		'resolucion',
		'barrio',
		'numerointerno',
		'numdeseos',
		'numcomunicacion',
		'numdeclaracion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

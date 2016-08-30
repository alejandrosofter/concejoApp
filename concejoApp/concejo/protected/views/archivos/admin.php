<?php
$this->breadcrumbs=array(
	'Archivoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Archivos', 'url'=>array('index')),
	array('label'=>'Nuevo Archivos', 'url'=>array('create')),
);


<h1>Administracion Archivoses</h1>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'archivos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'registro_id',
		'resolucion',
		'fechacarga',
		'comentario',
		'palabrasclaves',
		/*
		'categoria',
		'titulo',
		'fojas',
		'rutaarchivo',
		'created_at',
		'updated_at',
		'pdf_file_name',
		'pdf_content_type',
		'pdf_file_size',
		'pdf_updated_at',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

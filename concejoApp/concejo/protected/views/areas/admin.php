<?php
$this->breadcrumbs=array(
	'Areases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Areas', 'url'=>array('index')),
	array('label'=>'Nuevo Areas', 'url'=>array('create')),
);


<h1>Administracion Areases</h1>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'areas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombreArea',
		'created_at',
		'updated_at',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

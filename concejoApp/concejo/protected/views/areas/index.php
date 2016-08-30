<?php
$this->breadcrumbs=array(
	'Areas',
);
$this->menu=array(
	array('label'=>'Nueva Area', 'url'=>array('create')),
);
?>

<header id="page-header">
<h1 id="page-title">Administración Areas</h1>
</header>
<?=$this->renderPartial('_search',array('model'=>$model));?><?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'areas-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		
		'nombreArea',
		array(
			'class'=>'CButtonColumn','template'=>'{update} {delete}'
		),
	),
)); ?>

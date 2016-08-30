<?php
$this->breadcrumbs=array(
	'Archivos',
);
$this->menu=array(
	array('label'=>'Nuevo Archivo', 'url'=>array('create')),
);
?>

<header id="page-header">
<h1 id="page-title">Administración de Ordenanzas</h1>
</header>

<?=$this->renderPartial('_search',array('model'=>$model));?>
<?=$this->renderPartial('_categorias',array('model'=>$model));?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'archivos-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		array(
            'type'=>'html',
            'header'=>'Fecha',
            'value'=>'"<small>".Yii::app()->dateFormatter->format("dd/MM/yyyy",$data->fechacarga)."</small>"',
            'htmlOptions'=>array('style'=>'width: 90px'),
            ),
		'rutaarchivo',
		'titulo',
		'registro_id',
		'resolucion',
		'fojas',
		'comentario',

		'categoria',
		/*
		
		
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
			'class'=>'CButtonColumn','template'=>'{verArchivo} {update} {delete}',
			'buttons'=>array(
				'verArchivo' => array(
                'visible'=>'$data->pdf_file_name!=""',
                'label'=>'Ver Archivo',
                'imageUrl'=>'images/iconos/famfam/page_white_acrobat.png',
                'url' => '"files/".$data->pdf_file_name',

            ),
				'update' => array(
                'visible'=>'Yii::app()->user->checkAccess("Archivos.Update")',

            ),
				'delete' => array(
                'visible'=>'Yii::app()->user->checkAccess("Archivos.Delete")',

            ),
		)
		),
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Registros',
);
$this->menu=array(
	array('label'=>'Nuevo Registro', 'url'=>array('create')),
);
?>

<header id="page-header">
<h1 id="page-title">Administración de Registros</h1>
</header>
<?=$this->renderPartial('_search',array('model'=>$model));?><?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'registros-grid',
	'dataProvider'=>$model->search(),
	
	'columns'=>array(
		array(
            'type'=>'html',
            'header'=>'Fecha',
            'value'=>'"<small>".Yii::app()->dateFormatter->format("dd/MM/yy",$data->fechaIngreso)."</small>"',
            'htmlOptions'=>array('style'=>'width: 80px'),
            ),
		'numeronota',
		array(
            'type'=>'html',
            'header'=>'Interno',
            'value'=>'"<strong><small>".$data->nombre."</small></strong>"',
            'htmlOptions'=>array('style'=>'width: 50px'),
            ),
		'expediente',
		'asunto',
		array(
			'header'=>'Remitente',
			'value'=>'"<strong>".$data->remitente."</strong> <small> ".$data->tipoRemitente."</small>"',
			'type'=>'html',
			'htmlOptions'=>array('style'=>'width:190px')
			),
		'barrio',
		'informacionAdicional',
		'numeroOrdenaza',
		
		'year',
		array(
			'header'=>'Estado',
			'value'=>'Registros::model()->getUltimoMovimiento($data->id)',
			'type'=>'html'
			),
		
		array(
			'header'=>'',
			'value'=>'"(".count($data->movimientos).")"',
			'type'=>'html',
			'htmlOptions'=>array('style'=>'width:20px')
			),
		/*
		'dni',
		'telefono',
		
		'fojas',
		'comentario',
		
		
		
		
		'created_at',
		'updated_at',
		'tipoRegistro',
		
		'resolucion',
		'barrio',
	
		'numdeseos',
		'numcomunicacion',
		'numdeclaracion',
		*/
		array(
			'class'=>'CButtonColumn','template'=>'{movimientos} {imprimir} {update} {delete}','htmlOptions'=>array('style'=>'width:90px'),
			'buttons'=>array(
				'imprimir' => array(
                'label'=>'Imprimir',
                'imageUrl'=>'images/iconos/famfam/printer.png',
                'url' => '"index.php?r=registros/imprimir&id=".$data->id',
                'options'=>array('class'=>'imprime','data-fancybox-type'=>'iframe'),
                'visible'=>'Yii::app()->user->checkAccess("Registros.Imprimir")',

            ),
				'movimientos' => array(
                'label'=>'Ver Movimientos',
                'imageUrl'=>'images/iconos/famfam/shape_move_front.png',
                'options'=>array('class'=>'movimientos','data-fancybox-type'=>'iframe'),
                'url' => '"index.php?r=movimientos/ver&id=".$data->id',
                'visible'=>'Yii::app()->user->checkAccess("Movimientos.Ver")',
            ),
				'update' => array(
                'visible'=>'Yii::app()->user->checkAccess("Registros.Update")',

            ),
				'delete' => array(
                'visible'=>'Yii::app()->user->checkAccess("Registros.Delete")',

            ),
		)
		),
	),
)); ?>

<?if(isset($_GET['imprime']) && $_GET['imprime']!=''){?>
<script>
$.fancybox( {href : 'index.php?r=registros/imprimir&id=<?=$_GET["id"]?>',width:'1000px', type : 'iframe'} );
</script>
<?}?>

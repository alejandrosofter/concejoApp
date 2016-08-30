<!DOCTYPE html>
<html lang="en">
    <head>

 <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Monda">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Playball">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Wire One">
  <link rel="stylesheet" type="text/css" href="js/">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Add fancyBox -->
<link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />
<link rel="stylesheet" href="js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<link rel="stylesheet" href="js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

<!-- CONTEXT -->
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/contextMenu/src/jquery.ui.position.js', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/contextMenu/src/jquery.contextMenu.js', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/contextMenu/prettify/prettify.js', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/contextMenu/screen.js', CClientScript::POS_HEAD); ?>

    <link href="js/contextMenu//src/jquery.contextMenu.css" rel="stylesheet" type="text/css" />

<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/webcam/jquery.webcam.js', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.3', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/print.js', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/timeago.js', CClientScript::POS_HEAD); ?>
<? Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/block.js', CClientScript::POS_HEAD); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
     <script>
 jQuery(document).ready(function() {
    jQuery.timeago.settings.allowFuture = true;
  // Spanish
jQuery.timeago.settings.strings = {
   prefixAgo: "hace",
   prefixFromNow: "dentro de",
   suffixAgo: "",
   suffixFromNow: "",
   seconds: "menos de un minuto",
   minute: "un minuto",
   minutes: "unos %d minutos",
   hour: "una hora",
   hours: "%d horas",
   day: "un día",
   days: "%d días",
   month: "un mes",
   months: "%d meses",
   year: "un año",
   years: "%d años"
};
  jQuery("abbr.timeago").timeago();
  
});
 $(document).ready(function() {
  $(".imprime").fancybox({
    fitToView : false,
    width   : '1000px',
    height    : '100%',
    autoSize  : false,
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });
  $(".movimientos").fancybox({
    maxWidth  : 800,
    maxHeight : 600,
    fitToView : false,
    width   : '70%',
    height    : '70%',
    autoSize  : false,
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });
});
 </script>
<div class="container">
<? $this->widget( 'ext.EChosen.EChosen');?>
<?
$usuario=null;
if(isset(Yii::app()->user->id)) $usuario=Usuarios::model()->findByPk(Yii::app()->user->id);?>
 <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    
    'brandUrl'=>'index.php',

    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'encodeLabel'=>true,
            'items'=>array(
               
                array('label'=>'Archivo', 'visible'=>Yii::app()->user->checkAccess("Archivos.Index"),'icon'  => 'icon-file', 'url'=>'#', 'items'=>array(                   
                    array('label'=>'Ver Ordenanzas','visible'=>Yii::app()->user->checkAccess("Archivos.Index"), 'url'=>'index.php?r=archivos'),
                    array('label'=>'Agregar','visible'=>Yii::app()->user->checkAccess("Archivos.Create"), 'url'=>'index.php?r=archivos/create'),
                    '---',
                    
                    array('label'=>'Ver Historial de Busquedas', 'visible'=>Yii::app()->user->checkAccess("HistorialBusqueda.Index"),'url'=>'index.php?r=historialBusqueda'),
                )),
                array('label'=>'Areas','visible'=>Yii::app()->user->checkAccess("Areas.Index"),'icon'  => 'icon-fullscreen', 'url'=>'#', 'items'=>array(
                   
                    array('label'=>'Ver Areas','visible'=>Yii::app()->user->checkAccess("Areas.Index"), 'url'=>'index.php?r=areas'),
                    array('label'=>'Agregar','visible'=>Yii::app()->user->checkAccess("Areas.Create"), 'url'=>'index.php?r=areas/create'),
                )),
                array('label'=>'Registros','visible'=>Yii::app()->user->checkAccess("Registros.Index"),'icon'  => 'icon-list-alt', 'url'=>'#', 'items'=>array(
                   
                    array('label'=>'Ver Registros','visible'=>Yii::app()->user->checkAccess("Registros.Index"), 'url'=>'index.php?r=registros'),
                    array('label'=>'Agregar Registro', 'visible'=>Yii::app()->user->checkAccess("Registros.Create"),'url'=>'index.php?r=registros/create')
                )),
                 array('label'=>'Movimientos','visible'=>Yii::app()->user->checkAccess("Movimientos.Index"),'icon'  => 'icon-retweet', 'url'=>'#', 'items'=>array(
                   
                    array('label'=>'Ver Movimientos','visible'=>Yii::app()->user->checkAccess("Movimientos.Index"), 'url'=>'index.php?r=movimientos'),
                    array('label'=>'Agregar movimiento','visible'=>Yii::app()->user->checkAccess("Movimientos.Create"),  'url'=>'index.php?r=movimientos/create'),
                )),
                 array('label'=>'Configuraciónes','visible'=>Yii::app()->user->checkAccess("settings.variablesSistema"), 'icon'  => 'asterisk', 'url'=>'#', 'items'=>array(
                    array('label'=>'Datos de Sistema','visible'=>Yii::app()->user->checkAccess("settings.variablesSistema"), 'url'=>'index.php?r=settings/variablesSistema'),
                    array('label'=>'Envio de Mails', 'visible'=>Yii::app()->user->checkAccess("mail"),'url'=>'index.php?r=mail'),
                     array('label'=>'Usuarios', 'visible'=>Yii::app()->user->checkAccess("usuarios"),'url'=>'index.php?r=usuarios')
                )),
                 array('label'=>'','encodeLabel'=>true,'icon'  => 'arrow-down white', 'url'=>'#','activeCssClass'=>'icon-user', 'items'=>$this->menu),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>(isset(Yii::app()->user->id))?$usuario->nombreUsuario:'','icon'  => 'user white', 'url'=>'#', 'items'=>array(
                    array('label'=>'Logout', 'icon'  => 'circle-arrow-left','url'=>'index.php?r=site/logout'),
                    //array('label'=>'Mis Datos','icon'  => 'user', 'url'=>'index.php?r=usuarios/update&id='.Yii::app()->user->id),
                )),
            ),
        ),
    ),
)); ?>

		
<div class='bread'>
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
</div>
<div class='contenedor span5'>
<?=$content?>
</div>

</div>
<footer class="footer">
      <div class="container">
        <p>Diseño y programación desarrollado por <a href="http://softer.com.ar" target="_blank">SOFTER</a></p>
        <p>Cualquier duda o consulta por favor contactar a <a href="mailto:alejandro@softer.com.ar">info@softer.com.ar</a> o bien al 0297-4307553</p>
       
      </div>
    </footer>
</body>
</html>
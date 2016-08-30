<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'archivos-form',
	'enableAjaxValidation'=>false,
	'errorMessageCssClass'=>'alert alert-error',
	'focus'=>array($model,'fechacarga')
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>
<div class="span4">
<div class="">
		<?php echo $form->labelEx($model,'fechacarga',array('class'=>'')); ?>
		<?php
$this->widget('CMaskedTextField', array(
'model' => $model,
'attribute' => 'fechacarga',
'mask' => '99/99/9999',
'htmlOptions' => array('class'=>'')
));
?>
		<?php echo $form->error($model,'fechacarga'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'rutaarchivo',array('class'=>'')); ?>
		<?php echo $form->textField($model,'rutaarchivo',array('class'=>'span2','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rutaarchivo'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'registro_id',array('class'=>'')); ?>
		<?php echo $form->textField($model,'registro_id',array('class'=>'span2','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'registro_id'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'resolucion',array('class'=>'')); ?>
		<?php echo $form->textField($model,'resolucion',array('class'=>'span2','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'resolucion'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'fojas',array('class'=>'')); ?>
		<?php echo $form->textField($model,'fojas',array('class'=>'span1','size'=>60,'maxlength'=>255)); ?>

		<?php echo $form->error($model,'fojas'); ?>
	</div>
<div class="">
		<?php echo $form->labelEx($model,'titulo',array('class'=>'')); ?>
		<?php echo $form->textField($model,'titulo',array('class'=>'span4','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>
	


	<div class="">
		<?php echo $form->labelEx($model,'categoria',array('class'=>'')); ?>
		<?
		$tags=Archivos::model()->getCategorias();
echo CHtml::textField('Archivos[categoria]',$model->categoria,array('name'=>'Archivos[categoria]','class'=>'span3','id'=>'Archivos_categoria'));
$this->widget('ext.select2.ESelect2',array(
  'selector'=>'#Archivos_categoria',
  'options'=>array(
    'tags'=>$tags,
  ),
));?>

		<?php echo $form->error($model,'categoria'); ?>
	</div>

	


	 <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span>Seleccione el/los archivo/s...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]">
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    
<script src="js/jqueryFileUpload/js/vendor/jquery.ui.widget.js"></script>
<link rel="stylesheet" href="js/jqueryFileUpload/css/jquery.fileupload-ui.css">
<script src="js/jqueryFileUpload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jqueryFileUpload/js/jquery.fileupload.js"></script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    var url = 'index.php?r=archivos/upload';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#files').html(file.name);
                $('#Archivos_pdf_file_name').val(file.name);
                $('#Archivos_pdf_content_type').val(file.type);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css(
                'width',
                progress + '%'
            );
        }
    });
});
</script>
	
	
</div>
<div class="span6">
<div class="">
		<?php echo $form->labelEx($model,'comentario',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>'10', 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'palabrasclaves',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'palabrasclaves',array('rows'=>'10', 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'palabrasclaves'); ?>
	</div>
	<? if($model->isNewRecord){?>
	<div class="">
	Cargar nuevamente 
	<?=CHtml::checkBox('cargarOtro',isset($_POST['cargarOtro']));?>
	</div>
	<?}?>
		<?php echo $form->textField($model,'created_at',array('TYPE'=>'hidden')); ?>
		<?php echo $form->textField($model,'updated_at',array('TYPE'=>'hidden')); ?>
		<?php echo $form->textField($model,'pdf_file_name',array('TYPE'=>'hidden')); ?>
		<?php echo $form->textField($model,'pdf_content_type',array('TYPE'=>'hidden')); ?>
		<?php echo $form->textField($model,'pdf_file_size',array('TYPE'=>'hidden')); ?>
		<?php echo $form->textField($model,'pdf_updated_at',array('TYPE'=>'hidden')); ?>
	
</div>
<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'ACEPTAR Y CARGAR' : 'Guardar',array('class'=>'btn btn-primary','style'=>'width:100%')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->

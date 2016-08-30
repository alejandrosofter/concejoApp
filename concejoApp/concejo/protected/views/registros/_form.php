<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registros-form',
	'enableAjaxValidation'=>false,
	'errorMessageCssClass'=>'alert alert-error',
	'focus'=>array($model,'fechacarga')
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>
<div class="span4">
		
	<div class="">
		<?php echo $form->labelEx($model,'fechaIngreso',array('class'=>'')); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute'=>'fechaIngreso',
    'model'=>$model,
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	'class'=>'span2'
    ),
)); ?>
		<?php echo $form->error($model,'fechaIngreso'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'numeronota',array('class'=>'')); ?>
		<?php echo $form->textField($model,'numeronota',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'numeronota'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'expediente',array('class'=>'')); ?>
		<?php echo $form->textField($model,'expediente',array('class'=>'span2','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'expediente'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'asunto',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'asunto',array('rows'=>5,'style'=>'width:100%','maxlength'=>2055)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'tipoRemitente',array('class'=>'')); ?>
		<?php echo $form->dropDownList($model,'tipoRemitente',Registros::model()->getTipoRemitentes(),array ('style'=>'width:200px')); ?>
		<?php echo $form->error($model,'tipoRemitente'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'fojas',array('class'=>'')); ?>
		<?php echo $form->textField($model,'fojas',array('class'=>'span1')); ?>
		<?php echo $form->error($model,'fojas'); ?>
	</div>
</div>

<div class="span4">
<div class="">
		<?php echo $form->labelEx($model,'remitente',array('class'=>'')); ?>
		<?php echo $form->textField($model,'remitente',array('class'=>'span4','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'remitente'); ?>
	</div>

	

	<div class="">
		<?php echo $form->labelEx($model,'dni',array('class'=>'')); ?>
		<?php echo $form->textField($model,'dni',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dni'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'telefono',array('class'=>'')); ?>
		<?php echo $form->textField($model,'telefono',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'barrio',array('class'=>'')); ?>
		<?php echo $form->textField($model,'barrio',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'barrio'); ?>
	</div>

	

	<div class="">
		<?php echo $form->labelEx($model,'comentario',array('class'=>'')); ?>
		<?php echo $form->textField($model,'comentario',array('class'=>'span4','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'temaAprobado',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'temaAprobado',array('rows'=>4, 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'temaAprobado'); ?>
	</div>
	

		<?php echo $form->textField($model,'updated_at',array('TYPE'=>'hidden')); ?>
	

		<?php echo $form->textField($model,'created_at',array('TYPE'=>'hidden')); ?>
</div>

	<div class="span3">
	<div class="">
		<?php echo $form->labelEx($model,'comision_id',array('class'=>'')); ?>
		<?php echo $form->dropDownList($model,'comision_id',CHtml::listData(Areas::model()->findAll(), 'id', 'nombreArea'),array ('style'=>'width:200px')); ?>
		<?php echo $form->error($model,'comision_id'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'tipoRegistro',array('class'=>'')); ?>
		<?php echo $form->dropDownList($model,'tipoRegistro',Registros::model()->getTipoRegistros(),array ('style'=>'width:200px')); ?>
		<?php echo $form->error($model,'tipoRegistro'); ?>
	</div>



	<div class="">
		<?php echo $form->labelEx($model,'resolucion',array('class'=>'')); ?>
		<?php echo $form->textField($model,'resolucion',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'resolucion'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'numeroOrdenaza',array('class'=>'')); ?>
		<?php echo $form->textField($model,'numeroOrdenaza',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'numeroOrdenaza'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'year',array('class'=>'')); ?>
		<?php
$this->widget('CMaskedTextField', array(
'model' => $model,
'attribute' => 'year',
'mask' => '9999',
'htmlOptions' => array('class'=>'span1')
));
?>
		<?php echo $form->error($model,'year'); ?>
	</div>
	

	<div class="">
		<?php echo $form->labelEx($model,'informacionAdicional',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'informacionAdicional',array('rows'=>4, 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'informacionAdicional'); ?>
	</div>
	<? if($model->isNewRecord){?>
		<div class="">
		Cargar Otro <?=CHtml::checkBox('cargaOtro',isset($_POST['cargaOtro']));?>
		Imprimir <?=CHtml::checkBox('imprime',isset($_POST['imprime']));?>
		</div>
	<?}?>
	
</div>
	
</div><!-- form -->
<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'ACEPTAR Y CARGAR' : 'Guardar',array('class'=>'btn btn-primary','style'=>'width:100%')); ?>
	</div>
<?php $this->endWidget(); ?>



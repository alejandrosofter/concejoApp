<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movimientos-form',
	'enableAjaxValidation'=>false,
)); ?>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="span5">
	<div class="span5" style='margin-left:0px;'>
		<?php echo $form->labelEx($model,'registro_id',array('class'=>'')); ?>
		<? $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
    'model'=>$model,
    'attribute'=>'registro_id',
    'source'=>'index.php?r=registros/getRegistros',
    'options'=>array(
        'minLength'=>'2',
    ),
    'htmlOptions'=>array(
       // 'style'=>'height:20px;',
       'placeholder'=>'Busque el registro...'
    ),
));?>
		<?php echo $form->error($model,'registro_id'); ?>
	</div>

		
	<div class="">
		<?php echo $form->labelEx($model,'area_id',array('class'=>'')); ?>
		<?php echo $form->dropDownList($model,'area_id',CHtml::listData(Areas::model()->findAll(), 'id', 'nombreArea'),array ('style'=>'width:200px')); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'tipoMovimiento',array('class'=>'')); ?>
		<?php echo $form->dropDownList($model,'tipoMovimiento',Movimientos::model()->getTipoMovimientos(),array ('style'=>'width:200px')); ?>
		<?php echo $form->error($model,'tipoMovimiento'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'estado',array('class'=>'')); ?>
		<?php echo $form->dropDownList($model,'estado',Registros::model()->getEstados(),array ('style'=>'width:200px')); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>
</div>
<div class="span6">
	
<div class="">

		<?php echo $form->labelEx($model,'fecha',array('class'=>'')); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'attribute'=>'fecha',
    'model'=>$model,
    'options'=>array(
        'showAnim'=>'fold',
        'dateFormat' => 'yy-mm-dd',
    ),
    'htmlOptions'=>array(
    	'class'=>'span2'
    ),
)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	<div class="">
		<?php echo $form->labelEx($model,'comentario',array('class'=>'')); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>10, 'style'=>'width:100%')); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

		<?php echo $form->textField($model,'created_at',array('TYPE'=>'hidden')); ?>

		<?php echo $form->textField($model,'updated_at',array('TYPE'=>'hidden')); ?>
</div>

</div><!-- form -->

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary','style'=>'width:100%')); ?>
	</div>

<?php $this->endWidget(); ?>

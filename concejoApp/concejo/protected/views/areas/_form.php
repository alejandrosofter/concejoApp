<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'areas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreArea',array('class'=>'')); ?>
		<?php echo $form->textField($model,'nombreArea',array('class'=>'span3','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombreArea'); ?>
	</div>

		<?php echo $form->textField($model,'created_at',array('TYPE'=>'hidden')); ?>
	<?php echo $form->textField($model,'updated_at',array('TYPE'=>'hidden')); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

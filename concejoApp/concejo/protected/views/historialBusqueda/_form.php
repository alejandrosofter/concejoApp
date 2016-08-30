<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'historial-busqueda-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ip',array('class'=>'')); ?>
		<?php echo $form->textField($model,'ip',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cadenaBusqueda',array('class'=>'')); ?>
		<?php echo $form->textField($model,'cadenaBusqueda',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cadenaBusqueda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaBusqueda',array('class'=>'')); ?>
		<?php echo $form->textField($model,'fechaBusqueda',array('class'=>'')); ?>
		<?php echo $form->error($model,'fechaBusqueda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iphttp',array('class'=>'')); ?>
		<?php echo $form->textField($model,'iphttp',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'iphttp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proxy',array('class'=>'')); ?>
		<?php echo $form->textField($model,'proxy',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'proxy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipaccess',array('class'=>'')); ?>
		<?php echo $form->textField($model,'ipaccess',array('class'=>'','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ipaccess'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aceptar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php

class RegistrosController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	public function init()
	{
		$this->layout="//layouts/column1";
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionGetRegistros()
	{
		$buscar=$_GET['term'];
		$criteria=new CDbCriteria;
		$criteria->compare('informacionAdicional',$buscar,true,'OR');
		$criteria->compare('expediente',$buscar,true,'OR');
		$criteria->compare('asunto',$buscar,true,'OR');
		$criteria->compare('remitente',$buscar,true,'OR');
		
		$criteria->compare('comentario',$buscar,true,'OR');
		$criteria->compare('numeroOrdenaza',$buscar,true,'OR');
		$criteria->compare('year',$buscar,true,'OR');
		
		$criteria->compare('numeronota',$buscar,true,'OR');
		$criteria->compare('resolucion',$buscar,true,'OR');
		
		$criteria->compare('numerointerno',$buscar,true,'OR');
		$criteria->compare('id',$buscar,true,'OR');
		
		$criteria->order='t.id desc';
		$arr = array();
		$models=Registros::model()->findAll($criteria);
		foreach($models as $model) {
    	$arr[] = array(
        'label'=>$model->id.' '.$model->remitente,  // label for dropdown list          
        'value'=>$model->id,
        'id'=>$model->id,            // return value from autocomplete
        );      
}
echo CJSON::encode($arr);
	}
	public function actionCreate()
	{
		$model=new Registros;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registros']))
		{
			$model->attributes=$_POST['Registros'];
			if($model->save()){
				Movimientos::model()->cargar($model);
				if(isset($_POST['cargaOtro']))
					$this->redirect(array('create','id'=>$model->id,'imprime'=>isset($_POST['imprime'])));
					else $this->redirect(array('index','id'=>$model->id,'imprime'=>isset($_POST['imprime'])));
			}
				
		}
		if(!isset($_POST['cargaOtro']))$_POST['cargaOtro']=true;
		$model->fechaIngreso=Date('Y-m-d');
		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionImprimir($id)
	{
		$this->layout="//layouts/layoutSolo";
		$model=Registros::model()->findByPk($id);
		$params['titulo']='REGISTRO CONCEJO DELIBERANTE';
		$params['direccion']=Settings::model()->getValorSistema('DATOS_EMPRESA_DIRECCION');
		$params['telefono']=Settings::model()->getValorSistema('DATOS_EMPRESA_TELEFONO');
		$params['emailAdmin']=Settings::model()->getValorSistema('DATOS_EMPRESA_EMAILADMIN');
		$params['fecha']=Date('d-m-Y');
		$paramsRegistro['numeroInterno']=$model->id;
		$paramsRegistro['asunto']=$model->asunto;
		$paramsRegistro['fechaIngreso']=Yii::app()->dateFormatter->format("dd/MM/yy",$model->fechaIngreso);
		$paramsRegistro['dni']=$model->dni;
		$paramsRegistro['remitente']=$model->remitente;
		$paramsRegistro['telefono']=$model->telefono;
		$paramsRegistro['comentario']=$model->comentario;
		$paramsRegistro['barrio']=$model->barrio;
		$paramsRegistro['fojas']=$model->fojas;
		$paramsRegistro['deribado']=Registros::model()->getUltimoMovimiento($model->id);
		$paramsRegistro['informacionAdicional']=$model->informacionAdicional;
		$params['cuerpo']=Settings::model()->getValorSistema('IMPRESION_REGISTRO',$paramsRegistro);
		$contenido=Settings::model()->getValorSistema('PLANTILLA_BASE',$params);

		$this->render('_imprimir',array('model'=>$model,'contenido'=>$contenido));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registros']))
		{
			$model->attributes=$_POST['Registros'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
		}
		$model->updated_at=Date('Y-m-d H:i:s');

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Registros('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registros']))
			$model->attributes=$_GET['Registros'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registros('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registros']))
			$model->attributes=$_GET['Registros'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Registros::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='registros-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

/**
 * This is the model class for table "registros".
 *
 * The followings are the available columns in table 'registros':
 * @property integer $id
 * @property string $informacionAdicional
 * @property string $expediente
 * @property string $asunto
 * @property string $remitente
 * @property string $tipoRemitente
 * @property string $dni
 * @property string $telefono
 * @property string $fechaIngreso
 * @property integer $fojas
 * @property string $comentario
 * @property string $numeroOrdenaza
 * @property string $year
 * @property string $comision_id
 * @property string $estado
 * @property string $created_at
 * @property string $updated_at
 * @property string $tipoRegistro
 * @property string $numeronota
 * @property string $resolucion
 * @property string $barrio
 * @property string $numerointerno
 * @property string $numdeseos
 * @property string $numcomunicacion
 * @property string $numdeclaracion
 */
class Registros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registros the static model class
	 */
	 public $buscar;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getNombre()
	{
		$fecha=explode('-',$this->fechaIngreso);
		return $this->id.'/'.substr($fecha[0],2,2);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registros';
	}
	public function getNombreRegistro()
	{
		return $this->id.' - '.$this->remitente;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' asunto,remitente, tipoRegistro,tipoRemitente,comision_id', 'required'),
			array('fojas', 'numerical', 'integerOnly'=>true),
			array('expediente,  remitente, tipoRemitente, dni, telefono,  numeroOrdenaza, year, comision_id, estado, tipoRegistro, numeronota, resolucion, barrio, numerointerno, numdeseos, numcomunicacion, numdeclaracion', 'length', 'max'=>255),
			array('fechaIngreso,temaAprobado, created_at, updated_at', 'safe'),
			array('numerointerno', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('buscar,id,temaAprobado, informacionAdicional, expediente, asunto, remitente, tipoRemitente, dni, telefono, fechaIngreso, fojas, comentario, numeroOrdenaza, year, comision_id, estado, created_at, updated_at, tipoRegistro, numeronota, resolucion, barrio, numerointerno, numdeseos, numcomunicacion, numdeclaracion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comision' => array(self::BELONGS_TO, 'Areas', 'comision_id'),
			'movimientos' => array(self::HAS_MANY, 'Movimientos', 'registro_id','order'=>'id desc'),
		);
	}
	public function getTipoRemitentes()
	{
		return array('Personal'=>'Personal','Institucion'=>'Institucion','otro1'=>'orto1','otro2'=>'orto2','PEM'=>'PEM');
	}
	public function getEstados()
	{
		return array('Tramitando'=>'Tramitando','Aceptado'=>'Aceptado');
	}
	public function getTipoRegistros()
	{
		return array('Expediente'=>'Expediente','Nota Particular'=>'Nota Particular','Nota Oficial'=>'Nota Oficial','Proyecto Ord'=>'Proyecto Ord','Del PEM'=>'Del PEM','Proyecto Resolución'=>'Proyecto Resolución','Proyecto Exp. Deseo'=>'Proyecto Exp. Deseo','Declaración'=>'Declaración','Comunicación'=>'Comunicación');
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Interno',
			'informacionAdicional' => 'Adicional',
			'expediente' => 'Expediente',
			'asunto' => 'Asunto',
			'remitente' => 'Remitente',
			'tipoRemitente' => 'Tipo Remitente',
			'dni' => 'Dni',
			'telefono' => 'Teléfono',
			'fechaIngreso' => 'Fecha Ingreso',
			'fojas' => 'Fojas',
			'comentario' => 'Comentario',
			'numeroOrdenaza' => 'Ordenanza',
			'year' => 'Año',
			'comision_id' => 'Comisión',
			'estado' => 'Estado',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'tipoRegistro' => 'Tipo de Registro',
			'numeronota' => 'Nª Nota',
			'resolucion' => 'Resolución',
			'barrio' => 'Barrio',
			'numerointerno' => 'Nª de Interno',
			'numdeseos' => 'N Deseos',
			'numcomunicacion' => 'N Comunicación',
			'numdeclaracion' => 'Nª Declaración',
			'temaAprobado'=>'Tema/s Aprobado/s'
		);
	}

	public function getUltimoMovimiento($id)
	{
		$model=Registros::model()->findByPk($id);
		$mov=null;
		if(count($model->movimientos)>0)
			$mov=$model->movimientos[0];
		
			
		$sale='-';
		if($mov!=null){
			$color=$mov->tipoMovimiento!='Entrada'?'#ff5959':'#288511';
			$nombre=isset($mov->area)?$mov->area->nombreArea:'-';
			$sale='<span style="color:'.$color.'"><small>'.$nombre.'</small></spam>';
			
		}
		return $sale;
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('informacionAdicional',$this->buscar,true,'OR');
		$criteria->compare('expediente',$this->buscar,true,'OR');
		$criteria->compare('asunto',$this->buscar,true,'OR');
		$criteria->compare('remitente',$this->buscar,true,'OR');
		
		$criteria->compare('comentario',$this->buscar,true,'OR');
		$criteria->compare('numeroOrdenaza',$this->buscar,true,'OR');
		$criteria->compare('year',$this->buscar,true,'OR');
		
		$criteria->compare('numeronota',$this->buscar,true,'OR');
		$criteria->compare('resolucion',$this->buscar,true,'OR');
		
		$criteria->compare('numerointerno',$this->buscar,true,'OR');
		$criteria->compare('id',$this->buscar,true,'OR');
		
		$criteria->order='t.id desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "historialBusqueda".
 *
 * The followings are the available columns in table 'historialBusqueda':
 * @property integer $idHistorialBusqueda
 * @property string $ip
 * @property string $cadenaBusqueda
 * @property string $fechaBusqueda
 * @property string $iphttp
 * @property string $proxy
 * @property string $ipaccess
 */
class HistorialBusqueda extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistorialBusqueda the static model class
	 */
	 public $buscar;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historialBusqueda';
	}
	public function cargar($cadena)
	{
		$model=new HistorialBusqueda;
		$model->fechaBusqueda=Date('Y-m-d H:i:s');
		$model->cadenaBusqueda=$cadena;
		$model->ipaccess=$_SERVER['REMOTE_ADDR'];
		$model->save();
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ipaccess', 'required'),
			array('ip, cadenaBusqueda, iphttp, proxy, ipaccess', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('buscar,idHistorialBusqueda, ip, cadenaBusqueda, fechaBusqueda, iphttp, proxy, ipaccess', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHistorialBusqueda' => 'Id Historial Busqueda',
			'ip' => 'Ip',
			'cadenaBusqueda' => 'Cadena Busqueda',
			'fechaBusqueda' => 'Fecha Busqueda',
			'iphttp' => 'Iphttp',
			'proxy' => 'Proxy',
			'ipaccess' => 'Ipaccess',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idHistorialBusqueda',$this->buscar,'OR');
		$criteria->compare('ip',$this->buscar,true,'OR');
		$criteria->compare('cadenaBusqueda',$this->buscar,true,'OR');
		$criteria->compare('fechaBusqueda',$this->buscar,true,'OR');
		$criteria->compare('iphttp',$this->buscar,true,'OR');
		$criteria->compare('proxy',$this->buscar,true,'OR');
		$criteria->compare('ipaccess',$this->buscar,true,'OR');
		$criteria->order='t.idHistorialBusqueda desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
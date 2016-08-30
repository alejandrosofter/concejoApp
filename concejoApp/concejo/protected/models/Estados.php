<?php

/**
 * This is the model class for table "estados".
 *
 * The followings are the available columns in table 'estados':
 * @property integer $id
 * @property string $nombreEstado
 *
 * The followings are the available model relations:
 * @property Alertas[] $alertases
 * @property Asociados[] $asociadoses
 * @property Proyectos[] $proyectoses
 * @property Usuarios[] $usuarioses
 */
class Estados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Estados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreEstado', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombreEstado', 'safe', 'on'=>'search'),
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
			'alertases' => array(self::HAS_MANY, 'Alertas', 'idEstado'),
			'asociadoses' => array(self::HAS_MANY, 'Asociados', 'idEstado'),
			'proyectoses' => array(self::HAS_MANY, 'Proyectos', 'idEstado'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'idEstado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombreEstado' => 'Nombre Estado',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombreEstado',$this->nombreEstado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
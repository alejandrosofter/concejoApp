<?php

/**
 * This is the model class for table "archivos".
 *
 * The followings are the available columns in table 'archivos':
 * @property integer $id
 * @property string $registro_id
 * @property string $resolucion
 * @property string $fechacarga
 * @property string $comentario
 * @property string $palabrasclaves
 * @property string $categoria
 * @property string $titulo
 * @property string $fojas
 * @property string $rutaarchivo
 * @property string $created_at
 * @property string $updated_at
 * @property string $pdf_file_name
 * @property string $pdf_content_type
 * @property integer $pdf_file_size
 * @property string $pdf_updated_at
 */
class Archivos extends CActiveRecord
{
	public $cantidad;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Archivos the static model class
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
		return 'archivos';
	}

	public function getCategorias()
	{
		$items=$this->buscaCategorias();
		$arr=array();
		foreach($items as $it)
			$arr[]=$it->categoria;
		
		return $arr;
		
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' palabrasclaves,registro_id,fechacarga,titulo, categoria', 'required'),
			array('pdf_file_size', 'numerical', 'integerOnly'=>true),
			array('registro_id, resolucion, categoria, titulo, fojas, rutaarchivo, pdf_file_name, pdf_content_type', 'length', 'max'=>255),
			array('fechacarga, comentario, created_at, updated_at, pdf_updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('buscar,id, registro_id, resolucion, fechacarga, comentario, palabrasclaves, categoria, titulo, fojas, rutaarchivo, created_at, updated_at, pdf_file_name, pdf_content_type, pdf_file_size, pdf_updated_at', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'registro_id' => 'Nro de Ordenanza',
			'resolucion' => 'Nro de Resolución',
			'fechacarga' => 'Fecha de Carga',
			'comentario' => 'Comentario',
			'palabrasclaves' => 'Palabras Claves',
			'categoria' => 'Categoria',
			'titulo' => 'Título',
			'fojas' => 'Fojas',
			'rutaarchivo' => 'Nª  Expediente',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'pdf_file_name' => 'Pdf File Name',
			'pdf_content_type' => 'Pdf Content Type',
			'pdf_file_size' => 'Pdf File Size',
			'pdf_updated_at' => 'Pdf Updated At',
		);
	}

	public function buscaCategorias()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->group='categoria';
		return self::model()->findAll($criteria);
	}
	public function getCategoriasBusqueda()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('resolucion',$this->buscar,true,'OR');
		
		$criteria->compare('comentario',$this->buscar,true,'OR');
		$criteria->compare('palabrasclaves',$this->buscar,true,'OR');
		$criteria->compare('categoria',$this->buscar,true,'OR');
		$criteria->compare('titulo',$this->buscar,true,'OR');
		
		$criteria->compare('rutaarchivo',$this->buscar,true,'OR');
		$criteria->select='t.*,count(t.id) as cantidad';
		$criteria->order='categoria';
		$criteria->group='categoria';
		return self::model()->findAll($criteria);
	}
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('resolucion',$this->buscar,true,'OR');
		
		$criteria->compare('comentario',$this->buscar,true,'OR');
		$criteria->compare('palabrasclaves',$this->buscar,true,'OR');
		
		$criteria->compare('titulo',$this->buscar,true,'OR');
		if(isset($_GET['categoria']))$criteria->compare('categoria',$_GET['categoria'],false,'AND');
		else $criteria->compare('categoria',$this->buscar,true,'OR');
		$criteria->compare('rutaarchivo',$this->buscar,true,'OR');
		
		$criteria->order='t.id desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
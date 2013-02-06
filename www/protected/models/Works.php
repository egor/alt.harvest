<?php

/**
 * This is the model class for table "works".
 *
 * The followings are the available columns in table 'works':
 * @property integer $works_id
 * @property integer $visibility
 * @property string $menu_name
 * @property string $text
 * @property string $img
 * @property string $img_big
 * @property string $address
 * @property integer $position
 * @property string $img_alt
 * @property string $img_title
 * @property string $img_big_alt
 * @property string $img_big_title
 */
class Works extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Works the static model class
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
		return 'works';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('visibility, menu_name, text, img, img_big, address, position, img_alt, img_title, img_big_alt, img_big_title', 'required'),
                        array('visibility, menu_name, text, img, img_big, address, position, img_alt, img_title, img_big_alt, img_big_title, date', 'safe'),
			array('visibility, position, date', 'numerical', 'integerOnly'=>true),
			array('menu_name, img, img_big, address, img_alt, img_title, img_big_alt, img_big_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('works_id, visibility, menu_name, text, img, img_big, address, position, img_alt, img_title, img_big_alt, img_big_title, date', 'safe', 'on'=>'search'),
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
			'works_id' => 'Works',
			'visibility' => 'Выводить',
			'menu_name' => 'Заголовок',
			'text' => 'Описание',
			'img' => 'Картинка',
			'img_big' => 'Большая картинка',
			'address' => 'Адрес',
			'position' => 'Position',
			'img_alt' => 'Alt для картинки',
			'img_title' => 'Title для картинки',
			'img_big_alt' => 'Alt для большой картинки',
			'img_big_title' => 'Title для большой картинки',
                        'date' => 'Дата'
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

		$criteria->compare('works_id',$this->works_id);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('img_big',$this->img_big,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('img_alt',$this->img_alt,true);
		$criteria->compare('img_title',$this->img_title,true);
		$criteria->compare('img_big_alt',$this->img_big_alt,true);
		$criteria->compare('img_big_title',$this->img_big_title,true);
                $criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
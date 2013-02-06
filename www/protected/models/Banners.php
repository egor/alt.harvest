<?php

/**
 * This is the model class for table "banners".
 *
 * The followings are the available columns in table 'banners':
 * @property integer $banners_id
 * @property string $img
 * @property string $img_alt
 * @property string $img_title
 * @property integer $position
 * @property string $name
 * @property integer $visibility
 * @property string $link
 * @property integer $new_window
 */
class Banners extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banners the static model class
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
		return 'banners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('img, img_alt, img_title, position, name, visibility, link, new_window', 'required'),
                        array('img, img_alt, img_title, position, name, visibility, link, new_window', 'safe'),
			array('position, visibility, new_window', 'numerical', 'integerOnly'=>true),
			array('img, img_alt, img_title, name, link', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('banners_id, img, img_alt, img_title, position, name, visibility, link, new_window', 'safe', 'on'=>'search'),
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
			'banners_id' => 'Banners',
			'img' => 'Картинка',
			'img_alt' => 'Img Alt',
			'img_title' => 'Img Title',
			'position' => 'Position',
			'name' => 'Название',
			'visibility' => 'Выводить',
			'link' => 'Ссылка',
			'new_window' => 'Открывать в новом окне',
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

		$criteria->compare('banners_id',$this->banners_id);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('img_alt',$this->img_alt,true);
		$criteria->compare('img_title',$this->img_title,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('new_window',$this->new_window);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
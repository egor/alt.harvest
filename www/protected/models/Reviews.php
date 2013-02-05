<?php

/**
 * This is the model class for table "reviews".
 *
 * The followings are the available columns in table 'reviews':
 * @property integer $reviews_id
 * @property string $menu_name
 * @property string $link_to_video
 * @property string $text
 * @property string $user_address
 * @property integer $visibility
 * @property integer $position
 */
class Reviews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Reviews the static model class
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
		return 'reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_name, link_to_video, text, user_address, visibility, position, user_name, short_text, img, img_alt, img_title, date', 'safe'),
			array('visibility, position, date', 'numerical', 'integerOnly'=>true),
			array('menu_name, link_to_video, user_address, user_name, img, img_alt, img_title,', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reviews_id, menu_name, link_to_video, text, user_address, visibility, position, user_name, short_text, img, img_alt, img_title, date', 'safe', 'on'=>'search'),
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
			'reviews_id' => 'Reviews',
			'menu_name' => 'Заголовок',
			'link_to_video' => 'Ссылка на видео',
			'text' => 'Текст отзыва',
			'user_address' => 'Адрес',
			'visibility' => 'Выводить',
			'position' => 'Позиция',
                        'user_name'=>'ФИО',
                        'date'=>'Дата',
                        'short_text'=>'Краткое описание',
                        'img'=>'Картинка',
                        'img_alt'=>'alt (альтернативный текст)',
                        'img_title'=>'title (заголовок)'
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

		$criteria->compare('reviews_id',$this->reviews_id);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('link_to_video',$this->link_to_video,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('user_address',$this->user_address,true);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('position',$this->position);
                $criteria->compare('user_name',$this->user_name);
                $criteria->compare('short_text',$this->short_text);
                $criteria->compare('img',$this->img);
                $criteria->compare('img_alt',$this->img_alt);
                $criteria->compare('img_title',$this->img_title);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
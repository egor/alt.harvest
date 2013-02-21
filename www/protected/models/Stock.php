<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $stock_id
 * @property integer $visibility
 * @property string $menu_name
 * @property integer $end_date
 * @property integer $end_time
 * @property string $short_text
 * @property string $img
 * @property integer $position
 * @property integer $date
 * @property integer $in_main
 */
class Stock extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stock the static model class
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
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('visibility, menu_name, end_date, end_time, short_text, img, position, date, in_main', 'required'),
                        array('visibility, menu_name, end_date, end_time, short_text, img, position, date, in_main, remark', 'safe'),
			array('visibility, end_date, end_time, position, date, in_main', 'numerical', 'integerOnly'=>true),
			array('menu_name, img, remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('stock_id, visibility, menu_name, end_date, end_time, short_text, img, position, date, in_main, remark', 'safe', 'on'=>'search'),
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
			'stock_id' => 'Stock',
			'visibility' => 'Выводить',
			'menu_name' => 'Заголовок',
			'end_date' => 'Дата окончания',
			'end_time' => 'Время окончания',
			'short_text' => 'Описание',
			'img' => 'Картинка - фон',
			'position' => 'Position',
			'date' => 'Дата',
			'in_main' => 'Выводить в слайдере на главной',
                        'remark' => 'Пометка к форме (будет приходить на почту)',
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

		$criteria->compare('stock_id',$this->stock_id);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('end_date',$this->end_date);
		$criteria->compare('end_time',$this->end_time);
		$criteria->compare('short_text',$this->short_text,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('date',$this->date);
		$criteria->compare('in_main',$this->in_main);
                $criteria->compare('remark',$this->remark);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
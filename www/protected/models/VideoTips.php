<?php

/**
 * This is the model class for table "video_tips".
 *
 * The followings are the available columns in table 'video_tips':
 * @property integer $video_tips_id
 * @property integer $visibility
 * @property string $menu_name
 * @property string $short_text
 * @property string $link_to_video
 * @property string $line
 * @property integer $date
 */
class VideoTips extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VideoTips the static model class
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
		return 'video_tips';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('visibility, menu_name, short_text, link_to_video, line, date', 'required'),
                        array('visibility, menu_name, short_text, link_to_video, line, date', 'safe'),
			array('visibility, date', 'numerical', 'integerOnly'=>true),
			array('menu_name, line', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('video_tips_id, visibility, menu_name, short_text, link_to_video, line, date', 'safe', 'on'=>'search'),
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
			'video_tips_id' => 'Video Tips',
			'visibility' => 'Выводить',
			'menu_name' => 'Заголовок',
			'short_text' => 'Описание',
			'link_to_video' => 'Код видео',
			'line' => 'Строка внизу',
			'date' => 'Дата',
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

		$criteria->compare('video_tips_id',$this->video_tips_id);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('menu_name',$this->menu_name,true);
		$criteria->compare('short_text',$this->short_text,true);
		$criteria->compare('link_to_video',$this->link_to_video,true);
		$criteria->compare('line',$this->line,true);
		$criteria->compare('date',$this->date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
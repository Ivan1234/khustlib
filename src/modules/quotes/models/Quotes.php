<?php

namespace app\modules\quotes\models;

use Yii;

/**
 * This is the model class for table "quotes".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $modified
 * @property string $created
 */
class Quotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','content'], 'required'],
            [['content'], 'string'],
            [['modified', 'created'], 'safe'],
            //[['visible', 'created', 'modified'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Автор',
            'content' => 'Контент',
            'visible' => 'Видиме',
            'modified' => 'Змінено',
            'created' => 'Створено',
        ];
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if (!$this->created) {
                $this->created = time();
            }

            $this->modified=time();

            if($this->visible==null) 
                $this->visible = 1;

            return true;
        }
        return false;
    }
}

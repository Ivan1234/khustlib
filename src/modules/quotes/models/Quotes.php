<?php

namespace app\modules\quotes\models;

use Yii;

/**
 * This is the model class for table "quotes".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $modified
 * @property integer $created
 * @property integer $visible
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
            [['visible', 'created', 'modified'], 'integer'],
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

    public function behaviors()
    {
        return [
            ///'sitemap' => [
                //'class' => SitemapBehavior::className(),
                /*'scope' => function ($model) {
                    $model->select(['alias', 'modified']);
                    $model->andWhere(['visible' => 1]);
                    $model->andWhere(['<=', 'published', date('Y-m-d H:i')]);
                }*/
            //]
        ];
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if (!$this->created) {
                $this->created = time();
            } /*else {
                $this->created = strtotime($this->created);
                //echo date('Y-m-d H:i', strtotime($time));
            }*/

            $this->modified=time();
            //print_r($this);
            //print_r($this->content);

            if($this->visible==null) 
                $this->visible = 1;

            return true;
        }
        return false;
    }
}

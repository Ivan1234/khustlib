<?php

namespace app\modules\news\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $label
 * @property string $alias
 * @property string $content
 * @property string $announce
 * @property string $image_id
 * @property string $category
 * @property string $template
 * @property integer $visible
 * @property string $published
 * @property integer $author
 * @property integer $position
 * @property integer $created
 * @property integer $modified
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'author', 'created', 'modified'], 'required'],
            [['content', 'announce'], 'string'],
            [['visible', 'author', 'position', 'created', 'modified'], 'integer'],
            [['label', 'alias', 'image_id', 'category', 'template', 'published'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'alias' => 'Alias',
            'content' => 'Content',
            'announce' => 'Announce',
            'image_id' => 'Image ID',
            'category' => 'Category',
            'template' => 'Template',
            'visible' => 'Visible',
            'published' => 'Published',
            'author' => 'Author',
            'position' => 'Position',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }
}

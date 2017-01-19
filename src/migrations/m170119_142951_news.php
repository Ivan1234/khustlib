<?php

use yii\db\Migration;

class m170119_142951_news extends Migration
{
    public $tableName = '{{app_news}}';

    public function up()
    {
        $this->createTable(
            $this->tableName,
            array(
                'id' => 'INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
                'label' => 'VARCHAR(255) NOT NULL',
                'alias' => 'VARCHAR(255) NULL DEFAULT "" UNIQUE',
                'content' => 'TEXT',
                'announce' => 'TEXT',
                'image_id'=>'VARCHAR(255) NULL',
                'category' => 'VARCHAR(255) NULL',
                'template' => 'VARCHAR(255) NULL',

                'visible' => 'TINYINT(1) UNSIGNED NOT NULL DEFAULT 1',
                'published' => 'VARCHAR(255) NULL',
                'author' => 'INT UNSIGNED NOT NULL',

                'position' => 'INT UNSIGNED NOT NULL DEFAULT 0',
                'created' => 'INT UNSIGNED NOT NULL',
                'modified' => 'INT UNSIGNED NOT NULL',
            ),
            'ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci'
        );
    }

    public function down()
    {
        echo "m170119_142951_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

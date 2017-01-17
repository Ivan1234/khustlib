<?php

use yii\db\Schema;
use yii\db\Migration;

class m161221_075417_quotes extends Migration
{
    public function up()
    {
        $this->createTable('quotes', array(
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
            'modified' => Schema::TYPE_INT . ' NOT NULL',
            'created' => Schema::TYPE_INT . ' NOT NULL',
            ),
            'ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci'
        );
    }

    public function down()
    {
        echo "m161221_075417_quotes cannot be reverted.\n";

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

<?php

use yii\db\Migration;

class m161229_080710_add_field_to_quotes extends Migration
{
    public $tableName = '{{quotes}}';

    public function up()
    {
        $this->addColumn($this->tableName,'visible', 'TINYINT(1) UNSIGNED NOT NULL DEFAULT 1');
    }

    public function down()
    {
        echo "m161229_080710_add_field_to_quotes cannot be reverted.\n";

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

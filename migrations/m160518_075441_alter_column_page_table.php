<?php

use yii\db\Migration;

class m160518_075441_alter_column_page_table extends Migration
{
    protected $tableName = '{{%page}}';

    public function up()
    {
        $this->alterColumn($this->tableName, 'description', $this->string());
    }

    public function down()
    {
        $this->alterColumn($this->tableName, 'description', $this->string()->notNull());
    }
}

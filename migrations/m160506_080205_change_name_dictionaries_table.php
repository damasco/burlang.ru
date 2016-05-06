<?php

use yii\db\Migration;

class m160506_080205_change_name_dictionaries_table extends Migration
{
    protected $tableName = '{{%dictionaries}}';
    protected $newTableName = '{{%dictionary}}';

    public function up()
    {
        $this->renameTable($this->tableName, $this->newTableName);
    }

    public function down()
    {
        $this->renameTable($this->newTableName, $this->tableName);
    }
}

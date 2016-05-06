<?php

use yii\db\Migration;

class m160506_084256_rename_burwords_table extends Migration
{
    protected $tableName = '{{%burwords}}';
    protected $newTableName = '{{%buryat_word}}';

    public function up()
    {
        $this->renameTable($this->tableName, $this->newTableName);
    }

    public function down()
    {
        $this->renameTable($this->newTableName, $this->tableName);
    }
}

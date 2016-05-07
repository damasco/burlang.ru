<?php

use yii\db\Migration;

class m160507_124345_rename_ruwords_table extends Migration
{
    protected $tableName = '{{%ruwords}}';
    protected $newTableName = '{{%russian_word}}';

    public function up()
    {
        $this->renameTable($this->tableName, $this->newTableName);
    }

    public function down()
    {
        $this->renameTable($this->newTableName, $this->tableName);
    }
}

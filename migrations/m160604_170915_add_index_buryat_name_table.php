<?php

use yii\db\Migration;

class m160604_170915_add_index_buryat_name_table extends Migration
{
    protected $tableName = '{{%buryat_name}}';
    protected $indexName = 'idx-buryat_name-name';

    public function up()
    {
        $this->createIndex($this->indexName, $this->tableName, 'name');
    }

    public function down()
    {
        $this->dropIndex($this->indexName, $this->tableName);
    }
}

<?php

use yii\db\Migration;

class m160604_165736_add_index_buryat_word_table extends Migration
{
    protected $tableName = '{{%buryat_word}}';
    protected $indexName = 'idx-buryat_word-name';

    public function up()
    {
        $this->createIndex($this->indexName, $this->tableName, 'name');
    }

    public function down()
    {
        $this->dropIndex($this->indexName, $this->tableName);
    }
}

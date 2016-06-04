<?php

use yii\db\Migration;

class m160604_170754_add_index_russian_word_table extends Migration
{
    protected $tableName = '{{%russian_word}}';
    protected $indexName = 'idx-russian_word-name';

    public function up()
    {
        $this->createIndex($this->indexName, $this->tableName, 'name');
    }

    public function down()
    {
        $this->dropIndex($this->indexName, $this->tableName);
    }
}

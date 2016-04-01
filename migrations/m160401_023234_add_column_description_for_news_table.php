<?php

use yii\db\Migration;

class m160401_023234_add_column_description_for_news_table extends Migration
{
    protected $tableName = '{{%news}}';

    public function up()
    {
        $this->addColumn($this->tableName, 'description', $this->text() . ' AFTER title');
    }

    public function down()
    {
        $this->dropColumn($this->tableName, 'description');
    }
}

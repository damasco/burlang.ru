<?php

use yii\db\Migration;

class m160427_052921_alter_column_name_rutranslations_table extends Migration
{

    protected $tableName = '{{%rutranslations}}';

    public function safeUp()
    {
        $this->alterColumn($this->tableName, 'name', $this->string(2000)->notNull());
        $this->alterColumn($this->tableName, 'burword_id', $this->integer(10)->unsigned()->notNull());
    }

    public function safeDown()
    {
        $this->alterColumn($this->tableName, 'name', $this->string(2000));
        $this->alterColumn($this->tableName, 'burword_id', $this->integer(10)->unsigned());
    }
}

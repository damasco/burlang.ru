<?php

use yii\db\Migration;

class m160426_070758_drop_columns_burword_table extends Migration
{
    protected $tableName = '{{%burwords}}';

    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'chr_id');
        $this->dropColumn($this->tableName, 'frequency');
        $this->dropColumn($this->tableName, 'bb_id');
    }

    public function safeDown()
    {
        $this->addColumn($this->tableName, 'chr_id', $this->integer());
        $this->addColumn($this->tableName, 'frequency', $this->integer());
        $this->addColumn($this->tableName, 'bb_id', $this->integer());
    }
}

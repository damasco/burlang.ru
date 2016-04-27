<?php

use yii\db\Migration;

class m160427_054739_alter_column_name_burtranslations_table extends Migration
{
    protected $tableName = '{{%burtranslations}}';

    public function up()
    {
        $this->alterColumn($this->tableName, 'name', $this->string(100)->notNull());
    }

    public function down()
    {
        $this->alterColumn($this->tableName, 'name', $this->string(100));
    }

}

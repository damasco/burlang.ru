<?php

use yii\db\Migration;

class m160508_062836_rename_tables_rutranslations_burtranslations extends Migration
{
    protected $tableName1 = '{{%rutranslations}}';
    protected $newTableName1 = '{{buryat_translation}}';
    protected $tableName2 = '{{burtranslations}}';
    protected $newTableName2 = '{{russian_translation}}';

    public function safeUp()
    {
        $this->renameTable($this->tableName1, $this->newTableName1);
        $this->renameTable($this->tableName2, $this->newTableName2);
    }

    public function safeDown()
    {
        $this->renameTable($this->newTableName1, $this->tableName1);
        $this->renameTable($this->newTableName2, $this->tableName2);
    }
}

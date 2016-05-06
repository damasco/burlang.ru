<?php

use yii\db\Migration;

class m160506_082623_rename_tables_burwords_temp_partsofspeech extends Migration
{
    protected $tablaName1 = '{{%burwords_temp}}';
    protected $newTablaName1 = '{{%buryat_word_temp}}';
    protected $tablaName2 = '{{%partsofspeech}}';
    protected $newTablaName2 = '{{%part_speech}}';

    public function safeUp()
    {
        $this->renameTable($this->tablaName1, $this->newTablaName1);
        $this->renameTable($this->tablaName2, $this->newTablaName2);
    }

    public function safeDown()
    {
        $this->renameTable($this->newTablaName1, $this->tablaName1);
        $this->renameTable($this->newTablaName2, $this->tablaName2);
    }
}

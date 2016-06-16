<?php

use yii\db\Migration;

class m160616_082824_add_column_content_book_table extends Migration
{
    protected $tableName = '{{%book}}';

    public function up()
    {
        $this->addColumn($this->tableName, 'content', $this->text()->after('description'));
    }

    public function down()
    {
        $this->dropColumn($this->tableName, 'content');
    }
}

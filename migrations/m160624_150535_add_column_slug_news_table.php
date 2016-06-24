<?php

use yii\db\Migration;

class m160624_150535_add_column_slug_news_table extends Migration
{
    protected $tableName = '{{%news}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn($this->tableName, 'slug', $this->string()->notNull()->unique()->after('title'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn($this->tableName, 'slug');
    }
}

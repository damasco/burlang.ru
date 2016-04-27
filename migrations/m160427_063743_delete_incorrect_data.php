<?php

use yii\db\Migration;
use app\models\Ruwords;
use app\models\Rutranslations;
use app\models\Burwords;

class m160427_063743_delete_incorrect_data extends Migration
{
    public function safeUp()
    {
        Rutranslations::deleteAll(['or', ['id' => 2609], ['id' => 2140]]);
        Ruwords::deleteAll(['id' => 10904]);
        Burwords::deleteAll(['or', ['id' => 2140], ['id' => 10]]);
    }

    public function safeDown()
    {

    }
}

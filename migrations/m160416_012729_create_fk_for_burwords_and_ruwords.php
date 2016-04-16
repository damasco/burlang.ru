<?php

use yii\db\Migration;
use app\models\Rutranslations;
use app\models\Burwords;

class m160416_012729_create_fk_for_burwords_and_ruwords extends Migration
{
    public function safeUp()
    {
        // delete incorrect data
        Rutranslations::deleteAll(['and', ['>=', 'id', 7161], ['<=', 'id', 7238]]);
        Rutranslations::deleteAll(['or', ['id' => 1161], ['id' => 1368]]);
        Burwords::deleteAll(['or', ['id' => 1161], ['id' => 1368]]);

        $this->addForeignKey('fk-burtranslations-ruword_id-ruwords-id', '{{%burtranslations}}', 'ruword_id', '{{%ruwords}}', 'id', 'CASCADE', 'RESTRICT');
        $this->dropIndex('burword_id', '{{%rutranslations}}');
        $this->addForeignKey('fk-rutranslations-burword_id-burwords-id', '{{%rutranslations}}', 'burword_id', '{{%burwords}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function safeDown()
    {
        $this->createIndex('burword_id', '{{%rutranslations}}', 'burword_id');
        $this->dropForeignKey('fk-burtranslations-ruword_id-ruwords-id', '{{%burtranslations}}');
        $this->dropForeignKey('fk-rutranslations-burword_id-burwords-id', '{{%rutranslations}}');
    }
}

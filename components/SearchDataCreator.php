<?php

namespace app\components;

class SearchDataCreator
{
    protected $word;
    protected $type;

    /**
     * SearchDataCreator constructor.
     * @param string $word
     * @param integer $type
     */
    public function __construct($word, $type)
    {
        $this->word = $word;
        $this->type = $type;
    }

    /**
     * Insert search data
     */
    public function execute()
    {
        \Yii::$app->db->createCommand()->insert('{{%search_data}}', [
            'name' => $this->word,
            'type' => $this->type,
            'created_at' => time(),
            'updated_at' => time()
        ])->execute();
    }

}
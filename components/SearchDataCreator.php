<?php

namespace app\components;

use app\models\SearchData;

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
        $model = new SearchData(['name' => $this->word, 'type' => $this->type]);
        if ($model->validate()) {
            $model->save(false);
        }
    }

}
<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Book;

class ChaptersMenu extends Widget
{
    /** @var Book */
    public $book;

    /** @var integer|null */
    public $active_id = null;

    /**
     * @inheritdoc
     */
    public function run()
    {
        return $this->render('chapters-menu', [
            'model' => $this->book,
            'active_id' => $this->active_id,
        ]);
    }
}
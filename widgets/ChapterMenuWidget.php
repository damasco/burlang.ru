<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Book;

class ChapterMenuWidget extends Widget
{
    /* @var Book */
    public $book;

    public $active_id = null;

    public function run()
    {
        return $this->render('chapter-menu', [
            'model' => $this->book,
            'active_id' => $this->active_id,
        ]);
    }
}
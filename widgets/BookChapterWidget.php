<?php

namespace app\widgets;

use yii\base\Widget;
use app\models\Book;

class BookChapterWidget extends Widget
{
    /* @var Book */
    public $book;

    public $active_id = null;

    public function run()
    {
        return $this->render('book-chapter', [
            'model' => $this->book,
            'active_id' => $this->active_id,
        ]);
    }
}
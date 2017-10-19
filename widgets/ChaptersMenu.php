<?php

namespace app\widgets;

use app\models\Book;
use yii\base\InvalidParamException;
use yii\base\Widget;

class ChaptersMenu extends Widget
{
    /** @var Book */
    public $book;

    /** @var integer|null */
    public $active_id = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!$this->book instanceof Book) {
            throw new InvalidParamException(\Yii::t('app', 'Incorrect parameter "{param}"', ['param' => 'book']));
        }
    }

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

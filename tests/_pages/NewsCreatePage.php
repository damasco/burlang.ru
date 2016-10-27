<?php

namespace tests\_pages;

use app\models\News;
use Yii;
use yii\helpers\Inflector;

class NewsCreatePage
{
    public $route = 'news/create';

    public function create($title, $description, $content, $active = true)
    {
        $newsForm = Yii::createObject(News::className());
        $formName = $newsForm->formName();
        $selector = Inflector::camel2id($formName);
        
        $this->actor->fillField('input[name="' . $formName . '[title]"]', $title);
        $this->actor->fillField('textarea[name="' . $formName . '[description]"]', $description);
        $this->actor->fillField('textarea[name="' . $formName . '[content]"]', $content);
        if ($active) {
            $this->actor->checkOption('#' . $selector . '-active');
        }

        $this->actor->click('Add', '.btn');
    }
}
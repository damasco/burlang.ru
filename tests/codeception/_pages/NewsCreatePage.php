<?php

namespace test\codeception\_pages;

use yii\codeception\BasePage;
use app\models\News;
use Yii;
use yii\helpers\Inflector;

class NewsCreatePage extends BasePage
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
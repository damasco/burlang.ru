<?php

namespace app\widgets;

use app\models\Page;
use yii\base\Widget;

class TranslationServiceWidget extends Widget
{
    public function run()
    {
        $model = Page::findOne(['link' => 'translation-service']);

        /* @var Page $model */
        if ($model !== null && $model->active) {
            return $this->render('translation-service', [
                'model' => $model
            ]);
        }
    }
}
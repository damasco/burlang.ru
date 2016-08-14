<?php

namespace app\widgets;

use app\models\Page;
use yii\base\Widget;

class TranslationServiceWidget extends Widget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var Page $model */
        $model = Page::findOne(['link' => 'translation-service']);

        if ($model && $model->active) {
            return $this->render('translation-service', [
                'model' => $model
            ]);
        }
    }
}
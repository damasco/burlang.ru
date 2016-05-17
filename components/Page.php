<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Page as PageModel;

class Page extends Component
{
    public function getItemMenu($link)
    {
        $model = PageModel::findOne(['link' => $link]);

        /* @var $model \app\models\Page */
        if ($model) {
            return [
                'label' => $model->title,
                'url' => ['/page/' . $link ],
                'active' => Yii::$app->request->url == '/page/' . $link
            ];
        } else {
            return '';
        }
    }
}
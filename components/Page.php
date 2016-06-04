<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Page as PageModel;
use yii\helpers\Url;

class Page extends Component
{
    public function getItemMenu($link)
    {
        $model = PageModel::findOne(['link' => $link]);

        /* @var $model \app\models\Page */
        if ($model !== null && $model->active) {
            $url = ['/page/view', 'link' => $link ];

            return [
                'label' => $model->title,
                'url' => $url,
                'active' => Yii::$app->request->url == Url::to($url)
            ];
        } else {
            return '';
        }
    }
}
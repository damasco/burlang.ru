<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Page as PageModel;
use yii\helpers\Url;

class Page extends Component
{

    /**
     * @param string $link
     * @return array|string
     */
    public function getItemMenu($link)
    {
        $model = PageModel::findOne(['link' => $link]);

        /* @var $model PageModel */
        if ($model !== null && $model->active) {
            return [
                'label' => $model->title,
                'url' => ['/page/view', 'link' => $link ],
                'active' => Yii::$app->request->url == Url::to(['/page/view', 'link' => $link ])
            ];
        } else {
            return '';
        }
    }
}
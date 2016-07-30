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
    public function itemMenu($link)
    {
        $model = PageModel::findOne(['link' => $link]);

        /** @var $model PageModel */
        if ($model && $model->active) {
            $url = ['/page/view', 'link' => $link];
            return [
                'label' => $model->menu_name,
                'url' => $url,
                'active' => Yii::$app->request->url == Url::to($url),
            ];
        } else {
            return '';
        }
    }
}
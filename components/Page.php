<?php

namespace app\components;

use app\models\Page as PageModel;
use Yii;
use yii\base\BaseObject;
use yii\helpers\Url;

class Page extends BaseObject
{
    /**
     * @param string $link
     * @return array|string
     */
    public function menuItem($link)
    {
        /** @var $model PageModel */
        $model = PageModel::findOne(['link' => $link]);

        if ($model && $model->active) {
            $url = ['/page/view', 'link' => $link];

            return [
                'label' => $model->menu_name,
                'url' => $url,
                'active' => Yii::$app->request->url === Url::to($url),
            ];
        }
        return '';
    }
}

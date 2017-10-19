<?php

namespace app\widgets;

use app\services\BuryatNameManager;
use Yii;
use yii\base\Widget;

class AlphabetNames extends Widget
{
    /**
     * @var null|string
     */
    public $letter = null;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $deviceDetect = Yii::$app->get('devicedetect');

        if (!$this->letter || !$deviceDetect->isMobile() || $deviceDetect->isTablet()) {
            $alphabet = (new BuryatNameManager())->getFirstLetters();

            return $this->render('alphabet-names', [
                'alphabet' => $alphabet,
                'letter' => $this->letter
            ]);
        }
    }
}

<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class InputCharts extends InputWidget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->options['class'] = 'form-control';

        if ($this->hasModel()) {
            $textInput = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $textInput = Html::textInput($this->name, $this->value, $this->options);
        }

        return $this->render('input-charts', [
            'textInput' => $textInput,
        ]);
    }
}

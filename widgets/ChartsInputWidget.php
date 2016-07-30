<?php

namespace app\widgets;

use yii\widgets\InputWidget;
use yii\helpers\Html;

class ChartsInputWidget extends InputWidget
{
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
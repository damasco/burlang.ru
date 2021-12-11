<?php

namespace app\widgets;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class InputWithBuryatCharts extends InputWidget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->options['class'] = 'form-control';

        $textInput = $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $this->options)
            : Html::textInput($this->name, $this->value, $this->options);

        return $this->render('input-charts', [
            'textInput' => $textInput,
        ]);
    }
}

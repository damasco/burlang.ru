<?php

namespace app\widgets;

use yii\helpers\Inflector;
use yii\widgets\InputWidget;
use yii\helpers\Html;

class TextareaChartsWidget extends InputWidget
{
    /** @var string */
    protected $selector;

    public function init()
    {
        parent::init();

        $this->selector = Inflector::camel2id($this->model->formName()) . '-' . $this->attribute;
    }

    public function run()
    {
        $this->registerScripts();

        $this->options['class'] = 'form-control';
        $this->options['id'] = $this->selector;

        if ($this->hasModel()) {
            $textarea = Html::activeTextArea($this->model, $this->attribute, $this->options);
        } else {
            $textarea = Html::textArea($this->name, $this->value, $this->options);
        }

        return $this->render('textarea-charts', [
            'textarea' => $textarea,
            'selector' => $this->selector,
        ]);
    }

    public function registerScripts()
    {
        $script = "$('body').on('click', '.add-letter-$this->selector', function() {
                    $('#$this->selector').sendkeys($(this).text());
                });";

        $this->view->registerJs($script);
    }
}
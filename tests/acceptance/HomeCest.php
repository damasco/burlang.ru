<?php

namespace tests\acceptance;

use AcceptanceTester;
use Yii;

class HomeCest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that home page works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Buryat-Russian dictionary');
        $I->see('Russian-Buryat dictionary');
    }

    public function translateRussianWord(AcceptanceTester $I)
    {
        $I->wantTo('encure that translate russian word works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Russian-Buryat dictionary');
        $I->submitForm('#russian-form', [
            'russian_word' => 'Привет',
        ]);

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }

        $I->see('мэндэ');
    }

    public function translateBuryatWord(AcceptanceTester $I)
    {
        $I->wantTo('encure that translate buryat word works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Buryat-Russian dictionary');
        $I->submitForm('#buryat-form', [
            'buryat_word' => 'Сайн',
        ]);

        if (method_exists($I, 'wait')) {
            $I->wait(2); // only for selenuim
        }

        $I->see('здравствуйте');
    }
}

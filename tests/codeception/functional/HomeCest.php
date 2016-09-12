<?php

namespace tests\codeception\functional;

use FunctionalTester;
use Yii;

class HomeCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that home page works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Buryat-Russian dictionary');
        $I->see('Russian-Buryat dictionary');
    }

    public function translateRussianWord(FunctionalTester $I)
    {
        $I->wantTo('encure that translate russian word works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Russian-Buryat dictionary');
        $I->submitForm('#russian-form', [
            'russian_word' => 'Привет',
        ]);
        $I->see('мэндэ');
    }

    public function translateBuryatWord(FunctionalTester $I)
    {
        $I->wantTo('encure that translate buryat word works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->see('Buryat-Russian dictionary');
        $I->submitForm('#buryat-form', [
            'buryat_word' => 'Сайн',
        ]);
        $I->see('здравствуйте');
    }
}
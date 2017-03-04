<?php

namespace tests\acceptance;

use AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that home page works');
        $I->amOnPage(Url::to(['/']));
        if (method_exists($I, 'wait')) {
            $I->wait(1);
        }
        $I->see('Buryat-Russian dictionary');
        $I->see('Russian-Buryat dictionary');
    }

    public function autocompleteRussianWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that autocomplete russian word works');
        $I->amOnPage(Url::to(['/']));
        $I->fillField('input[name="russian_word"]', 'Пр');
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->seeElement('#ui-id-1');
    }

    public function autocompleteBuryatWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that autocomplete buryat word works');
        $I->amOnPage(Url::to(['/']));
        $I->fillField('input[name="buryat_word"]', 'Са');
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->seeElement('#ui-id-2');
    }

    public function translateRussianWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that translate russian word works');
        $I->amOnPage(Url::to(['/']));
        $I->submitForm('#russian-form', [
            'russian_word' => 'Привет',
        ]);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see('(амар) мэндэ', 'li');
    }

    public function translateBuryatWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that translate buryat word works');
        $I->amOnPage(Url::to(['/']));
        $I->submitForm('#buryat-form', [
            'buryat_word' => 'Сайн',
        ]);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see('здравствуй! здравствуйте!', 'li');
    }

    public function translateNotIssetRussianWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that translate not isset russian word not works');
        $I->amOnPage(Url::to(['/']));
        $I->submitForm('#russian-form', [
            'russian_word' => 'wrong',
        ]);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see('No translation', 'div');
    }

    public function translateNotIssetBuryatWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that translate not isset buryat word not works');
        $I->amOnPage(Url::to(['/']));
        $I->submitForm('#buryat-form', [
            'buryat_word' => 'wrong',
        ]);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see('No translation', 'div');
    }

    public function translateMoreOneRussianWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that translate more one russian word not works');
        $I->amOnPage(Url::to(['/']));
        $I->submitForm('#russian-form', [
            'russian_word' => 'two words',
        ]);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see('You can translate only one word', 'div');
    }

    public function translateMoreOneBuryatWord(AcceptanceTester $I)
    {
        $I->wantTo('ensure that translate more one buryat word not works');
        $I->amOnPage(Url::to(['/']));
        $I->submitForm('#buryat-form', [
            'buryat_word' => 'two words',
        ]);
        if (method_exists($I, 'wait')) {
            $I->wait(2);
        }
        $I->see('You can translate only one word', 'div');
    }

}
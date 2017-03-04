<?php

namespace tests\api;

use ApiTester;

class RussianWordCest
{
    public function search(ApiTester $I)
    {
        $I->wantTo('ensure that russian word search works');
        $I->sendGET('/v1/russian-word/search', ['q' => 'Привет']);
        $I->seeResponseContainsJson([
            ['value' => 'привет'],
        ]);
    }

    public function translate(ApiTester $I)
    {
        $I->wantTo('ensure that russain word translate word works');
        $I->sendGET('/v1/russian-word/translate', ['q' => 'Привет']);
        $I->seeResponseContainsJson([
            ['name' => '(амар) мэндэ'],
        ]);
    }
}
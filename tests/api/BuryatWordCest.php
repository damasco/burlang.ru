<?php

namespace tests\api;

use ApiTester;

class BuryatWordCest
{
    public function search(ApiTester $I)
    {
        $I->wantTo('ensure that buryat word search works');
        $I->sendGET('/v1/buryat-word/search', ['q' => 'Сайн']);
        $I->seeResponseContainsJson([
            ['value' => 'сайн'],
        ]);
    }

    public function translate(ApiTester $I)
    {
        $I->wantTo('ensure that buryat word translate word works');
        $I->sendGET('/v1/buryat-word/translate', ['q' => 'Сайн']);
        $I->seeResponseContainsJson([
            ['name' => 'здравствуй! здравствуйте!'],
        ]);
    }
}
<?php

namespace test\api;

use ApiTester;

class BuryatNameCest
{
    public function search(ApiTester $I)
    {
        $I->wantTo('ensure that buryat name search works');
        $I->sendGET('/v1/buryat-name/search', ['q' => 'Баа']);
        $I->seeResponseContainsJson([
            ['value' => 'Баатар'],
        ]);
    }

    public function getName(ApiTester $I)
    {
        $I->wantTo('ensure that buryat name get name works');
        $I->sendGET('/v1/buryat-name/get-name', ['q' => 'Баатар']);
        $I->seeResponseContainsJson([
            'name' => 'Баатар',
            'description' => 'богатырь',
        ]);

    }
}
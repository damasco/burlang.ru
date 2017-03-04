<?php

namespace tests\functional;

class DocsV1PageCest
{
    public function index(\FunctionalTester $I)
    {
        $I->wantTo('ensure docs v1 page is works');
        $I->amOnPage(['/v1/default/index']);
        $I->seeInTitle('Api v1');
    }
}
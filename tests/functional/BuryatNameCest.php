<?php

namespace tests\functional;

use FunctionalTester;

class BuryatNameCest
{
    public function listPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that buryat-name list page works');
        $I->amOnPage(['/buryat-name/index']);
        $I->seeLink('Names');
        $I->click('Names');
        $I->see('Names', 'h1');
    }
	
	public function viewNameList(FunctionalTester $I)
	{
		$I->wantTo('ensure that buryat name view list page works');
		$I->amOnPage(['/buryat-name/index', 'letter' => 'А']);
		$I->see('Абармид');	
	}

	public function viewName(FunctionalTester $I)
	{
		$I->wantTo('ensure that buryat name view page works');
		$I->amOnPage(['/buryat-name/view-name', 'name' => 'Абармид']);
		$I->see('Абармид', 'title');	
	}
}

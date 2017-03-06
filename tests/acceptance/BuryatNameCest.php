<?php 

namespace app\tests\acceptance;

use AcceptanceTester;
use yii\helpers\Url;

/**
* BuryatNameCest test 
*/
class BuryatNameCest
{
	public function viewNameModal(AcceptanceTester $I)
	{
		$I->wantTo('ensure that view name in modal works');		
		$I->amOnPage(Url::to(['/buryat-name/index', 'letter' => 'А']));
		$I->see('Абармид');	
		$I->click('Абармид');
		if (method_exists($I, 'wait')) {
			$I->wait(2);
		}
		$I->seeElement('#view-name-modal');
		$I->see('Абармид', '.modal-title');
	}
}
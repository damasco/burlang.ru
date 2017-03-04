<?php
namespace tests\acceptance;

use AcceptanceTester;
use Yii;
use yii\helpers\Url;
use app\tests\fixtures\UserWithRbacFixture;

class BookCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->haveFixtures([
            'user' => UserWithRbacFixture::class,
        ]);
    }

    public function indexPage(AcceptanceTester $I)
    {
        $I->wantTo('ensure that books page works');
        $I->amOnPage(Url::to(['/book/index']));
        if (method_exists($I, 'wait')) {
            $I->wait(1);
        }
        $I->see('Books', 'h1');
    }

    public function createPageAsAdmin(AcceptanceTester $I)
    {
        $I->wantTo('ensure that book create page works for admin');
        $I->amLoggedInAsAdmin();
        $I->amOnPage(Url::to(['/book/create']));
        $I->seeInTitle('Create book');
    }

    public function createPageAsModerator(AcceptanceTester $I)
    {
        $I->wantTo('ensure that book create page works for moderator');
        $I->amLoggedInAsModerator();
        $I->amOnPage(Url::to(['/book/create']));
        $I->seeInTitle('Create book');
    }

    public function createPageAsUser(AcceptanceTester $I)
    {
        $I->wantTo('ensure that book create page not works for simple user');
        $I->amLoggedInAsUser();
        $I->amOnPage(Url::to(['/book/create']));
        $I->seeInTitle('Forbidden');
    }
}
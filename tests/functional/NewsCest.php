<?php

namespace tests\functional;

use app\models\News;
use FunctionalTester;
use Yii;
use yii\helpers\Url;
use tests\_pages\NewsCreatePage;

class NewsCest
{
    public function indexPage(FunctionalTester $I)
    {
        $I->wantTo('ensure that news page works');
        $I->amOnPage(Yii::$app->homeUrl);
        $I->seeLink('News');
        $I->click('News');
        $I->see('News', 'h1');
    }
    
    public function createPageAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page works for admin');
        $I->loginAsAdmin();
        $I->amOnPage(['/news/create']);
        $I->seeInTitle('Create news');
    }
    
    public function createPageAsModerator(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page not works for moderator');

        $I->amOnPage(['/news/create']);
        $I->seeInTitle('Forbidden');
    }
    
    public function createPageAsUser(FunctionalTester $I)
    {
        $I->wantTo('ensure that news create page not works for simple user');

        $I->amOnPage(['/news/create']);
        $I->seeInTitle('Forbidden');
    }

//    public function createNews(FunctionalTester $I)
//    {
//        $I->wantTo('ensure that create news work');
//
//        News::deleteAll(['title' => 'Demo']);
//        $newsCreatePage = NewsCreatePage::openBy($I);
//        $newsCreatePage->create('Demo', 'Description', 'Content', true);
//        $I->see('Demo', 'h1');
//    }
//
//    public function updateNews(FunctionalTester $I)
//    {
//        $I->wantTo('ensure that update news work');
//
//        $I->amOnPage(Url::to(['/news/view', 'slug' => 'demo']));
//        $I->see('Demo', 'h1');
//        $I->click('Edit', '.btn');
//        $I->see('Edit:', 'h1');
//        $I->fillField("form input[type='text']", 'Update demo');
//        $I->click('Save', '.btn');
//        $I->see('Update demo', 'h1');
//    }
//
//    public function deleteNews(FunctionalTester $I)
//    {
//        $I->wantTo('ensure that delete news work');
//
//        $I->amOnPage(Url::to(['/news/view', 'slug' => 'update-demo']));
//        $I->see('Update demo', 'h1');
//        $I->see('Delete', '.btn');
//        /** @var News $news */
//        $news = News::findOne(['title' => 'Update demo']);
//        $I->sendAjaxPostRequest(Url::to(['/news/delete', 'id' => $news->id]));
//
//        // @todo bug with redirect https://github.com/yiisoft/yii2-codeception/issues/18
//        // $I->see('News', 'h1');
//
//        $I->amOnPage(Url::to(['/news/view', 'slug' => 'update-demo']));
//        $I->seeInTitle('Not Found');
//    }
}
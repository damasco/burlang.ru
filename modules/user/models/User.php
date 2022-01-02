<?php

namespace app\modules\user\models;

use app\models\Book;
use app\models\BookChapter;
use app\models\BuryatName;
use app\models\BuryatTranslation;
use app\models\BuryatWord;
use app\models\Dictionary;
use app\models\News;
use app\models\Page;
use app\models\RussianTranslation;
use app\models\RussianWord;
use dektrium\user\models\User as BaseUser;
use yii\db\ActiveQuery;

/**
 * @property BuryatName[] $buryatNames
 * @property BuryatName[] $buryatNamesUpdated
 * @property BuryatWord[] $buryatWords
 * @property BuryatWord[] $buryatWordsUpdated
 * @property RussianWord[] $russianWords
 * @property RussianWord[] $russianWordsUpdated
 * @property BuryatTranslation[] $buryatTranslations
 * @property BuryatTranslation[] $buryatTranslationsUpdated
 * @property RussianTranslation[] $russianTranslations
 * @property RussianTranslation[] $russianTranslationsUpdated
 * @property Dictionary[] $dictionaries
 * @property Dictionary[] $dictionariesUpdated
 * @property News[] $news
 * @property News[] $newsUpdated
 * @property Page[] $pages
 * @property Page[] $pagesUpdated
 * @property Book[] $books
 * @property Book[] $booksUpdated
 * @property BookChapter[] $bookChapters
 * @property BookChapter[] $bookChaptersUpdated
 */
class User extends BaseUser
{
    public function getBuryatNames(): ActiveQuery
    {
        return $this->hasMany(BuryatName::class, ['created_by' => 'id']);
    }

    public function getBuryatNamesUpdated(): ActiveQuery
    {
        return $this->hasMany(BuryatName::class, ['created_by' => 'id']);
    }

    public function getBuryatWords(): ActiveQuery
    {
        return $this->hasMany(BuryatWord::class, ['created_by' => 'id']);
    }

    public function getBuryatWordsUpdated(): ActiveQuery
    {
        return $this->hasMany(BuryatWord::class, ['created_by' => 'id']);
    }

    public function getRussianWords(): ActiveQuery
    {
        return $this->hasMany(RussianWord::class, ['created_by' => 'id']);
    }

    public function getRussianWordsUpdated(): ActiveQuery
    {
        return $this->hasMany(RussianWord::class, ['created_by' => 'id']);
    }

    public function getBuryatTranslations(): ActiveQuery
    {
        return $this->hasMany(BuryatTranslation::class, ['created_by' => 'id']);
    }

    public function getBuryatTranslationsUpdated(): ActiveQuery
    {
        return $this->hasMany(BuryatTranslation::class, ['created_by' => 'id']);
    }

    public function getRussianTranslations(): ActiveQuery
    {
        return $this->hasMany(RussianTranslation::class, ['created_by' => 'id']);
    }

    public function getRussianTranslationsUpdated(): ActiveQuery
    {
        return $this->hasMany(RussianTranslation::class, ['created_by' => 'id']);
    }

    public function getDictionaries(): ActiveQuery
    {
        return $this->hasMany(Dictionary::class, ['created_by' => 'id']);
    }

    public function getDictionariesUpdated(): ActiveQuery
    {
        return $this->hasMany(Dictionary::class, ['created_by' => 'id']);
    }

    public function getNews(): ActiveQuery
    {
        return $this->hasMany(News::class, ['created_by' => 'id']);
    }

    public function getNewsUpdated(): ActiveQuery
    {
        return $this->hasMany(News::class, ['created_by' => 'id']);
    }

    public function getPages(): ActiveQuery
    {
        return $this->hasMany(Page::class, ['created_by' => 'id']);
    }

    public function getPagesUpdated(): ActiveQuery
    {
        return $this->hasMany(Page::class, ['created_by' => 'id']);
    }

    public function getBooks(): ActiveQuery
    {
        return $this->hasMany(Book::class, ['created_by' => 'id']);
    }

    public function getBooksUpdated(): ActiveQuery
    {
        return $this->hasMany(Book::class, ['created_by' => 'id']);
    }

    public function getBookChapters(): ActiveQuery
    {
        return $this->hasMany(BookChapter::class, ['created_by' => 'id']);
    }

    public function getBookChaptersUpdated(): ActiveQuery
    {
        return $this->hasMany(BookChapter::class, ['created_by' => 'id']);
    }
}

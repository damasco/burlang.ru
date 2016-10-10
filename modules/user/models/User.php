<?php

namespace app\modules\user\models;

use app\models\Book;
use app\models\BookChapter;
use app\models\BuryatTranslation;
use app\models\Dictionary;
use app\models\News;
use app\models\Page;
use app\models\RussianTranslation;
use dektrium\user\models\User as BaseUser;
use app\models\BuryatName;
use app\models\BuryatWord;
use app\models\RussianWord;

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
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuryatNames()
    {
        return $this->hasMany(BuryatName::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuryatNamesUpdated()
    {
        return $this->hasMany(BuryatName::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuryatWords()
    {
        return $this->hasMany(BuryatWord::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuryatWordsUpdated()
    {
        return $this->hasMany(BuryatWord::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRussianWords()
    {
        return $this->hasMany(RussianWord::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRussianWordsUpdated()
    {
        return $this->hasMany(RussianWord::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuryatTranslations()
    {
        return $this->hasMany(BuryatTranslation::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuryatTranslationsUpdated()
    {
        return $this->hasMany(BuryatTranslation::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRussianTranslations()
    {
        return $this->hasMany(RussianTranslation::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRussianTranslationsUpdated()
    {
        return $this->hasMany(RussianTranslation::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictionaries()
    {
        return $this->hasMany(Dictionary::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictionariesUpdated()
    {
        return $this->hasMany(Dictionary::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsUpdated()
    {
        return $this->hasMany(News::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagesUpdated()
    {
        return $this->hasMany(Page::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksUpdated()
    {
        return $this->hasMany(Book::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookChapters()
    {
        return $this->hasMany(BookChapter::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookChaptersUpdated()
    {
        return $this->hasMany(BookChapter::className(), ['created_by' => 'id']);
    }
}
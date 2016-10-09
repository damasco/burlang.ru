<?php

namespace app\modules\user\models;

use app\models\BuryatTranslation;
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
}
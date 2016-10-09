<?php

namespace app\modules\user\models;

use dektrium\user\models\User as BaseUser;
use app\models\BuryatName;
use app\models\BuryatWord;

/**
 * @property BuryatName[] $buryatNames
 * @property BuryatWord[] $buryatWords
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
    public function getBuryatWords()
    {
        return $this->hasMany(BuryatWord::className(), ['created_by' => 'id']);
    }
}
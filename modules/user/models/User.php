<?php

namespace app\modules\user\models;

use dektrium\user\models\User as BaseUser;
use app\models\BuryatName;

/**
 * @property BuryatName[] $buryatNames
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

}
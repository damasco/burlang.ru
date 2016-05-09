<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buryat_word".
 *
 * @property integer $id
 * @property string $name
 *
 * @property BuryatTranslation[] $translation
 */
class BuryatWord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buryat_word';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasMany(BuryatTranslation::className(), ['burword_id' => 'id']);
    }

}

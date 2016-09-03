<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buryat_word".
 *
 * @property integer $id
 * @property string $name
 *
 * @property BuryatTranslation[] $translations
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
            [['name'], 'unique'],
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
    public function getTranslations()
    {
        return $this->hasMany(BuryatTranslation::className(), ['burword_id' => 'id']);
    }
}

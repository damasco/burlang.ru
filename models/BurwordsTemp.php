<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "burwords_temp".
 *
 * @property integer $id
 * @property string $name
 * @property string $remainder
 */
class BurwordsTemp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'burwords_temp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'remainder'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['remainder'], 'string', 'max' => 4096],
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
            'remainder' => Yii::t('app', 'Remainder'),
        ];
    }
}

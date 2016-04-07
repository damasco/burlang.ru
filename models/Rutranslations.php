<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rutranslations".
 *
 * @property integer $id
 * @property integer $burword_id
 * @property integer $dict_id
 * @property string $name
 * @property string $description
 */
class Rutranslations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rutranslations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['burword_id', 'dict_id'], 'integer'],
            [['name'], 'string', 'max' => 2000],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'burword_id' => Yii::t('app', 'Burword ID'),
            'dict_id' => Yii::t('app', 'Dict ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBurword()
    {
        return $this->hasOne(Burwords::className(), ['id' => 'burword_id']);
    }
}

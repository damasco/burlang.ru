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
            [['name', 'burword_id'], 'required'],
            [['burword_id', 'dict_id'], 'integer'],
            [['name'], 'string', 'max' => 2000],
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
            'dict_id' => Yii::t('app', 'Dictionary'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBurword()
    {
        return $this->hasOne(Burwords::className(), ['id' => 'burword_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictionary()
    {
        return $this->hasOne(Dictionaries::className(), ['id' => 'dict_id']);
    }
}

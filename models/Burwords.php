<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "burwords".
 *
 * @property integer $id
 * @property integer $chr_id
 * @property string $name
 * @property integer $frequency
 * @property integer $bb_id
 */
class Burwords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'burwords';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chr_id', 'frequency', 'bb_id'], 'integer'],
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
            'chr_id' => Yii::t('app', 'Chr ID'),
            'name' => Yii::t('app', 'Name'),
            'frequency' => Yii::t('app', 'Frequency'),
            'bb_id' => Yii::t('app', 'Bb ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslation()
    {
        return $this->hasMany(Rutranslations::className(), ['burword_id' => 'id']);
    }
}

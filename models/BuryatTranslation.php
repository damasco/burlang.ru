<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buryat_translation".
 *
 * @property integer $id
 * @property integer $burword_id
 * @property integer $dict_id
 * @property string $name
 *
 * @property BuryatWord $buraytWord
 * @property Dictionary $dictionary
 */
class BuryatTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buryat_translation';
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
            [['burword_id'], 'exist', 'skipOnError' => true, 'targetClass' => BuryatWord::className(), 'targetAttribute' => ['burword_id' => 'id']],
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
    public function getBuryatWord()
    {
        return $this->hasOne(BuryatWord::className(), ['id' => 'burword_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictionary()
    {
        return $this->hasOne(Dictionary::className(), ['id' => 'dict_id']);
    }
}

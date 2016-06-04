<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "russian_translation".
 *
 * @property integer $id
 * @property integer $ruword_id
 * @property string $name
 *
 * @property RussianWord $russianWord
 */
class RussianTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'russian_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ruword_id', 'name'], 'required'],
            [['ruword_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['ruword_id'], 'exist', 'skipOnError' => true, 'targetClass' => RussianWord::className(), 'targetAttribute' => ['ruword_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ruword_id' => Yii::t('app', 'Ruword ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRussianWord()
    {
        return $this->hasOne(RussianWord::className(), ['id' => 'ruword_id']);
    }
}

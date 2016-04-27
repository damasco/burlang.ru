<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "burtranslations".
 *
 * @property integer $id
 * @property integer $ruword_id
 * @property string $name
 */
class Burtranslations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'burtranslations';
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
    public function getRuword()
    {
        return $this->hasOne(Ruwords::className(), ['id' => 'ruword_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partsofspeech".
 *
 * @property integer $id
 * @property string $name
 * @property string $full_name
 * @property string $color
 */
class Partsofspeech extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partsofspeech';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 30],
            [['full_name'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 20],
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
            'full_name' => Yii::t('app', 'Full Name'),
            'color' => Yii::t('app', 'Color'),
        ];
    }
}

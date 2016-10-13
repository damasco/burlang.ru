<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "search_data".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $created_at
 * @property integer $updated_at
 */
class SearchData extends \yii\db\ActiveRecord
{
    const BURYAT_WORD_TYPE = 0;
    const RUSSIAN_WORD_TYPE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}

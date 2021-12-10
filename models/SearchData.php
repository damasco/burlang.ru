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
    const TYPE_BURYAT = 0;
    const TYPE_RUSSIAN = 1;

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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
}

<?php

namespace app\models;

use app\modules\user\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dictionary".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property string $isbn
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property BuryatTranslation[] $buryatTranslation
 * @property User $createdBy
 * @property User $updatedBy
 */
class Dictionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'dictionary';
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            [['name', 'info'], 'required'],
            [['name'], 'string', 'max' => 80],
            [['info'], 'string', 'max' => 255],
            [['isbn'], 'string', 'max' => 30],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [
                ['created_by'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['created_by' => 'id']
            ],
            [
                ['updated_by'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['updated_by' => 'id']
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'info' => Yii::t('app', 'Information'),
            'isbn' => Yii::t('app', 'Isbn'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    public function getBuryatTranslation(): ActiveQuery
    {
        return $this->hasMany(BuryatTranslation::class, ['dict_id' => 'id']);
    }

    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    public function getUpdatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}

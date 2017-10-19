<?php

namespace app\models;

use app\modules\user\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "russian_translation".
 *
 * @property integer $id
 * @property integer $ruword_id
 * @property string $name
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property RussianWord $russianWord
 * @property User $createdBy
 * @property User $updatedBy
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
            [['ruword_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['ruword_id'], 'exist', 'skipOnError' => true, 'targetClass' => RussianWord::class, 'targetAttribute' => ['ruword_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
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
            'name' => Yii::t('app', 'Translation'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
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
            BlameableBehavior::class,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRussianWord()
    {
        return $this->hasOne(RussianWord::class, ['id' => 'ruword_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }
}

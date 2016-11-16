<?php

namespace app\models;

use Yii;
use app\modules\user\models\User;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "buryat_translation".
 *
 * @property integer $id
 * @property integer $burword_id
 * @property integer $dict_id
 * @property string $name
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property BuryatWord $buraytWord
 * @property Dictionary $dictionary
 * @property User $createdBy
 * @property User $updatedBy
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
            [['burword_id', 'dict_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 2000],
            [['burword_id'], 'exist', 'skipOnError' => true, 'targetClass' => BuryatWord::class, 'targetAttribute' => ['burword_id' => 'id']],
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
            'burword_id' => Yii::t('app', 'Burword ID'),
            'dict_id' => Yii::t('app', 'Dictionary'),
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
    public function getBuryatWord()
    {
        return $this->hasOne(BuryatWord::class, ['id' => 'burword_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDictionary()
    {
        return $this->hasOne(Dictionary::class, ['id' => 'dict_id']);
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

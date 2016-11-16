<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\modules\user\models\User;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $menu_name
 * @property string $title
 * @property string $link
 * @property string $description
 * @property string $content
 * @property integer $active
 * @property integer $static
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_name', 'title', 'link', 'content', 'active'], 'required'],
            [['content'], 'string'],
            [['active', 'static', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['menu_name', 'title', 'description'], 'string', 'max' => 255],
            [['static'], 'default', 'value' => 0],
            [['link'], 'string', 'max' => 100],
            [['link'], 'unique'],
            [['link'], 'filter', 'filter' => 'trim'],
            [['link'], 'match', 'pattern' => '/^[a-zа-я0-9-_]{1,100}$/'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'menu_name' => Yii::t('app', 'Menu name'),
            'title' => Yii::t('app', 'Title'),
            'link' => Yii::t('app', 'Link'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'active' => Yii::t('app', 'Active'),
            'static' => Yii::t('app', 'Static'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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

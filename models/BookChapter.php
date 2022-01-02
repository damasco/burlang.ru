<?php

namespace app\models;

use app\modules\user\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "book_chapter".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property integer $book_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Book $book
 * @property User $createdBy
 * @property User $updatedBy
 */
class BookChapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'book_chapter';
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            [['title', 'book_id'], 'required'],
            [['content'], 'string'],
            [['book_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            ['title', 'unique'],
            [['title', 'slug'], 'string', 'max' => 255],
            [
                ['book_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Book::class,
                'targetAttribute' => ['book_id' => 'id']
            ],
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
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'content' => Yii::t('app', 'Content'),
            'book_id' => Yii::t('app', 'Book ID'),
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
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
            ]
        ];
    }

    public function getBook(): ActiveQuery
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
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

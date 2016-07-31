<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property integer $active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property BookChapter[] $chapters
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'active'], 'required'],
            [['description', 'content'], 'string'],
            [['active', 'created_at', 'updated_at'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['title'], 'uniqueSlug'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'active' => Yii::t('app', 'Active'),
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
            TimestampBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(BookChapter::className(), ['book_id' => 'id']);
    }

    /**
     * Validation
     * @param $attribute
     */
    public function uniqueSlug($attribute)
    {
        $model = Book::findOne(['slug' => $this->slug]);
        if ($model && $model->id !== $this->id) {
            $this->addError($attribute, Yii::t('app', 'This title already exists'));
        }
    }

    /**
     * @return int
     */
    public function getLastUpdate()
    {
        /** @var BookChapter $lastUpdateChapter */
        $lastUpdateChapter = BookChapter::find()
            ->where(['book_id' => $this->id])
            ->orderBy('updated_at DESC')
            ->one();

        if ($lastUpdateChapter) {
            return $this->updated_at > $lastUpdateChapter->updated_at ?
                $this->updated_at :
                $lastUpdateChapter->updated_at;
        } else {
            return $this->updated_at;
        }
    }
}

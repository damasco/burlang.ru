<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "book_chapter".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property integer $book_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Book $book
 */
class BookChapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'book_id'], 'required'],
            [['content'], 'string'],
            [['book_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            ['title', 'uniqueSlugBook']
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
            'content' => Yii::t('app', 'Content'),
            'book_id' => Yii::t('app', 'Book ID'),
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
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * Validation
     * @param $attribute
     */
    public function uniqueSlugBook($attribute)
    {
        $model = BookChapter::findOne(['slug' => $this->slug, 'book_id' => $this->book_id]);
        if ($model && $model->id !== $this->id) {
            $this->addError($attribute, Yii::t('app', 'This title already exists'));
        }
    }
}

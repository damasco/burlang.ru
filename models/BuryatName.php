<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buryat_name".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $note
 * @property integer $male
 * @property integer $female
 */
class BuryatName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buryat_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'male', 'female'], 'required'],
            [['male', 'female'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['description'], 'string', 'max' => 255],
            [['note'], 'string'],
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
            'description' => Yii::t('app', 'Description'),
            'note' => Yii::t('app', 'Note'),
            'male' => Yii::t('app', 'Male'),
            'female' => Yii::t('app', 'Female'),
        ];
    }

    /**
     * @return array
     */
    public static function getFirstLetters()
    {
        $alphabet = BuryatName::find()
            ->select(['letter' => 'LEFT(name, 1)', 'amount' => 'COUNT(id)'])
            ->groupBy('letter')
            ->orderBy('letter')
            ->asArray()
            ->all();

        return $alphabet;
    }
}

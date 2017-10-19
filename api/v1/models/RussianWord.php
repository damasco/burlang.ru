<?php

namespace app\api\v1\models;

use app\models\RussianWord as BaseModel;

class RussianWord extends BaseModel
{
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        unset(
            $fields['id'],
            $fields['name'],
            $fields['created_by'],
            $fields['updated_by'],
            $fields['created_at'],
            $fields['updated_at']
        );
        $fields[] = 'translations';

        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTranslations()
    {
        return parent::getTranslations()->select('name');
    }
}

<?php

namespace app\api\v1\models;

use app\models\BuryatName as BaseModel;

class BuryatName extends BaseModel
{
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();
        unset(
            $fields['id'],
            $fields['created_by'],
            $fields['updated_by'],
            $fields['created_at'],
            $fields['updated_at']
        );

        return $fields;
    }
}

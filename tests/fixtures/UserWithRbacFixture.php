<?php

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class UserWithRbacFixture extends ActiveFixture
{
    /**
     * @inheritdoc
     */
    public $tableName = 'auth_assignment';

    /**
     * @inheritdoc
     */
    public $depends = [
        UserFixture::class,
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->dataFile = codecept_data_dir() . 'auth_assignment_data.php';
    }
}
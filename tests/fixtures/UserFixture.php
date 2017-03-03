<?php 

namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
	/**
	 * @inheritdoc
	 */
	public $modelClass = 'app\modules\user\models\User';

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		$this->dataFile = codecept_data_dir() . 'user_data.php';
	}
}
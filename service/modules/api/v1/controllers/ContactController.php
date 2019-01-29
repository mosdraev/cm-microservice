<?php

namespace contact\modules\api\v1\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `v1` module
 */
class ContactController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'contact\modules\api\v1\models\Contact';

    /**
     * @return array
     */
    public function behaviors()
    {
        // remove rateLimiter which requires an authenticated user to work
        $behaviors = parent::behaviors();
        unset($behaviors['rateLimiter']);
        return $behaviors;
    }
}

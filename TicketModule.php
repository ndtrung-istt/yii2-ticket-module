<?php

namespace istt\ticket;

class TicketModule extends \yii\base\Module
{
    public $controllerNamespace = 'istt\ticket\controllers';

    public function init()
    {
        parent::init();

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}

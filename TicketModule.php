<?php

namespace vendor\istt\ticket;

class TicketModule extends \yii\base\Module
{
    public $controllerNamespace = 'vendor\istt\ticket\controllers';

    public function init()
    {
        parent::init();

        \Yii::$app->getI18n()->translations['*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }
}

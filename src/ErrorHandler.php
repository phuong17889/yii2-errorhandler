<?php

namespace phuongdev89\errorhandler;
class ErrorHandler extends \yii\web\ErrorHandler
{

    public $callStackItemView = '@phuongdev89/errorhandler/views/callStackItem.php';

    public $errorAction = 'site/error';
}

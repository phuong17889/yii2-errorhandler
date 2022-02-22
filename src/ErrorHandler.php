<?php

namespace phuong17889\errorhandler;
class ErrorHandler extends \yii\web\ErrorHandler
{

    public $callStackItemView = '@phuong17889/errorhandler/views/callStackItem.php';

    public $errorAction = 'site/error';
}

<?php

namespace phuongdev89\errorhandler;
use yii\base\InvalidConfigException;

class ErrorHandler extends \yii\web\ErrorHandler
{

    /**
     * @inheritdoc
     */
    public $errorAction = 'site/error';

    /**
     * In docker container, project directory is "/app" maybe different with your IDE, just map it
     * Only effect if $useDocker is "true"
     * @example ['/app' => 'D:\\Ampps\\www\\project']
     * @var array
    */
    public $tracePathMappings = [];

    /**
     * @inheritDoc
    */
    public function renderCallStackItem($file, $line, $class, $method, $args, $index)
    {
        $lines = [];
        $begin = $end = 0;
        if ($file !== null && $line !== null) {
            $line--; // adjust line number from one-based to zero-based
            $lines = @file($file);
            if ($line < 0 || $lines === false || ($lineCount = count($lines)) < $line) {
                return '';
            }

            $half = (int) (($index === 1 ? $this->maxSourceLines : $this->maxTraceSourceLines) / 2);
            $begin = $line - $half > 0 ? $line - $half : 0;
            $end = $line + $half < $lineCount ? $line + $half : $lineCount - 1;
        }

        foreach ($this->tracePathMappings as $source => $target) {
            $file = str_replace($source, $target, $file);
        }

        return $this->renderFile($this->callStackItemView, [
            'file' => $file,
            'line' => $line,
            'class' => $class,
            'method' => $method,
            'index' => $index,
            'lines' => $lines,
            'begin' => $begin,
            'end' => $end,
            'args' => $args,
        ]);
    }
}

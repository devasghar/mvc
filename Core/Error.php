<?php

namespace Core;

use Core\View;
use ErrorException;

class Error
{
    public static function errorHandler($level, $message, $file, $line){
        if(error_reporting() !== 0){
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception){
        $errors = [
            'title' => "Fatal Error !",
            'class' => "<p><b>Uncaught exception:</b> " . get_class($exception) . "</p>",
            'message' => "<p><b>Message:</b> ". $exception->getMessage() . "</p>",
            'trace' => "<p><b>Stack Trace:</b><pre> " . $exception->getTraceAsString() . "</pre></pre>",
            'track' => "<p><b>Thrown in</b> <i>'". $exception->getFile() . "'</i> on <b>line" . $exception->getLine() . "</b></p>"
        ];

        View::twigRender('error.html', $errors);
    }

}
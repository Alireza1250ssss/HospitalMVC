<?php

namespace App\Exceptions;


class FileUploadException extends \Exception{
    protected $message = 'file uploading has a problem';
}
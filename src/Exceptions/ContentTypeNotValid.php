<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class ContentTypeNotValid extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: 'Your file content type is not valid', $code, $previous);
    }
}

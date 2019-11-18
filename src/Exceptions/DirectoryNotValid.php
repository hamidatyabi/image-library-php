<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class DirectoryNotValid extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: 'Your directory path is not valid', $code, $previous);
    }
}

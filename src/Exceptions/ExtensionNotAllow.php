<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class ExtensionNotAllow extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: 'Your image extention is not valid', $code, $previous);
    }
}

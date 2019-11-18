<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class Base64Format extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: 'Content is not in base64 encoding.', $code, $previous);
    }
}

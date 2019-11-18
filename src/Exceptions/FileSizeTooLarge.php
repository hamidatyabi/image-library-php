<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class FileSizeTooLarge extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: 'Filesize is too large', $code, $previous);
    }
}

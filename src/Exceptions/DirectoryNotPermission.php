<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class DirectoryNotPermission extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: "Your directory path dont have permission", $code, $previous);
    }
}

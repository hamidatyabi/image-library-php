<?php
namespace HamidAtyabi\ImageLibrary\Exceptions;

class LibraryNotFound extends Exception{
    public static function create($message = '', $code = 0, $previous = null)
    {
        return new self($message ?: 'getImageSizeFromString library not found in your php libraries', $code, $previous);
    }
}

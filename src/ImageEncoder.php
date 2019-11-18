<?php
namespace HamidAtyabi\ImageLibrary;
use HamidAtyabi\ImageLibrary\Exceptions\LibraryNotFound;
use HamidAtyabi\ImageLibrary\Exceptions\FileSizeTooLarge;
use HamidAtyabi\ImageLibrary\Exceptions\ExtensionNotAllow;
use HamidAtyabi\ImageLibrary\Exceptions\ContentTypeNotValid;



/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */

class ImageEncoder{
    /**
     * @var int
     */
    private $maxSize;
    /**
     * @var array
     */
    private $allowedFormats;
    /**
     * @var int
     */
    private $width;
    /**
     * @var int
     */
    private $height;
    /**
     * @var int
     */
    private $size;
    /**
     * @var string
     */
    private $image;
    /**
     * @var string
     */
    private $mime;
    /**
     * @var string
     */
    private $extension;
    /**
     * @var string
     */
    private $fileName;
    
    public function __construct(array $allowedFormats = ['jpeg', 'png', 'gif'], int $maxSize = 0) {
        
        $this->allowedFormats = $allowedFormats;
        $this->maxSize = $maxSize;
        
        
        
        
    }
    
    public function encode($binaryImage): string
    {
        $size = null;
        if (function_exists('getimagesizefromstring'))
            $size = getImageSizeFromString($binaryImage);
        else
            $size = $this->getimagesizefromstring($binaryImage);
        if($size == null) throw LibraryNotFound::create();
        
        $this->width = $size[0];
        $this->height = $size[1];
        $this->mime = $size['mime'];
        $this->size = strlen($this->image);
        if(strpos($size['mime'], 'image/') !== 0) throw ContentTypeNotValid::create();
        if($this->maxSize > 0 && $this->size > $this->maxSize) throw FileSizeTooLarge::create();
        $this->extension = substr($size['mime'], 6);
        if(!in_array($this->extension, $this->allowedFormats)) throw ExtensionNotAllow::create();
        
        return base64_encode($binaryImage);
    }

    private function getimagesizefromstring($data)
    {
        $uri = 'data://application/octet-stream;base64,' . base64_encode($data);
        return getimagesize($uri);
    }
    
    
    

    
}

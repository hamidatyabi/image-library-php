<?php
namespace HamidAtyabi\ImageLibrary;
use HamidAtyabi\ImageLibrary\Exceptions\Base64Format;
use HamidAtyabi\ImageLibrary\Exceptions\LibraryNotFound;
use HamidAtyabi\ImageLibrary\Exceptions\FileSizeTooLarge;
use HamidAtyabi\ImageLibrary\Exceptions\ExtensionNotAllow;
use HamidAtyabi\ImageLibrary\Exceptions\ContentTypeNotValid;
use HamidAtyabi\ImageLibrary\Exceptions\DirectoryNotValid;
use HamidAtyabi\ImageLibrary\Exceptions\DirectoryNotPermission;
use HamidAtyabi\ImageLibrary\Entities\Image;



/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */

class ImageDecoder{
    /**
     * @var string
     */
    private $base64EncodedImage;
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
    
    public function __construct(string $base64EncodedImage, 
            array $allowedFormats = ['jpeg', 'png', 'gif'], int $maxSize = 0, string $fileName = '') {
        
        $this->base64EncodedImage = $base64EncodedImage;
        $this->allowedFormats = $allowedFormats;
        
        if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $this->base64EncodedImage)) throw Base64Format::create();
        $this->image = base64_decode($this->base64EncodedImage);
        $size = null;
        if (function_exists('getimagesizefromstring'))
            $size = getImageSizeFromString($this->image);
        else
            $size = $this->getimagesizefromstring($this->image);
        if($size == null) throw LibraryNotFound::create();
        
        $this->width = $size[0];
        $this->height = $size[1];
        $this->mime = $size['mime'];
        $this->size = strlen($this->image);
        if(strpos($size['mime'], 'image/') !== 0) throw ContentTypeNotValid::create();
        if($maxSize > 0 && $this->size > $maxSize) throw FileSizeTooLarge::create();
        $this->extension = substr($size['mime'], 6);
        if(!in_array($this->extension, $allowedFormats)) throw ExtensionNotAllow::create();
        if(empty($fileName))
            $this->fileName = strtotime(date("Y-m-d H:i:s")).round(rand(1111,9999)).".{$this->extension}";
        else
            $this->fileName = $fileName;
        
        
    }
    /**
     * 
     * @return Image
     */
    public function upload($uploadDir = ''): Image
    {
        if(!file_exists($uploadDir)) throw DirectoryNotValid::create();
        if(substr(sprintf('%o', fileperms($uploadDir)), -4) != "0777") throw DirectoryNotPermission::create();
        
        $imageFile = $uploadDir.$this->fileName;
        if(file_put_contents($imageFile, $this->image)){
            $Image = new Image();
            $Image->setFileName($this->fileName);
            $Image->setBaseHeight($this->height);
            $Image->setBaseWidth($this->width);
            $Image->setMime($this->mime);
            $Image->setSize($this->size);
            $Image->setPath($imageFile);
            $Image->setExtension($this->extension);
            return $Image;
        }
        
        return false;
    }

    private function getimagesizefromstring($data)
    {
        $uri = 'data://application/octet-stream;base64,' . base64_encode($data);
        return getimagesize($uri);
    }
    
    
    

    
}

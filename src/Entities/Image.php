<?php
namespace HamidAtyabi\ImageLibrary\Entities;
/*
 * Copyright (c) 2019.
 * Developer: Hamid Atyabi
 * Email: atyabi.hamid@yahoo.com
 * Website: www.atyabi.com
 */
class Image implements \JsonSerializable{
    private $fileName;
    private $extension;
    private $mime;
    private $baseWidth;
    private $baseHeight;
    private $width;
    private $height;
    private $size;
    private $path;
    function __construct() {
        
    }

    function getFileName() {
        return $this->fileName;
    }

    function getExtension() {
        return $this->extension;
    }

    function getMime() {
        return $this->mime;
    }

    function getBaseWidth() {
        return $this->baseWidth;
    }

    function getBaseHeight() {
        return $this->baseHeight;
    }

    function getWidth() {
        return $this->width;
    }

    function getHeight() {
        return $this->height;
    }

    function getSize() {
        return $this->size;
    }

    function getPath() {
        return $this->path;
    }

    function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    function setExtension($extension) {
        $this->extension = $extension;
    }

    function setMime($mime) {
        $this->mime = $mime;
    }

    function setBaseWidth($baseWidth) {
        $this->baseWidth = $baseWidth;
    }

    function setBaseHeight($baseHeight) {
        $this->baseHeight = $baseHeight;
    }

    function setWidth($width) {
        $this->width = $width;
    }

    function setHeight($height) {
        $this->height = $height;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setPath($path) {
        $this->path = $path;
    }

    

    public function jsonSerialize()
    {
        return [
            'fileName' => $this->fileName,
            'extension' => $this->extension,
            'mime' => $this->mime,
            'baseWidth' => $this->baseWidth,
            'baseHeight' => $this->baseHeight,
            'width' => $this->width,
            'height' => $this->height,
            'size' => $this->size,
            'path' => $this->path
        ];
    }


}

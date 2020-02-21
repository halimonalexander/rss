<?php

namespace HalimonAlexander\Rss\Components;

class Image
{
    private $height;
    private $location;
    private $title;
    private $url;
    private $width;
    
    public function __construct(
        string $title,
        string $location,
        string $url,
        int $width,
        int $height
    ) {
        $this->title = $title;
        $this->location = $location;
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
    }
    
    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }
    
    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }
    
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    
    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }
}

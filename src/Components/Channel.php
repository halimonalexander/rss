<?php
namespace HalimonAlexander\Rss\Components;

class Channel
{
    private $title;
    private $location;
    private $description;
    private $language = 'en-us';
    private $image;
    private $publicationDate;
    private $lastBuildDate;
    private $ttl = 60;
    private $generator = 'Rss generator plugin';
    private $copyright = 'A.Halimon';
    
    public function __construct(
        string $title,
        string $location,
        string $description,
        string $language,
        Image $image,
        string $publicationDate,
        string $lastBuildDate,
        int $ttl,
        ?string $generator = null,
        ?string $copyright = null
    ) {
        $this->title = $title;
        $this->location = $location;
        $this->description = $description;
        $this->language = $language;
        $this->image = $image;
        $this->publicationDate = $publicationDate;
        $this->lastBuildDate = $lastBuildDate;
        $this->ttl = $ttl;
        if ($generator !== null) {
            $this->generator = $generator;
        }
        
        if ($copyright !== null) {
            $this->copyright = $copyright;
        }
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
    public function getLocation(): string
    {
        return $this->location;
    }
    
    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    
    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
    
    /**
     * @return \HalimonAlexander\Rss\Components\Image
     */
    public function getImage(): \HalimonAlexander\Rss\Components\Image
    {
        return $this->image;
    }
    
    /**
     * @return string
     */
    public function getPublicationDate(): string
    {
        return $this->publicationDate;
    }
    
    /**
     * @return string
     */
    public function getLastBuildDate(): string
    {
        return $this->lastBuildDate;
    }
    
    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }
    
    /**
     * @return string|null
     */
    public function getGenerator(): ?string
    {
        return $this->generator;
    }
    
    /**
     * @return string|null
     */
    public function getCopyright(): ?string
    {
        return $this->copyright;
    }
}

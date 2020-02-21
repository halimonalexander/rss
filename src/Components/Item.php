<?php

namespace HalimonAlexander\Rss\Components;

class Item
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $location;
    
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $publicationDate;
    
    /**
     * @var string[]|null
     */
    private $categories;
    
    /**
     * @var array|null
     */
    private $image;
    
    /**
     * @var string|null
     */
    private $guid;
    
    /**
     * @var string|null
     */
    private $author;
    
    /**
     * Item constructor.
     *
     * @param string        $title
     * @param string        $location
     * @param string        $description
     * @param string        $publicationDate
     * @param string[]|null $categories
     * @param array|null    $image
     * @param string|null   $guid
     * @param string|null   $author
     */
    public function __construct(
        string $title,
        string $location,
        string $description,
        string $publicationDate,
        ?array $categories = null,
        ?array $image = null,
        ?string $guid = null,
        ?string $author = null
    ) {
        $this->title = $title;
        $this->location = $location;
        $this->description = $description;
        $this->publicationDate = $publicationDate;
        $this->categories = $categories;
        $this->image = $image;
        $this->guid = $guid;
        $this->author = $author;
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
    public function getPublicationDate(): string
    {
        return $this->publicationDate;
    }
    
    /**
     * @return string[]|null
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }
    
    /**
     * @return array|null
     */
    public function getImage(): ?array
    {
        return $this->image;
    }
    
    /**
     * @return string|null
     */
    public function getGuid(): ?string
    {
        return $this->guid;
    }
    
    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }
}

<?php
namespace HalimonAlexander\Rss;

/**
 * Class Generator
 *
 * @package HalimonAlexander\Rss
 */
class Generator
{
    public const USE_COMPRESSION = false;
    
    public const FORMAT_XML = 'xml';
    public const FORMAT_ATOM = 'atom';
    
    /**
     * @var string
     */
    private $format;
    
    private $channel;
    private $items;
    
    public function __construct(string $format)
    {
        $availableFormats = [
            self::FORMAT_ATOM,
            self::FORMAT_XML,
        ];
    
        if (!in_array($format, $availableFormats)) {
            throw new \RuntimeException('Format not supported');
        }
    
        $this->format = $format;
    }
    
    public function setChannel(Components\Channel $channel)
    {
        $this->channel = $channel;
    }
    
    public function addItem(Components\Item $item): void
    {
        $this->items[] = $item;
    }
    
    public function fetch()
    {
        $rss = $this->serialize();
        if (self::USE_COMPRESSION) {
            $this->compress($rss);
        }
        
        return $rss;
    }
    
    private function serialize()
    {
        return $this->getFormatter()::getRss($this->channel, $this->items);
    }
    
    private function compress(string &$string)
    {
        $string = str_replace(["\r", "\n"], ["",""], $string);
        $string = preg_replace('/(\s)+/s', '\\1', $string);
        $string = str_replace("> <", "><", $string);
    }
    
    private function getFormatter(): string
    {
        switch ($this->format) {
            case self::FORMAT_ATOM:
                return Formats\Atom::class;
                break;
            case self::FORMAT_XML:
                return Formats\Xml::class;
                break;
        }
    }
}

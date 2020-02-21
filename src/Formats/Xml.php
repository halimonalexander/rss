<?php

namespace HalimonAlexander\Rss\Formats;

use HalimonAlexander\Rss\Components\Channel;
use HalimonAlexander\Rss\Components\Image;
use HalimonAlexander\Rss\Components\Item;

class Xml
{
    public function getImage(Image $image): string
    {
        $lines = [
            '<image>',
            '    <title>%s</title>',
            '    <link>%s</link>',
            '    <url>%s</url>',
            '    <width>%d</width>',
            '    <height>%d</height>',
            '</image>',
        ];
        
        return sprintf(
            join(PHP_EOL, $lines),
            $image->getTitle(),
            $image->getLocation(),
            $image->getUrl(),
            $image->getWidth(),
            $image->getHeight()
        );
    }
    
    public function getItem(Item $item): string
    {
        $lines = [
            '<item>',
            '    <title>%s</title>',
            '    <link>%s</link>',
            '    <description>%s</description>',
            '    <pubDate>%s</pubDate>',
        ];
        
        if (!empty($guid = $item->getGuid()))
            $lines[] = sprintf('    <guid>%s</guid>', $guid);
        
        if (!empty($categories = $item->getCategories())) {
            $categories = array_map(function (string $category) {
                sprintf('    <category>%s</category>', $category);
            }, $categories);
            
            $lines = array_merge($lines, $categories);
        }
    
        if (!empty($image = $item->getImage())) {
            $lines[] = sprintf(
                '    <enclosure url="%s" length="%s" type="%s"/>',
                $image['location'],
                $image['length'],
                $image['type']
            );
        }
    
        if (!empty($author = $item->getAuthor())) {
            $lines[] = sprintf('     <author>%s</author>', $author);
        }
            
        $lines[] = '</item>';
        
        return sprintf(
            join(PHP_EOL, $lines),
            $item->getTitle(),
            $item->getLocation(),
            htmlspecialchars($item->getDescription()),
            date('r', strtotime($item->getPublicationDate()))
        );
    }
    
    public function getChannel(Channel $channel): string
    {
        $lines = [
            '<channel>',
            '      <title>%s</title>',
            '      <link>%s</link>',
            '      <description>%s</description>',
            '      %s',
            '      <language>%s</language>',
            '      <pubDate>%s</pubDate>',
            '      <lastBuildDate>%s</lastBuildDate>',
            '      <ttl>%d</ttl>',
            '      <generator>%s</generator>',
            '      <copyright>%s</copyright>',
            '      %s',
            '</channel>',
        ];
        
        return sprintf(
            join(PHP_EOL, $lines),
            $channel->getTitle(),
            $channel->getLocation(),
            $channel->getDescription(),
            $this->getImage($channel->getImage()),
            $channel->getLanguage(),
            $channel->getPublicationDate(),
            $channel->getLastBuildDate(),
            $channel->getTtl(),
            $channel->getGenerator(),
            $channel->getGenerator()
        );
    }
    
    /**
     * @param Channel $channel
     * @param Item[]   $urls
     *
     * @return string
     */
    public function getRss(Channel $channel, array $urls): string
    {
        $urls = array_map([$this, 'getUrl'], $urls);
        
        $lines = [
            '<rss version="2.0">',
            '  %s',
            '</rss>',
        ];
        
        return sprintf(
            join(PHP_EOL, $lines),
            sprintf(
                $this->getChannel($channel),
                join(PHP_EOL, $urls)
            )
        );
    }
}

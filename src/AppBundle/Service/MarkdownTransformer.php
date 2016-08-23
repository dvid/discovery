<?php

namespace AppBundle\Service;

use Doctrine\Common\Cache\Cache;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;

class MarkdownTransformer
{

    private $cache;
    private $markdownParser;

    public function __construct(MarkdownParserInterface $markdownParser, Cache $cache)
    {
        $this->cache = $cache;
        $this->markdownParser = $markdownParser;
    }

    public function parse($str){

        $cache = $this->cache;
        $key = md5($str);

        if ($cache->contains($key)) {
            return $cache->fetch($key);
        }

        $str = $this->markdownParser
                    ->transformMarkdown($str);
        $cache->save($key, $str);

        return $str;
    }
}
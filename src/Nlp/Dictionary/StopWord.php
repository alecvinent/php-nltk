<?php

namespace Nlp\Dictionary;

class StopWord
{
    private $words = array();

    public function __construct()
    {
        $file = fopen(__DIR__ . '/stopwords.txt', 'r');
        while($word = fgets($file)) {
            $word = rtrim($word);
            $this->words[$word] = 1;
        }
        fclose($file);
    }

    public function filter(array $doc)
    {
        $filtered = array();
        foreach($doc as $word) {
            if(!isset($this->words[$word])) {
                $filtered[] = $word;
            }
        }
        return $filtered;
    }
}
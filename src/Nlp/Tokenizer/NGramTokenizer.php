<?php

namespace Nlp\Tokenizer;

class NGramTokenizer
{
    private $n;

    public function __construct($n)
    {
        $this->n = (int)$n;
    }

    public function tokenize(array $doc)
    {
        $grams = array();
        for($i = 0; $i < (count($doc) - $this->n + 1); $i++) {
            $gram = array();
            for($g = 0; $g < $this->n; $g++) {
                $gram[] = $doc[$g + $i];
            }
            $grams[] = join(' ', $gram);
        }
        return $grams;
    }
}
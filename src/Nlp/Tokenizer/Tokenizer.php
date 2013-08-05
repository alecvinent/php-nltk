<?php

namespace Nlp\Tokenizer;

interface Tokenizer
{
    /**
     * @param $string
     * @return string[]
     */
    public function tokenize($string);
}
<?php

namespace Nlp\Tokenizer;

class WhitespaceTokenizer implements Tokenizer
{
    public function tokenize($string)
    {
        return preg_split('/[[:space:]]+/u', $string, -1, PREG_SPLIT_NO_EMPTY);
    }
}
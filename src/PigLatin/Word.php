<?php

namespace VitKutny\PigLatin;

use VitKutny\PigLatin\Word;

final class Word {

    private $word;

    public function __construct($word) {
        $this->word = $word;
    }

    public function translate() {
        $word = $this->word;
        if (Word\Vowel::begins($word) || Word\Consonant\Silent::begins($word)) {
            $word.= '\'w';
        } elseif (Word\Consonant::begins($word)) {
            $consonants = Word\Consonant::getBeginning($word);
            $rest = substr($word, strlen($consonants));
            $word = ($rest ? $rest . '-' : NULL) . $consonants;
        }
        return (ctype_upper($this->word[0]) ? ucfirst($word) : $word) . 'ay';
    }

    public function __toString() {
        return $this->translate();
    }

}

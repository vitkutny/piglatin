<?php

namespace VitKutny\PigLatin\Word\Consonant;

final class Silent {

    public static function begins($word) {
        $word = strtolower($word);
        $firstLetter = $word[0];
        $nextLetter = substr($word, 1, 1);
        switch ($firstLetter) {
            case 'b':
                return $nextLetter === 't';
            case 'd':
                return $nextLetter === 'j';
            case 'g':
                return $nextLetter === 'm' || $nextLetter === 'n';
            case 'k':
                return $nextLetter === 'n';
        }
        return FALSE;
    }

}

<?php

namespace VitKutny\PigLatin\Word;

final class Consonant {

    private static $letters = [
        'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z'
    ];
    private static $combinations = [
        'ci', 'dge', 'gu', 'qu', 'si', 'su', 'ti', 'ya', 'ye', 'yi', 'yo', 'yu'
    ];

    public static function begins($word) {
        $word = strtolower($word);
        $letter = $word[0];
        if ($letter == 'y') {
            return in_array(substr($word, 0, 2), self::$combinations);
        }
        return in_array($letter, self::$letters);
    }

    public static function getBeginning($word) {
        $word = strtolower($word);
        foreach (array_merge(self::$combinations, self::$letters) as $combination) {
            if (strpos($word, $combination) === 0) {
                return $combination . self::getBeginning(substr($word, strlen($combination)));
            }
        }
    }

}

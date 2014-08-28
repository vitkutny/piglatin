<?php

namespace VitKutny\PigLatin;

use VitKutny\PigLatin;

final class Translator {

    public function translate($string) {
        $words = [];
        preg_match_all('/[a-zA-Z]+/', $string, $words);
        foreach ($words[0] as $word) {
            $string = preg_replace('/' . $word . '/', new PigLatin\Word($word), $string, 1);
        }
        return $string;
    }

}

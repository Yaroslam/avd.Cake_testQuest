<?php

class Reverser
{
    //разделяем строку string по пробелам
    //реверсим каждое отдельное слово
    public static function revertCharacters(string $string): string
    {
        $stringArray = explode(' ', $string);

        foreach ($stringArray as $key => $word) {
            $stringArray[$key] = self::reverseWord($word);
        }

        return implode(' ', $stringArray);
    }

    //разбиваем word на массив wordArray по буквам
    //wordArrReverse - wordArray но без знаков применания и реверстнутый
    //в цикле реверсим с сохранением регистра
    public static function reverseWord(string $word): string
    {
        $wordArray = mb_str_split($word);
        $wordArrReverse = mb_str_split(mb_strtolower(preg_replace('/\pP/iu', '', $word)));
        $num = count($wordArrReverse) - 1;

        for ($i = 0; $i < count($wordArray); $i++) {

            if (!ctype_punct($wordArray[$i])) {

                if (mb_strtolower($wordArray[$i]) != $wordArray[$i]) {
                    $wordArray[$i] = mb_strtoupper($wordArrReverse[$num]);
                } else {
                    $wordArray[$i] = $wordArrReverse[$num];
                }

                $num--;
            }
        }

        return implode($wordArray);
    }
}




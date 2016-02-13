<?php
namespace joshtronic;

class Sort
{
    public static function by($field, &$array, $direction = 1)
    {
        usort($array, create_function('$a, $b', '
            $a = $a["' . $field . '"];
            $b = $b["' . $field . '"];

            if ($a == $b) {
                return 0;
            }

            return ($a ' . ($direction == -1 ? '>' : '<') .' $b) ? -1 : 1;
        '));

        return true;
    }
}


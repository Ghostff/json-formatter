<?php

namespace Hazbo\Json;

class Formatter
{
    public $json;

    public function __construct($json = '[]')
    {
        $this->json = $json;
    }

    public function format($json = null)
    {
        if (is_null($json)) {
            $json = $this->json;
        }

        $result    = '';
        $pos       = 0;
        $strLen    = strlen($json);
        $indentStr = "\t";
        $newLine   = "\n";

        for ($i = 0; $i < $strLen; $i++) {
            $char = $json[$i];
            if ($char == '"') {
                if (!preg_match('`"(\\\\\\\\|\\\\"|.)*?"`s', $json, $m, null, $i)) {
                    return $json;
                }

                $result .= $m[0];
                $i      += strLen($m[0]) - 1;
                continue;
            } else if ($char == '}' || $char == ']') {
                $result .= $newLine;
                $pos    --;
                $result .= str_repeat($indentStr, $pos);
            }

            $result .= $char;

            if ($char == ',' || $char == '{' || $char == '[') {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos ++;
                }
                $result .= str_repeat($indentStr, $pos);
            }
        }
        return $result;
    }
}

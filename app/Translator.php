<?php

namespace App;

class Translator {
        private $text, $words;
        
        public function __construct($text) {
            $this->text = $text;
            $this->words = [];
            $words = preg_split('/\s+/', $this->text);
            foreach ($words as $word) {
                $this->words[] = new TranslatorWord($word);
            }
            $this->_();
        }

        private function _() {
            $words = [];
            foreach ($this->words as $word) {
                $words[] = $word->translation;
            }
            $this->translation = implode(' ', $words);
        }
}

class ArC {
    public function __construct($data) {
        $this->type = @$data[0];
        $this->tr   = @$data[1];
        $this->tr2  = @$data[2];
        $this->tr3  = @$data[3];
    }
}

class TranslatorWord {
    public function __construct($text) {
        $this->text = $text;
        $this->_();
        $this->__();
    }

    private function __() {
        $parts = [];
        foreach ($this->parts as $part) {
            $parts[] = $part->translation;
        }
        $this->translation = implode('', $parts);
    }

    private function _() {
        $this->parts = [];
        $ars = preg_split('//u', $this->text, null, PREG_SPLIT_NO_EMPTY);
        $part = new Part();
        for ($i = 0;$i < count($ars);$i++) {
            $newPart = $part->add($ars, $i);
            if ($newPart) {
                $this->parts[] = $part->process();
                $part = new Part();
            }
        }
        if ($part->text) {
            $this->parts[] = $part->process();
        }
    }
}

class Part {
    static $data = [];
    var $text = "";

    public function __construct() {
        if (empty(self::$data)) {
            foreach (Data::$ars as $i => $v) {
                $arc = new ArC($v);
                self::$data[$i] = $arc;
            }
        }
    }

    public function process() {
        $translation = "";
        $ars = preg_split('//u', $this->text, null, PREG_SPLIT_NO_EMPTY);
        for ($i = 0;$i < count($ars);$i++) {
            $ar = $ars[$i];
            $arc = self::$data[$ar];
            $tr = $arc->tr;
            $prev_ar = @$ars[$i - 1];
            $prev_arc = @self::$data[$prev_ar];
            $next_ar = @$ars[$i + 1];
            $next_arc = @self::$data[$next_ar];
            if ($arc->type == 4 and count($ars) == 1) {
                $tr = $arc->tr3;
            }
            if (
                (
                    $arc->type == 4
                    or $arc->type == 5
                )
                and $next_ar
                and $next_arc->type == 7
            ) {
                $tr = $arc->tr3;
            }
            if ($arc->type == 3) {
                $tr = $prev_arc->tr;
            }
            if (
                (
                    $arc->type == 5
                )
                and $i == count($ars) - 1
                and count($ars) >= 3
            ) {
                $tr = $arc->tr2;
            }
            $translation .= $tr;
        }
        $this->translation = $translation;
        return $this;
    }

    public function add($ars, $i) {
        $ar = $ars[$i];
        $this->text .= $ar;
        $arc = self::$data[$ar];
        $next_ar = @$ars[$i + 1];
        $next_arc = @self::$data[$next_ar];
        switch ($arc->type) {
            case 1:
                if ($next_ar) {
                    if ($next_arc->type == 1) {
                        return true;
                    }
                }
                break;
            case 2:
            case 7:
                if ($next_ar) {
                    if ($next_arc->type == 5) {
                        $next_ar = @$ars[$i + 2];
                        $next_arc = @self::$data[$next_ar];
                        if (
                            !$next_ar
                            or ($next_ar and $next_arc->type != 2)
                        ) {
                            return false;
                        }
                    }
                }
                return true;
            case 3:
                if ($next_ar) {
                    if (
                        $next_arc->type == 1
                        or $next_arc->type == 5
                    ) {
                        return true;
                    }
                }
                break;
            case 4:
                if ($next_ar) {
                    if (
                        $next_arc->type == 1
                        or $next_arc->type == 4
                        or $next_arc->type == 5
                    ) {
                        return true;
                    }
                }
                break;
            case 5:
                if ($next_ar) {
                    if (
                        $next_arc->type == 1
                        or $next_arc->type == 4
                        or $next_arc->type == 5
                    ) {
                        return true;
                    }
                }
                break;
        }
        return false;
    }
}

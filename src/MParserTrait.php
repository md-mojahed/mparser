<?php
namespace Mojahed;

trait MParserTrait {
    public function _exp($token, $args) {
        $argsArr = explode(',', $args);
        return explode($argsArr[0], $token)[$argsArr[1] - 1] ?? '';
    }

    public function _cut($token, $args) {
        $argsArr = explode(',', $args);
        return substr($token, intval($argsArr[0]) - 1, trim($argsArr[1]) == 'last' ? strlen($token) : intval($argsArr[1])) ?? '';
    }

    public function _cut_back($token, $args) {
        return substr($token, strlen($token) - intval($args)) ?? '';
    }

    public function _reverse($token, $args) {
        return strrev($token);
    }

    public function _sum($token, $args) {
        $argsArr = explode(',', $args);
        return $token + intval($argsArr[0]);
    }

    public function _sub($token, $args) {
        $argsArr = explode(',', $args);
        return $token - intval($argsArr[0]);
    }
}

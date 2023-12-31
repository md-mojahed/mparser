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
        return floatval($token) + intval($argsArr[0]);
    }

    public function _sub($token, $args) {
        $argsArr = explode(',', $args);
        return floatval($token) - intval($argsArr[0]);
    }

    public function _mul($token, $args)
    {
        $argArray = explode(',', $args);
        return floatval($token) * intval($argArray[0]);
    }

    public function _div($token, $args)
    {
        $argArray = explode(',', $args);
        return intval($argArray[0]) == 0 ? 0 : (floatval($token) / intval($argArray[0]));
    }

    public function _power($token, $args)
    {
        $argArray = explode(',', $args);
        return floatval($token) ** intval($argArray[0]);
    }

    public function _upper($token, $args) {
        return strtoupper($token);
    }

    public function _lower($token, $args) {
        return strtolower($token);
    }

    public function _capitalize($token, $args) {
        return ucfirst(strtolower($token));
    }

    public function _replace($token, $args) {
        $argsArr = explode(',', $args);
        return str_replace($argsArr[0], $argsArr[1], $token);
    }

    public function _length($token, $args) {
        return strlen($token);
    }

    public function _concat($token, $args) {
        return $token . $args;
    }
}

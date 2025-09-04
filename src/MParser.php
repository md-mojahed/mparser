<?php
namespace Mojahed;

require_once __DIR__.'/MParserTrait.php';

class MParser {
    use MParserTrait;
    private $token_pattern = '/\{(\w+|\{\w+\}(\[\w+\(([0-9 a-z,\-\+:\$\#\@\|]+)?\)\])+)\}/';
    private $variable_pattern = '/\{\w+\}/';
    private $expression_pattern = '/(\[\w+\(([0-9 a-z,\-\+:\$\#\@\|]+)?\)\])/';
    private $method_pattern = '/\[\w+/';
    private $argument_pattern = '/\\(.*\)/';
    private $string = '';
    private $dataset = [];

    public static function parse($str, $dataset) {
        return (new static($str, $dataset))->_parse();
    }

    public function __construct($str, $dataset) {
        $this->string = $str;
        $this->dataset = $dataset;
    }

    public function _parse() {
        $matches = $this->_identify_all_token();

        usort($matches, function($a, $b) {
            return strlen($b) <=> strlen($a);
        });

        $queue = [];

        foreach ($matches as $i => $match) {
            $queue[$i] = [];
            $this->_make_queue($match, $queue[$i]);
            $prevMeaning = '';

            foreach ($queue[$i] as $token) {
                $prevMeaning = $this->dataset[$token] ?? $this->_exec_expression($prevMeaning, $token);
            }

            $this->string = str_replace($match, $prevMeaning, $this->string);
        }

        return $this->string;
    }

    private function _identify_token() {
        preg_match($this->token_pattern, $this->string, $match);
        return $match[0] ?? '';
    }

    private function _identify_all_token() {
        preg_match_all($this->token_pattern, $this->string, $matches);
        return $matches[0] ?? [];
    }

    private function _make_queue($str, &$queue) {
        preg_match($this->variable_pattern, $str, $match);
        $queue[0] = substr($match[0], 1, strlen($match[0]) - 2);
        preg_match_all($this->expression_pattern, $str, $matches);

        foreach ($matches[0] as $i => $token) {
            $queue[$i + 1] = $token;
        }
    }

    private function _exec_expression($token, $expression) {
        preg_match($this->method_pattern, $expression, $methodMatch);
        preg_match($this->argument_pattern, $expression, $argMatch);

        if(count($methodMatch) == 0 || count($argMatch) == 0) {
            return $token;
        }
        $method = '_' . substr($methodMatch[0], 1);
        $args = substr($argMatch[0], 1, -1);
        // Check if the method exists in the MParserTrait
        if (method_exists($this, $method)) {
            return $this->$method($token, $args);
        }
        // Return the original token if the method doesn't exist
        return $token;
    }
}

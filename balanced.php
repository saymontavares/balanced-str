<?php

    namespace Balanced\Str;

    use Exception;

    /**
     * Class responsável por fazer o balanceamento de caracteres
     */
    class BalancedStr
    {
        const SYMBOLS = ['(' => ')', '{' => '}', '[' => ']'];
        private String $string;

        public function __construct(String $string)
        {
            $this->string = $string;
        }

        /**
         * Valida a string
         *
         * @return bool true se a string é válida, false ou exception se não
         */
        private function validate() : Bool
        {
            if (empty(trim($this->string))) {
                throw new Exception('A string não pode ser vazia.');
            } elseif (strlen($this->string) === 1) {
                return false;
            }

            return true;
        }

        /**
         * Verifica se a string está balanceada
         *
         * @return bool se o conjunto de caracteres está balanceado true, se não false
         */
        public function brackets() : Bool
        {
            if ($this->validate()) {
                for ($stack = [], $length = strlen($this->string), $i = 0; $i < $length; $i++) {
                    $symbol = $this->string[$i];
                    if (array_key_exists($symbol, self::SYMBOLS)) {
                        $stack[] = $symbol;
                    } else {
                        $lastInStack = array_pop($stack);
                        if (!isset(self::SYMBOLS[$lastInStack]) || $symbol !== self::SYMBOLS[$lastInStack]) return false;
                    }
                }

                return count($stack) === 0 ? true : false;
            }

            return false;
        }
    }
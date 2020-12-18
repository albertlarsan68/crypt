<?php

namespace Al68\transcoder;

use Exception;

class transcoder
{
    private array $_encoding;
    private array $_decode_array;
    private function _update_decode_array(): void
    {
        foreach ($this->_encoding as $key => $value) {
            $this->_decode_array[$value] = $key;
        }
    }


    public function __construct()
    {
        $this->set_encoding_string(
            'abcdefhijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'bcdefgijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZa'
        );
    }
    public function set_encoding_string(string $origin, string $end)
    {
        if (strlen($origin) != strlen($end)) {
            throw new Exception("Les chaînes sont de longueur différentes !!!");
        }
        for ($i = 0; $i < strlen($origin); $i++) {
            $encoding_array[$origin[$i]] = $end[$i];
        }
        $this->set_encoding_array($encoding_array);
    }
    public function set_encoding_array(array $encoding_array): void
    {
        $this->_encoding = $encoding_array;
        $this->_update_decode_array();
    }
    public function encode_string(string $toEncode): string
    {
        $encoded = "";
        $character = "";
        for ($i = 0; $i < strlen($toEncode); $i++) {
            $character = $toEncode[$i];
            if (isset($this->_encoding[$character])) {
                $character = $this->_encoding[$character];
            }
            $encoded = $encoded . $character;
        }

        return $encoded;
    }
    public function decode_string(string $toDecode): string
    {
        $decoded = "";
        $character = "";
        for ($i = 0; $i < strlen($toDecode); $i++) {
            $character = $toDecode[$i];
            if (isset($this->_encoding[$character])) {
                $character = $this->_encoding[$character];
            }
            $decoded = $decoded . $character;
        }

        return $decoded;
    }
}

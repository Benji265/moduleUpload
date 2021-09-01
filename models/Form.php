<?php

class Form
{
    public function checkPseudo(array $arr, string $nameChamp, string $regex)
    {
        if (empty($arr[$nameChamp])) {
            return 'Champ Obligatoire';
        } elseif (!preg_match($regex, $arr[$nameChamp])) {
            return 'Format Invalide';
        } else {
            return false;
        }
    }

    public function checkEmail(array $arr, string $nameChamp)
    {
        if (empty($arr[$nameChamp])) {
            return 'Champ Obligatoire';
        } elseif (!filter_var($arr[$nameChamp], FILTER_VALIDATE_EMAIL)) {
            return 'Format Invalide';
        } else {
            return false;
        }
    }

    public function checkPassword(array $arr, string $nameChamp)
    {
        if (empty($arr[$nameChamp])) {
            return 'Champ Obligatoire';
        } else {
            return false;
        }
    }
}

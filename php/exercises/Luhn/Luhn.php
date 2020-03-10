<?php
declare(strict_types=1);

class Luhn
{
    public function isValid(string $str): bool
    {
        $sum = 0;
        $str = str_replace(' ', '', $str);
        if (!(ctype_digit($str))) {
            return false;
        } else { 
            for ($i = 1; $i <= strlen($str); $i++) {
                if($i % 2 == 0){
                    $sum += intval($str[$i-1]);
                }else{
                    $val = intval($str[$i-1]) * 2;
                    if ($val > 9){
                        $sum += ($val-9);
                    }else{
                        $sum += $val;
                    }
                }
            }
        }
        if($sum % 10 == 0){
            return true;
        }
        return false;
    }
}

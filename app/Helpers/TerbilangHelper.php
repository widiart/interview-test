<?php
namespace App\Helpers;
  
class TerbilangHelper {

    public static function convert($number)
    {
        $number = str_replace('.', '', $number);

        $base    = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan'];
        $numeric = ['1000000000', '1000000', '1000', '100', '10', '1'];
        $unit    = ['milyar', 'juta', 'ribu', 'ratus', 'puluh', ''];
        $str     = '';

        $i = 0;

        if ($number == 0)
        {
            $str = 'nol';
        }
        else
        {
            while ($number != 0)
            {
                $count = (int)($number / $numeric[$i]);

                if ($count >= 10)
                {
                    $str .= static::convert($count) . ' ' . $unit[$i] . ' ';
                }
                elseif ($count > 0 && $count < 10)
                {
                    $str .= $base[$count] . ' ' . $unit[$i] . ' ';
                }
                
                $number -= $numeric[$i] * $count;

                $i++;
            }

            $str = preg_replace('/satu puluh (\w+)/i', '\1 belas', $str);
            $str = preg_replace('/satu (ribu|ratus|puluh|belas)/', 'se\1', $str);
            $str = preg_replace('/\s{2,}/', ' ', trim($str));
        }

        return $str;
    }

}
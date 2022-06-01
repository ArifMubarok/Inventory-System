<?php

namespace App\Helpers;

class DataHelper
{
  public static function yearDropdownData(int $minYear = 1990)
  {
    $arr = [];

    $thn_skr = date('Y');

    for ($thn = $thn_skr; $thn >= $minYear; $thn--) :
      $arr[$thn] = $thn;
    endfor;

    return $arr;
  }

  public static function filterDokumenData($data, string $params = null, string $value = null, string $operator = '==')
  {
    try {
      $data = collect($data);
      $filtered = $data->filter(function ($row, $key) use ($params, $value, $operator) {
        return eval("return \"" . data_get($row, $params) . "\" " . $operator . " \"" . $value . "\";");
      });

      return $filtered;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}

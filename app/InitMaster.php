<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InitMaster extends Model
{
    //
    public static function getDate()
    {
        $yearArr = [];
        $monthArr = [];
        $dayArr = [];
    
        $next_year = date('Y') + 1;
    
        for ($i = 1900; $i < $next_year; $i++) {
          $year = sprintf("%04d", $i);
          $yearArr[$year] = $year . "年";
        }
    
        for ($i = 1; $i < 13; $i++) {
          $month = sprintf("%02d", $i);
          $monthArr[$month] = $month . "月";
        }
    
        for ($i = 1; $i < 32; $i++) {
          $day = sprintf("%02d", $i);
          $dayArr[$day] = $day . "日";
        }
    
        return [$yearArr, $monthArr, $dayArr];
    }

    public static function getSex()
    {
      $sexArr = ['1' => '男性', '2' => '女性'];
      return $sexArr;
    }

    public static function getAmount()
    {
      $amountArr = [];
  
      for ($i = 1; $i < 100;$i++) {
        $amount = $i;
        $amountArr[$amount] = $amount . "個";
      }
  
      return $amountArr;
    }
}

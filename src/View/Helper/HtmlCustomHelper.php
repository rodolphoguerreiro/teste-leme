<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Text;

class HtmlCustomHelper extends Helper{

    public function minMonths(){
        $monthsKey = range(date('n'), 12);
        $monthsString = [];

        foreach($monthsKey as $key){
            $monthsString[$key] = __(date('F', mktime(0, 0, 0, $key, 10)));
        }

        return $monthsString;
    }

    public function minDays(){
        $totalDays = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
        $days = range(date('n'), $totalDays);

        return $days;
    }

}

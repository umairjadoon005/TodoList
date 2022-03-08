<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

    class Task extends Model
    {
        protected $table = 'tasks';
 
        public function getCreatedAtLocaleAttribute()
{
    $this->date=$this->getLocaleDate($this->created_at);
    return $this->date;
}
        public function getDeadLineLocaleAttribute()
{
 $this->date=$this->getLocaleDate($this->deadline);
    return $this->date;
}
public function getLocaleDate($date){
    $ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $ipInfo = file_get_contents('http://ip-api.com/json/'.$ip);
    $ipInfo = json_decode($ipInfo);
if(isset($ipInfo->timezone)){
    date_default_timezone_set($ipInfo->timezone);
    
$dt = new DateTime($date, new DateTimeZone('UTC'));
$this->date= $dt->setTimezone(new DateTimeZone($ipInfo->timezone))->date;
}
else{
$this->date=$date;
}
return $this->date;
}
    }
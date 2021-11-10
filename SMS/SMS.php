<?php
namespace App\SMS;



interface Payamak {
    public function registerSMS($u_id);
    public function reserveSMS($u_id,$p_id);
}

class SabaPayamak  implements Payamak{
    public $handle;

    public function __construct()
    {
        $this->handle = fopen(__DIR__."\sms.log","a+");
    }
    public function registerSMS($u_id){
        fwrite($this->handle,$u_id." has registered - sabapayamak\n");
    }
    public function reserveSMS($u_id,$p_id){
        fwrite($this->handle,$p_id." reserved a visit with ".$u_id." sabapayamak\n");
    }
}

class IranPayamak  implements Payamak{
    public $handle;

    public function __construct()
    {
        $this->handle = fopen(__DIR__."\sms.log","a+");
    }
    public function registerSMS($u_id){
        fwrite($this->handle,$u_id." has registered successfully ".date("Y-m-d")."- Iranpayamak service !\n");
    }
    public function reserveSMS($u_id,$p_id,$weekday=''){
        fwrite($this->handle,$p_id." reserved a visit with ".$u_id."on".$weekday." sabapayamak\n");
    }
}

class PayamakStrategy {
    protected $service;
   

    public function __construct(Payamak $service)
    {
        $this->service = $service;
    }

    public function register($u_id){
        $this->service->registerSMS($u_id);
    }
    public function reserve($u_id,$p_id,$weekday=''){
        $this->service->reserveSMS($u_id,$p_id,$weekday);
    }
}


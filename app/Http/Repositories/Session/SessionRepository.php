<?php


namespace App\Http\Repositories\Session;
use App\Models\Session;

class SessionRepository implements SessionInterface
{
    private $session;
    public function __construct(){
        $this->session = Session::class;
    }

    public function create($data){
        return  $this->session::create($data);
    }

    public function getCurrentSessionID($table_id){
        return $this->session::where('table_id',$table_id)
            ->where('end_time',null)->pluck('id')->last();
    }
}

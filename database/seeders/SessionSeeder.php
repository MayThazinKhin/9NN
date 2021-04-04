<?php

namespace Database\Seeders;

use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade as Session;
use App\Http\Services\Table\TableFacade as Table;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    public function run()
    {
        $data = $this->setSampleData();
        $session =  Session::create($data);
        if($session){
            Table::applyMarkerId($data['table_id'],$data['marker_id']);
            $order = JsonDecode($this->setOrderJasonString());
            Session::orderItems($order);
            $this->setPeriods($session->id);

        }
    }

    protected function setSampleData(){
        $data = [];
        $data['table_id'] = 1;
        $data['marker_id'] = 3;
        $data['start_time'] = '2020-04-04 00:00:00';
        $data['end_time'] = CurrentTime();
        return $data;
    }

    protected function setPeriods($session_id){
        Period::create([
            'start_time' => Carbon::now()->subMinutes(60),
            'end_time' => Carbon::now()->subMinutes(50) ,
            'session_id' => $session_id
        ]);
        Period::create([
            'start_time' => Carbon::now()->subMinutes(45),
            'end_time' => Carbon::now()->subMinutes(30) ,
            'session_id' => $session_id
        ]);
        Period::create([
            'start_time' => Carbon::now()->subMinutes(30),
            'end_time' => Carbon::now() ,
            'session_id' => $session_id
        ]);



    }
    protected function setOrderJasonString(){
        return '{
        "session_id": 1,
        "items": [
            {
                "id": 5,
                "count": 3
            },
            {
                "id": 6,
                "count": 3
            },
            {
                "id": 7,
                "count": 3
            }
        ]
    }';
    }
}

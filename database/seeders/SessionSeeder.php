<?php

namespace Database\Seeders;

use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade as Session;
use App\Http\Services\Table\TableFacade as Table;
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
        $data['start_time'] = CurrentTime();
        $data['end_time'] = CurrentTime();
        return $data;
    }

    protected function setPeriods($session_id){
        $s_data['session_id'] = $session_id ;
        PeriodFacade::start($s_data);
        $s_data['period_id'] = 1 ;
        PeriodFacade::end($s_data);
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

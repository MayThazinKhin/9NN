<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\Accounting;
use App\Http\Actions\Account\CustomAdding;
use App\Models\DailyCash;
use App\Models\Ledger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AccountController extends BasicController
{
    private $ledger;

    public function __construct()
    {
        $this->ledger = Ledger::class;
        parent::__construct($this->ledger, 'ledger', 'ledger');
    }

    public function index()
    {
        $daily_cash = $this->getOpeningCash(30);
        $opening = $daily_cash->opening;
        $closing = $daily_cash->closing;
        $types = (new Accounting())->primary();
        $cash_ids = (new Accounting())->getCashAccountID();
        $advanced_ids = (new Accounting())->getAdvancedAccountID();
        $accounts = (new Accounting())->getChildAccounts(4, 4);
        $ledgers = $this->ledger::
        whereNotIn('account_id',$cash_ids)
            ->where('cash_id',30)
        ->whereNotIn('account_id',$advanced_ids)
            ->orderBy('date', 'desc')->paginate(20);
        $data = $ledgers->items();
        $balance = $opening;
        foreach ($data as $item) {
            if ($item->type == 1) {
                $balance += $item->value;
            } else {
                $balance -= $item->value;
            }
            $item->balance = $balance;
        }
        return view('daily_transition.index', compact('types', 'ledgers', 'accounts', 'opening','closing'));
    }

    public function getBankBook(){
        $daily_cash = $this->getOpeningCash(31);
        $opening = $daily_cash->opening;
        $closing = $daily_cash->closing;
        $cash_ids = (new Accounting())->getCashAccountID();
        $advanced_ids = (new Accounting())->getAdvancedAccountID();
        $ledgers = $this->ledger::
        whereNotIn('account_id',$cash_ids)
            ->where('cash_id',31)
            ->whereNotIn('account_id',$advanced_ids)
            ->orderBy('date', 'desc')->paginate(20);
        $data = $ledgers->items();
        $balance = $opening;
        foreach ($data as $item) {
            if ($item->type == 1) {
                $balance += $item->value;
            } else {
                $balance -= $item->value;
            }
            $item->balance = $balance;
        }
        return view('daily_transition.bank_book', compact('ledgers', 'opening','closing'));
    }

    public function getOpeningCash($account_id)
    {
        $opening = 0;
        Carbon::now();
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $yesterday_closing = DailyCash::where('date',$yesterday)->pluck('closing')->first();
        if($yesterday_closing){
            $opening = $yesterday_closing;
        }
        return DailyCash::firstorCreate(
            ['date' => today(),
                'account_id' => $account_id], [
                'opening' => $opening,
                'closing'
            ]
        );
    }

    public function closing($account_id)
    {
        $daily_cash = $this->getOpeningCash($account_id);
        $opening = ($daily_cash) ? $daily_cash->opening : 0;
        $cash_ids = (new Accounting())->getCashAccountID();
        $advanced_ids = (new Accounting())->getAdvancedAccountID();
        $ledgers = $this->ledger::
        whereNotIn('account_id',$cash_ids)
            ->whereNotIn('account_id',$advanced_ids)
            ->where('cash_id',$account_id)
            ->get();
        $balance = $opening;
        foreach ($ledgers as $item) {
            if ($item->type == 1) {
                $balance += $item->value;
            } else {
                $balance -= $item->value;
            }
        }
        DailyCash::updateOrCreate(
            ['date' => today(), 'account_id' => $account_id],
            ['opening' => $opening, 'closing' => $balance]);

        return redirect('financial');
    }

    public function getDailyCash(){
        $route_name = Route::currentRouteName();
        $account_id = ($route_name == 'daily_cash') ? 30 :31;
        $cashes = DailyCash::where('account_id',$account_id)->paginate(20);
            return view('daily_transition.daily_cash',compact('cashes'));
    }

    public function monthly()
    {
        $start_date = Carbon::now()->format('Y-m-01');
        $end_date = Carbon::now()->format('Y-m-d');
        return $this->getAccountsWithValue($start_date, $end_date);
    }

    protected function getAccountsWithValue($start_date, $end_date)
    {
        $accounts = (new Accounting())->getAccountValueByDate($start_date, $end_date);
        return view('monthly_transition.index', compact('accounts'));
    }

    public function monthly_filter(Request $request)
    {
        return $this->getAccountsWithValue($request->start_date, $request->end_date);
    }

    public function type()
    {
        $types = (new Accounting())->primary();
        responseData('types', $types, 200);
    }

    public function title(Request $request)
    {
        $titles = (new Accounting())->secondary($request->type);
        return response()->json([
            'success' => true,
            'titles' => $titles
        ]);
    }

    public function create(Request $request)
    {
        (new CustomAdding($request->all()))->run();
        if (isset($request['is_redirect'])) {
            return redirect()->back();
        }
        return response()->json([
            'success' => true
        ]);
    }

    public function update(Request $request, Ledger $ledger)
    {
        return parent::updateData($request, $ledger);
    }

    public function delete(Ledger $ledger)
    {
        return parent::destroyData($ledger);
    }


}

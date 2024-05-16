<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //deposite form
    public function depositeForm()
    {
        return view('deposite');
    }
    // deposite functionalities
    public function deposite(Request $req)
    {
        $user = User::where('id', session('loggedUser'))->first();
        $lastAmount = $user->balance;
        $data = new Transaction();
        $data->user_id = session('loggedUser');
        $data->transaction_type = "deposite";
        $data->amount = $req->amount;
        $data->date = $req->date;
        $result = $data->save();
        if ($result) {
            $user->balance = $lastAmount + $data->amount;
            $user->save();
            return back()->with('success', 'you are deposited successfully');
        } else {
            return back()->with('Fail', 'something Went Wrong');
        }
    }
    //withdraw form
    public function withdrawForm()
    {
        return view('withdraw');
    }
    //withdraw functionalities
    public function withdraw(Request $req)
    {
        //current month amount withdrawl
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $transactions = Transaction::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('transaction_type','=','withdraw')
            ->get();
            $totalWithdrawlAmount = $transactions->sum('amount');

            //total withdrawl
            $total = Transaction::where('transaction_type',"withdraw")->sum('amount');

        $user = User::where('id', session('loggedUser'))->first();
        $lastAmount = $user->balance;
        $data = new Transaction();
        $data->user_id = session('loggedUser');
        $data->transaction_type = "withdraw";
        $data->amount = $req->amount;
        if (date('D') == 'fri' || $req->amount <= 1000 || (($totalWithdrawlAmount)+ $req->amount) <= 5000 ) {
            $data->fee = 0;
        }else{
            if($user->account_type === 'Invidual'){
        
                $data->fee = ($req->amount * (15/1000));
            }else{
                if($user->account_type === 'Business' && $total >= 50000){
                
                    $data->fee = ($req->amount * (15/1000)); 
                }
                else{
                    $data->fee = ($req->amount * (25/1000));
                }
                
            }
        }
        
        $data->date = $req->date;
        $result = $data->save();
        if ($result) {
            $user->balance = (($lastAmount - $data->amount)-$data->fee);
            $user->save();
            return back()->with('success', 'your withdrawl successfully');
        } else {
            return back()->with('Fail', 'something Went Wrong');
        }
    }
}

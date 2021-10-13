<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Support\Arr;

use App\mail\EmailFirstExpress;


class GetEmailController extends Controller
{
 

    
public function GetDataUPdate(Request $request, $key)
{

        $nowTimeDate = Carbon::now();
        $newTime = Carbon::now()->subMinutes(7);
        $date = $nowTimeDate->format('Y-m-d');

        $addIn = Invoice::find($key);
        $addIn->dateInvoice =  $date;
        $addIn->save();
}

public function GetEmail(Request $request ,$key)
{

         $bill = DB::table('customers')
            ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
            ->orderBy('invoices.id', 'asc')
            ->where("invoices.id", $key)
            ->get();

            $mailUsr = $bill[0]->email;


            $details = [
                    'title' => 'Mail from FirstExpress.com',
                    'body' => 'This is for testing email using smtp'
                ];

        \Mail::to($mailUsr)->send(new \App\Mail\EmailFirstExpress($details));
}

public function GetMailGroup(Request $request)
{

    $idMail = $request->idView;

    $result = array();
    foreach ($idMail as $element) {
        $result[$element] = $element;
    }

   
    foreach($result as $key) {
       
        GetEmail($key);
        GetDataUPdate($key);
    }


    return response()->json(['messageEmail'=>'ส่ง Gmail เรียบร้อย']);
}

public function GetMailGroupTwo(Request $request)
{
      
    $idMail = $request->idView;

    $result = array();
    foreach ($idMail as $element) {
        $result[$element] = $element;
    }

   
    foreach($result as $key) {
       
        GetEmail($key);
    }


    return response()->json(['messageEmail'=>'ส่ง Gmail เรียบร้อย']);
}

public function GetMail($id)
{
    $key = $id;
 
    //GetEmail($key);
    GetDataUPdate($key);
    return redirect('list-charge')->with('messageEmail', 'ส่ง Gmail เรียบร้อย' );
}

   
 
}

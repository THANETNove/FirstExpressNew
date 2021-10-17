<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class ManageListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $manage = DB::table('transportations')
        ->get();
       // dd($manage);
        return view('managelist.index' , [ 'manage' => $manage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function apiManageList()
    {

      
       return view('managelist.apiManageList');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'begin' => ['required', 'string', 'max:255'],
            'end' => ['required', 'string', 'max:255'],
        ]);
       
        Transportation::create([
            'conditionName' =>  $request['name'],
            'begin' => $request['begin'],
            'end' => $request['end'],
            'area' => $request['area'],
            'scheduledTransport' => $request['transport'],
        ]);

        return redirect('manage-list')->with('message_status', 'เพิ่ม ข้อมูลเรียบร้อย' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function createOrder()
    {
        
        
        $Username = 'tests';
        $Password = '12345';
        $curl = curl_init();

        $dataArray = array(
            "orderId"  => "309155597",
            "invNo" => "309155597-8629",
            "barcode" => "EY660437537TH",
            "shipperName" => "สมใจ",
            "shipperAddress" => "111 หมู่ที่  1 อำเภอปลายพระยา ",
            "shipperDistrict"  => "ปลายพระยา ",
            "shipperProvince"  => "กระบี่",
            "shipperZipcode"  => "81160",
            "shipperEmail"  => "somjai@thailandpost.com",
            "shipperMobile"  => "02-2221122",
            "cusName"  => "พรมมาวัน",
            "cusAdd"  => "211/1 หมู่ที่ 11ถ.แจ้งวัฒนะ",
            "cusAmp"  => "หลักสี่",
            "cusProv"  => "กรุงเทพฯ",
            "cusZipcode"  => "10210",
            "cusTel"  => "023453333",
            "productPrice"  => "500",
            "productInbox"  => "-",
            "productWeight"  => "400",
            "orderType"  => "D",
            "manifestNo"  => "TPD20160309-0001",
            "merchantId"  => "TH0101",
            "merchantZipcode"  => "10120",
            "storeLocationNo"  => "RM-435",
            "insurance"  => "Y",
            "insuranceRatePrice"  => "500"
        );
 

         $URL = 'https://r_dservice.thailandpost.com/webservice/addItem';

         curl_setopt_array($curl,[
            CURLOPT_USERPWD => $Username .':' .$Password,
            CURLOPT_URL =>  $URL,
            CURLOPT_ENCODING => "gzip",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => count($dataArray),
            CURLOPT_POSTFIELDS => json_encode($dataArray),
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json"
            ],
        

         ]);

         $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
               echo "cURL Error #:" . $err;
            }else{
                echo $response;
            }
    
         
    }

     public function getLabel()
    {
        
        $Username = 'tests';
        $Password = '12345';
        $curl = curl_init();

        $dataArray = array(
           
        );
 

         $URL = 'https://r_dservice.thailandpost.com/webservice/LabelPDF?barcode=';

         curl_setopt_array($curl,[
            CURLOPT_USERPWD => $Username .':' .$Password,
            CURLOPT_URL =>  $URL,
            CURLOPT_ENCODING => "gzip",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POST => count($dataArray),
            CURLOPT_POSTFIELDS => json_encode($dataArray),
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json"
            ],
        

         ]);

         $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
               echo "cURL Error #:" . $err;
            }else{
                echo $response;
            }
    }


    public function cancelOrder()
    {
        
        $Username = 'tests';
        $Password = '12345';
        $curl = curl_init();

        $dataArray = array(
            "barcode" => "EY798011111TH"
        );
 

         $URL = 'https://r_dservice.thailandpost.com/webservice/cancelOrder';

         curl_setopt_array($curl,[
            CURLOPT_USERPWD => $Username .':' .$Password,
            CURLOPT_URL =>  $URL,
            CURLOPT_ENCODING => "gzip",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => count($dataArray),
            CURLOPT_POSTFIELDS => json_encode($dataArray),
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json"
            ],
        

         ]);

         $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
               echo "cURL Error #:" . $err;
            }else{
                echo $response;
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
           $id =  $request->id;
           $dataManage = Transportation::find($id);
          
           return response()->json(['message'=>  $dataManage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id  = $request->eid;
  
    
        $flight = Transportation::find($id);
        $flight->conditionName = $request->name;
        $flight->begin = $request->begin;
        $flight->end = $request->end;
        $flight->area = $request->area;
        $flight->scheduledTransport = $request->transport;
        $flight->save();

        return redirect('manage-list')->with('message_status', 'เเก้ไข ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $flightDes = Transportation::find($id);

        $flightDes->delete();

        return redirect('manage-list')->with('messageDestroy', 'ลบ ข้อมูลเรียบร้อย');
    }
}
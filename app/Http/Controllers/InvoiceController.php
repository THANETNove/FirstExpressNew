<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 
        $name = $request->name;
        $dataOut = $request->dataOut;//;
        $dataEnd = $request->dataEnd;//;
      
        $invoiceUser = DB::table('invoices')
        ->select('name')
        ->distinct()
        ->get();
/*
        $bill = DB::table('invoices')
        ->leftJoin('customers', 'invoices.name', '=', 'customers.name_customer')
        ->get();*/


        if ($name) {
                if ($dataOut) {
                    if ($dataEnd) {

                        $bill = DB::table('customers')
                        ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                        ->where("name", 'LIKE', '%'.$name. '%')
                        ->where('issuedDateIssue','>=', $dataOut)
                        ->where('dateDue','<=', $dataEnd)
                        ->where("status", '=', 'due')
                        ->orderBy('invoices.id', 'asc')
                        ->get();
    
                     return view('bill.list_invoice' , ['bill' => $bill , 'invoiceUser' => $invoiceUser]);
                    
                    }else{

                        $bill = DB::table('customers')
                        ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                        ->where("name", 'LIKE', '%'.$name. '%')
                        ->where('issuedDateIssue','>=', $dataOut)
                        ->where("status", '=', 'due')
                        ->orderBy('invoices.id', 'asc')
                        ->get();
    
                     return view('bill.list_invoice' , ['bill' => $bill , 'invoiceUser' => $invoiceUser]);

                    }

                }else{

                    $bill = DB::table('customers')
                        ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                        ->where("name", 'LIKE', '%'.$name. '%')
                        ->where("status", '=', 'due')
                        ->orderBy('invoices.id', 'asc')
                        ->get();
 
                    return view('bill.list_invoice' , ['bill' => $bill , 'invoiceUser' => $invoiceUser]);

                }
          
        }else{

            $bill = DB::table('customers')
            ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
            ->orderBy('invoices.id', 'asc')
            ->where("status", '=', 'due')
            ->get();
           // dd( $bill );
      
            return view('bill.list_invoice' , ['bill' => $bill , 'invoiceUser' => $invoiceUser]);
        }
        
        
    }
    

   



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   

   
       // dd($userName,$userAddress);
        $invoice = DB::table('invoices')
        ->count();
        //->get();
       
       

            if ($invoice !== 0) {
                

                $sale = DB::table('invoices')
                ->orderByDesc('id')
                
                 ->get();

                $bnNumber =  $sale[0]->documentThat;
                $substrBn =  substr($bnNumber, 3);
               // $intNumber = (int)$substrBn;
                $countInvoice = 'BN-'  ."". ($substrBn + 1);
           //  dd( $countInvoice, $substrBn );
            } else {

                 $countInvoice = 'BN-1000000001';
                    

            }
   
        $user = Customer::findOrFail($id);
       // $userName = $user->name_customer;
        //dd($userName);

       return view('bill.invoice' ,[ 'countInvoice' => $countInvoice, 'user' => $user]);
    }

    public function list_charge(Request $request)
    {
        
        $invoiceName = DB::table('invoices')
        ->select('name')
        ->distinct()
        ->where("status", '=', 'Unpaid')
        ->get();

        $invoiceDocumentThat = DB::table('invoices')
        ->select('documentThat')
        ->distinct()
        ->where("status", '=', 'Unpaid')
        ->get();

        $invoiceStatus = DB::table('invoices')
        ->select('status')
        ->distinct()
        ->where("status", '=', 'Unpaid')
        ->get();


        $data = $request->all();

        if ($data) {
                    $name =   $request->name;
                    $documentThat = $request->documentThat;
                    $status = $request->status;
                    $search = $request->search;
                    $dateOut = $request->dateOut;
                    $dateEnd = $request->dateEnd;



    

                if ($dateOut &&  $dateEnd) {
                    
                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '=', 'Null')
                    ->where('issuedDateIssue','>=', $dateOut)
                    ->where('dateDue','<=', $dateEnd)
                    ->orderBy('invoices.id', 'asc')
                    ->get();

                }else if ( $dateOut &&  $dateEnd &&  $name) {

                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '=', 'Null')
                    ->where('issuedDateIssue','>=', $dateOut)
                    ->where('dateDue','<=', $dateEnd)
                    ->where("name", 'LIKE', '%'.$name. '%')
                    ->orWhere("documentThat", 'LIKE', '%'.$documentThat. '%')
                    ->orderBy('invoices.id', 'asc')
                    ->get();

                }else if ($search){

                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("name", 'LIKE', '%'.$search. '%')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '=', 'Null')
                    ->orderBy('invoices.id', 'asc')
                    ->get();

                }else if ($name) {
                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("name", 'LIKE', '%'.$name. '%')
                    ->orWhere("documentThat", 'LIKE', '%'.$documentThat. '%')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '=', 'Null')
                    ->orderBy('invoices.id', 'asc')
                    ->get();
                }else{
                   
                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '=', 'Null')
                    ->orderBy('invoices.id', 'asc')
                    ->get();
                }


                 
        }else{
              
            $billData = DB::table('customers')
            ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
            ->orderBy('invoices.id', 'asc')
            ->where("status", '=', 'Unpaid')
            ->where("dateInvoice", '=', 'Null')
            ->get();
           
        }

        return view('bill.list_charge' ,[ 'invoiceName' => $invoiceName, 'invoiceDocumentThat' => $invoiceDocumentThat , 'invoiceStatus' => $invoiceStatus ,'billData' => $billData]);

       
    }

    public function receipt_list(Request $request)
    {


        $invoiceName = DB::table('invoices')
        ->select('name')
        ->distinct()
        ->where("status", '=', 'Unpaid')
        ->get();

        $invoiceDocumentThat = DB::table('invoices')
        ->select('documentThat')
        ->distinct()
        ->where("status", '=', 'Unpaid')
        ->get();

        $invoiceStatus = DB::table('invoices')
        ->select('status')
        ->distinct()
        ->where("status", '=', 'Unpaid')
        ->get();


        $data = $request->all();

        if ($data) {
                    $name =   $request->name;
                    $documentThat = $request->documentThat;
                    $status = $request->status;
                    $search = $request->search;
                    $dateOut = $request->dateOut;
                    $dateEnd = $request->dateEnd;



    

                if ($dateOut &&  $dateEnd) {
                    
                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '!=', 'Null')
                    ->where('issuedDateIssue','>=', $dateOut)
                    ->where('dateDue','<=', $dateEnd)
                    ->orderBy('invoices.id', 'asc')
                    ->get();

                }else if ( $dateOut &&  $dateEnd &&  $name) {

                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '!=', 'Null')
                    ->where('issuedDateIssue','>=', $dateOut)
                    ->where('dateDue','<=', $dateEnd)
                    ->where("name", 'LIKE', '%'.$name. '%')
                    ->orWhere("documentThat", 'LIKE', '%'.$documentThat. '%')
                    ->orderBy('invoices.id', 'asc')
                    ->get();

                }else if ($search){

                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("name", 'LIKE', '%'.$search. '%')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '!=', 'Null')
                    ->orderBy('invoices.id', 'asc')
                    ->get();

                }else if ($name) {
                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("name", 'LIKE', '%'.$name. '%')
                    ->orWhere("documentThat", 'LIKE', '%'.$documentThat. '%')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '!=', 'Null')
                    ->orderBy('invoices.id', 'asc')
                    ->get();
                }else{
                   
                    $billData = DB::table('customers')
                    ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
                    ->where("status", '=', 'Unpaid')
                    ->where("dateInvoice", '!=', 'Null')
                    ->orderBy('invoices.id', 'asc')
                    ->get();
                }


                 
        }else{
              
            $billData = DB::table('customers')
            ->rightJoin('invoices', 'customers.name_customer', '=', 'invoices.name')
            ->orderBy('invoices.id', 'asc')
            ->where("status", '=', 'Unpaid')
            ->where("dateInvoice", '!=', 'Null')
            ->get();
           
        }

        return view('bill.receipt_list',[ 'invoiceName' => $invoiceName, 'invoiceDocumentThat' => $invoiceDocumentThat , 'invoiceStatus' => $invoiceStatus ,'billData' => $billData]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());

        
        Invoice::create([
            'issuedDateIssue' => $request['issuedDateIssue'],
            'dateDue' => $request['dateDue'],
            'documentThat' => $request['documentThat'],
            'refer' => $request['refer'],
            'tag' => $request['tag'],
            'datajson' => json_encode($request['datajson']),
            'name' => $request['name'],
            'address' => $request['address'],
            'totalItems' => $request['totalItems'],
            'priceGoods' => $request['priceGoods'],
            'vat' => $request['vat'],
            'netTotal' => $request['netTotal'],
            'status' =>  'due',
            'emailing' =>  'Sent',
            'dateInvoice' =>  'Null',
            
        ]);

        return response()->json(['message'=>'บันทึก เรียบร้อย']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('asdsadas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     
        return view('bill.editInvoice' ,['id' => $id]);
    }


    public function getData(Request $request)
    {

        $id = $request->id_data;

        $dataInvoice = Invoice::findOrFail($id);

        return response()->json(['data'=> $dataInvoice]);

     //   dd('55555', $invoice);
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

 
       
        $id = $request->id;
      //  dd($id);

        $addIn = Invoice::find( $id);
  
       // dd($flight);
    
        $addIn->issuedDateIssue = $request->issuedDateIssue;
        $addIn->dateDue = $request->dateDue;
        $addIn->documentThat = $request->documentThat;
        $addIn->refer = $request->refer;
        $addIn->tag = $request->tag;
        $addIn->datajson = json_encode($request['datajson']);
        $addIn->name = $request->name;
        $addIn->address = $request->address;
        $addIn->totalItems = $request->totalItems;
        $addIn->priceGoods = $request->priceGoods;
        $addIn->vat = $request->vat;
        $addIn->netTotal = $request->netTotal;
        
        

    
        $addIn->save();

        return response()->json(['message'=>'เเก้ไข เรียบร้อย']);

    }


    public function updateStatus(Request $request)
    {

        
      
       $data = $request->idjson;
 
  
    
        foreach ($data as $product) {
            $addIn = Invoice::find($product);
            $addIn->status = 'Unpaid';
            $addIn->save();
        }
      
            
  

    

  
    }



    public function createPDF($id) {
       

       // dd($id);
        // retreive all records from db
        $data = $addIn = Invoice::find($id);
        // share data to view

        //dd($data);
        view()->share('employee',$data);
        $pdf = PDF::loadView('bill.invoicePDF', $data);
  
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
      }



           
    public function charge($id)
    {

        $data  = Invoice::find($id);
        return view('bill.charge' ,$data);
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
       }
  


  


     
    /**
    * @return \Illuminate\Support\Collection
    */
 

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
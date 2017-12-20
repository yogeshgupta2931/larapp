<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\SharePurchase;

class SharePurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $shares = SharePurchase::where('user_id',Auth::user()->id)->orderBy('created_at','asc')->paginate(env('APP_PAGE_LIMIT'));
        return view('share-purchase.index')->with('shares', $shares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sharepurchase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'company_name'          => 'required|max:150',
            'instrument_name'       => 'required|max:150',
            'quantity'              => 'required|numeric',
            'price'                 => 'required|numeric',
            'total_investment'      => 'required|numeric',
            'certificate_number'    => 'required|numeric',
            'transaction_date'      => 'required|date'
        ]);

        SharePurchase::create([
            'company_name'          => request('company_name'),
            'instrument_name'       => request('instrument_name'),
            'quantity'              => request('quantity'),
            'price'                 => request('price'),
            'total_investment'      => request('total_investment'),
            'certificate_number'    => request('certificate_number'),
            'transaction_date'      => request('transaction_date'),
            'user_id'               => Auth::user()->id
        ]);

        return redirect()->route('listSharePurchase')->with('success','Share Purchase created successfully!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sharePurchase = SharePurchase::getUserSharePurchase($id);
        if(empty($sharePurchase)){
            return redirect()->route('listSharePurchase')->with('error','Invalid share purchase. Try again!');
        }
        return view('share-purchase.create',['sharePurchase'=>$sharePurchase]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $sharePurchase = SharePurchase::getUserSharePurchase($id);
        if(empty($sharePurchase)){
            return redirect()->route('listSharePurchase')->with('error','Invalid share purchase. Try again!');
        }
        $sharePurchase->company_name        = $request->company_name;
        $sharePurchase->instrument_name     = $request->instrument_name;
        $sharePurchase->quantity            = $request->quantity;
        $sharePurchase->price               = $request->price;
        $sharePurchase->total_investment    = $request->total_investment;
        $sharePurchase->certificate_number  = $request->certificate_number;
        $sharePurchase->transaction_date    = $request->transaction_date;

        $sharePurchase->save();

        return redirect()->route('listSharePurchase')->with('success','Share Purchase updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sharePurchase = SharePurchase::getUserSharePurchase($id);
        if(empty($sharePurchase)){
            return redirect()->route('listSharePurchase')->with('error','Invalid share purchase. Try again!');
        }
        $sharePurchase->delete();
        return redirect()->route('listSharePurchase')->with('success','Share Purchase deleted successfully');
    }
}

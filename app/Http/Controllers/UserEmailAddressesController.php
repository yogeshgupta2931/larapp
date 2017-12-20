<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User ;
use App\UserEmailAddress;

class UserEmailAddressesController extends Controller
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
        $user               = User::find(Auth::user()->id);
        $userEmailAddresses = $user->emailAddresses;
        return view('user-email-address.index')->with('userEmailAddresses', json_decode($userEmailAddresses, true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user-email-address.create');
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
            'email_address' => 'required|unique:user_email_addresses|max:150',
            'is_default'    => 'required'
        ]);
        UserEmailAddress::create([
            'email_address' => request('email_address'),
            'is_default'    => request('is_default'),
            'user_id'       => Auth::user()->id
        ]);

        return redirect()->route('listUserEmailAddress')->with('success','Email Address created successfully!');
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
        $userEmailAddress = UserEmailAddress::getUserEmailAddress($id);
        if(empty($userEmailAddress)){
            return redirect()->route('listUserEmailAddress')->with('error','Invalid user email address. Try again!');
        }
        return view('user-email-address.create',['userEmailAddress'=>$userEmailAddress]);
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
        $userEmailAddress = UserEmailAddress::getUserEmailAddress($id);
        if(empty($userEmailAddress)){
            return redirect()->route('listUserEmailAddress')->with('error','Invalid user email address. Try again!');
        }

        $userEmailAddress->email_address    = $request->email_address;
        $userEmailAddress->is_default       = $request->is_default;

        $userEmailAddress->save();

        return redirect()->route('listUserEmailAddress')->with('success','Email Address updated successfully');

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
        $userEmailAddress = UserEmailAddress::getUserEmailAddress($id);
        if(empty($userEmailAddress)){
            return redirect()->route('listUserEmailAddress')->with('error','Invalid user email address. Try again!');
        }
        $userEmailAddress->delete();
        return redirect()->route('listUserEmailAddress')->with('success','Email Address deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Hash;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Customer::paginate(10);

        return view('admin.customer.list', ['users' => $users]); // user trong ngoc la bien ben view. $users la truyen vao bien users ben view.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'txt_ten' => 'required',
            'txt_email' => 'required|unique:users,email',

        ], [
            'txt_ten.required' => 'Cần phải nhập tên người dùng.',
            'txt_email.required' => 'Cần phải nhập email người dùng.',
            'txt_email.unique' => 'Email đã tồn tại. Nhâp email khác.'
        ]);
        $user = new Customer();
        
        $user->name = $request->txt_ten;
        $user->email = $request->txt_email;
        $user->phone = $request->txt_sdt;
        $user->dia_chi = $request->txt_diachi;
        $user->password = Hash::make($request->txt_matkhau);
        if($request->txt_phan_quyen != ""){
        	$user->phan_quyen = $request->txt_phan_quyen;
        }
        else{
        	$user->phan_quyen = NULL;
        }
        
        $user->save();

        return redirect()->route('customer.index')->with(['messages' => 'Thêm mới người dùng thành công!!']);

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
        $user = Customer::findOrFail($id);

        return view('admin.Customer.edit', ['user' => $user]);
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
        $this->validate($request, [
            'txt_ten' => 'required',

        ], [
            'txt_ten.required' => 'Cần phải nhập tên người dùng.',
        ]);
        $user = Customer::findOrFail($id);
        $user->password = Hash::make($request->txt_password);
        $user->name = $request->txt_ten;
        $user->phone = $request->txt_sdt;
        $user->save();

        return redirect()->route('customer.index')->with(['messages' => 'Cập nhật người dùng thành công!!']);
    }

    public function postProfile() {
         $this->validate($request, [
            'txt_ten' => 'required',

        ], [
            'txt_ten.required' => 'Cần phải nhập tên người dùng.',
        ]);
        $user = Customer::findOrFail($id);

        $user->name = $request->txt_ten;
        $user->phone = $request->txt_sdt;
        $user->address = $request->txt_diachi;
        $user->save();

        return redirect()->back()->with(['messages' => 'Cập nhật người dùng thành công!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Customer::findOrFail($id);
        $user->delete();
        return redirect()->route('customer.index')->with(['messages' => 'Xoá người dùng thành công!!']);

    }
}

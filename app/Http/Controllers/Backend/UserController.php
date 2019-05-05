<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.list', ['users' => $users]); // user trong ngoc la bien ben view. $users la truyen vao bien users ben view.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
        $user = new User();
        
        $user->username = $request->txt_ten;
        $user->email = $request->txt_email;
        $user->phone = $request->txt_sdt;
        $user->address = $request->txt_diachi;
        $user->password = Hash::make($request->txt_matkhau);
        $user->save();

        return redirect()->route('users.index')->with(['messages' => 'Thêm mới người dùng thành công!!']);

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
        $user = User::findOrFail($id);

        return view('admin.user.edit', ['user' => $user]);
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
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->txt_password);
        $user->name = $request->txt_ten;
        $user->phone = $request->txt_sdt;
        $user->save();

        return redirect()->route('users.index')->with(['messages' => 'Cập nhật người dùng thành công!!']);
    }

    public function profile() {
        if (Auth::check()) {

            $user = User::findOrFail(Auth::user()->id);

            return view('admin.user.edit', ['user' => $user]);
        }
    }

    public function postProfile() {
         $this->validate($request, [
            'txt_ten' => 'required',

        ], [
            'txt_ten.required' => 'Cần phải nhập tên người dùng.',
        ]);
        $user = User::findOrFail($id);

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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with(['messages' => 'Xoá người dùng thành công!!']);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Customer, DB, Hash;

class CustomerController extends Controller
{
    public function login(){
   	    return view('pages.auth.login');
    }


    public function postLogin (Request $request) {
      $this->validate($request, [
          'email'    => 'required|string',
          'password' => 'required|string',
      ], [
          'email.required'    => 'Tài khoản không được bỏ trống',
          'password.required' => 'Mật khẩu không được bỏ trống',
          'email.string'      => 'Tài khoản phải không có kí tự đặc biệt',
          'password.string'   => 'Mật khẩu không được bỏ trống'
      ]);

      if(Auth::guard('customer')
          ->attempt(['email' => $request->email, 'password' => $request->password])) {

          return redirect()->route('home.index');
      }
      else {
          throw \Illuminate\Validation\ValidationException::withMessages([
              'email'  => 'Tài khoản không không hợp lệ',
              'password' =>'Mật khẩu không hợp lệ'
          ]);
      }
    }

    public function register() {
        return view('pages.auth.register');
    }

    public function postRegister(Request $request) {
          $rules = array(
              'name'     => 'between:1,255',
              'email'    => 'between:1,255|email|unique:customers,email',
              'phone'    => 'required',
              'password' => 'between:8,32|same:confirm_password'
          );
          $messages = array(
            'name.between' => "Tên người dùng phải từ 1 đến 255 kí tự",
            'email.between' => "Email người dùng phải từ 1 đến 255 kí tự",
            'email.email' => "Email người dùng phải đúng định dạng",
            'email.unique' => "Email đã có người sử dụng",
            'phone.between' => "Tên người dùng phải từ 1 đến 255 kí tự",
            'password.between' => "Mật khẩu người dùng từ 8 đến 32 kí tự",
            'password.same' => "Mật khẩu nhập lại không đúng",
          );
 

          $this->validate($request, $rules, $messages);

          DB::beginTransaction();
          $customerModel = new Customer();
          try {
              $customerModel->name     = $request->name;
              $customerModel->email    = $request->email;
              $customerModel->phone    = $request->phone;
              $customerModel->password = Hash::make($request->password);
              $customerModel->save();

              DB::commit();
              Auth::guard('customer')->login($customerModel);

              return redirect()->route('home.index');
          } catch (Exception $e) {

              DB::rollback();
          }
    }

    public function logout (Request $request) {
      Auth::guard('customer')->logout();
      
      $request->session()->invalidate();

      return redirect()->route('home.index');
    }
}

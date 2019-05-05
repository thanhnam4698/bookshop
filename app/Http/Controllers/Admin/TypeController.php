<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BookDetail;
use App\BookContent;
use App\Booktype;
use App\BookTopic;

class TypeController extends Controller
{
    //
     public function getListtype(){
     	$theloai= Booktype::all();
    	return view('admin.Type.list',['theloai'=>$theloai]);
    }


    
    public function getAddtype(){
    	return view('admin.Type.add');
    }
    public function postAddtype(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|unique:loai_sach,ten_loai|min:3|max:100'
            ],
            [
                'Ten.requered'=>'bạn chưa nhập thể loại',
                'Ten.min'=>'tên thể loại phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.max'=>'tên thể loại phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.unique'=>'tên thể loại đã tồn tại'
            ]
        );
        $theloai = new Booktype;
        $theloai->ten_loai = $request->Ten;
         $theloai->gioi_thieu = $request->gioithieu;
         $theloai->save();
         return redirect('admin/Type/add')->with('thongbao','thêm thành công');
    }
    public function getEdittype($id){
    	$theloai= Booktype::find($id);
        return view('admin.Type.edit',['theloai'=>$theloai]);
    }

     public function postEdittype(Request $request, $id){
        $theloai=Booktype::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100'
            ],
            [
                'Ten.required'=>'bạn chưa nhập thể loại',
                'Ten.min'=>'tên thể loại phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.max'=>'tên thể loại phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.unique'=>'tên thể loại đã tồn tại'
            ]  
        );
        $theloai->ten_loai = $request->Ten;
        $theloai->gioi_thieu = $request->gioithieu;
        $theloai->save();
        return redirect('admin/Type/edit/'.$id)->with('thongbao','sửa thành công');

      

    }
    public function getxoatype($id)
    {
        $theloai = Booktype::find($id);
        $theloai->delete();

        return redirect('admin/Type/list') ->with('thongbao','bạn đã xóa thành công');

    }
}

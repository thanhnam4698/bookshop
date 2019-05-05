<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookDetail;
use App\BookContent;
use App\Booktype;
use App\BookTopic;

class ContentController extends Controller
{
    //
    public function getListContent(){
     	$theloai= BookContent::all();
    	return view('admin.type.topic.content.list',['theloai'=>$theloai]);
    }


    
    public function getAddContent(){
    	return view('admin.type.topic.content.add');
    }
    public function postAddContent(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|unique:noi_dung,ten_noi_dung|min:3|max:100'
            ],
            [
                'Ten.requered'=>'bạn chưa nhập nội dung',
                'Ten.min'=>'tên nội dung phải có đọ dài từ 3 cho đến 100 ký tự',
                'Ten.max'=>'tên nội dung phải có đọ dài từ 3 cho đến 100 ký tự',
                'Ten.unique'=>'tên nội dung đã tồn tại'
            ]
        );
        $theloai = new BookContent;
        $theloai->ten_noi_dung = $request->Ten;
         $theloai->description = $request->gioithieu;
         $theloai->save();
         return redirect('admin/Content/add')->with('thongbao','thêm thành công');
    }
    public function getEditContent($id){
    	$theloai= BookContent::find($id);
        return view('admin.type.topic.content.edit',['theloai'=>$theloai]);
    }

     public function postEditContent(Request $request, $id){
        $theloai=BookContent::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100'
            ],
            [
                'Ten.required'=>'bạn chưa nhập nội dung',
                'Ten.min'=>'tên nội dung phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.max'=>'tên nội dung phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.unique'=>'tên nội dung đã tồn tại'
            ]  
        );
        $theloai->ten_noi_dung = $request->Ten;
        $theloai->description = $request->gioithieu;
        $theloai->save();
        return redirect('admin/Content/edit/'.$id)->with('thongbao','sửa thành công');

      

    }
    public function getDeleteContent($id)
    {
        $theloai = BookContent::find($id);
        $theloai->delete();

        return redirect('admin/Content/list') ->with('thongbao','bạn đã xóa thành công');

    }
}

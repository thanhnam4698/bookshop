<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookDetail;
use App\BookContent;
use App\Booktype;
use App\BookTopic;

class TopicController extends Controller
{
    //
    public function getListTopic(){
     	$theloai= BookTopic::all();
    	return view('admin.type.topic.list',['theloai'=>$theloai]);
    }


    
    public function getAddTopic(){
    	return view('admin.type.topic.add');
    }
    public function postAddTopic(Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|unique:loai_sach,ten_chu_du|min:3|max:100'
            ],
            [
                'Ten.requered'=>'bạn chưa nhập chủ đề',
                'Ten.min'=>'tên chủ đề phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.max'=>'tên chủ đề phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.unique'=>'tên chủ đề đã tồn tại'
            ]
        );
        $theloai = new BookTopic;
        $theloai->ten_chu_de = $request->Ten;
         $theloai->description = $request->gioithieu;
         $theloai->save();
         return redirect('admin/Topic/add')->with('thongbao','thêm thành công');
    }
    public function getEditTopic($id){
    	$theloai= BookTopic::find($id);
        return view('admin.type.topic.edit',['theloai'=>$theloai]);
    }

     public function postEditTopic(Request $request, $id){
        $theloai=BookTopic::find($id);
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100'
            ],
            [
                'Ten.required'=>'bạn chưa nhập chủ đề',
                'Ten.min'=>'tên chủ đề phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.max'=>'tên chủ đề phải có đọ dài từ 3 cho đến 100 hý tự',
                'Ten.unique'=>'tên chủ đề đã tồn tại'
            ]  
        );
        $theloai->ten_chu_de = $request->Ten;
        $theloai->description = $request->gioithieu;
        $theloai->save();
        return redirect('admin/Topic/edit/'.$id)->with('thongbao','sửa thành công');

      

    }
    public function getDeleteTopic($id)
    {
        $theloai = BookTopic::find($id);
        $theloai->delete();

        return redirect('admin/Topic/list') ->with('thongbao','bạn đã xóa thành công');

    }
}

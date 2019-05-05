<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BookDetail;
use App\Booktype;
use App\Author;
use App\Publisher;
use App\BookContent;
use App\BookTopic;



class BookController extends Controller
{
    //
    public function getList(){
    	$book = BookDetail::all();
    	return view('admin.book.list',['book'=>$book]);
    }
    public function getAdd(){
        $author = Author::all();
        $pub = Publisher::all();
        $type = Booktype::all();
        $topic = BookTopic::all();
        $content = BookContent::all();
    	return view('admin.book.add',['author'=>$author, 'pub'=>$pub, 'type'=>$type]);
    }
    public function getEdit($id){
        $book = BookDetail::find($id);
        $author = Author::all();
        $pub = Publisher::all();
        $type = Booktype::all();
        $topic = BookTopic::all();
        $content = BookContent::all();
    	return view('admin.book.edit',['book'=>$book,'author'=>$author,'pub'=>$pub, 'type'=>$type, 'topic'=>$topic, 'cont'=>$content]);
    }
    public function postEdit(Request $rq, $id){
        $book = BookDetail::find($id);
        $this->validate($rq,[
            'NameBook'=>'required',
            'Price'=>'required',
            'Amount'=>'required',
            ],[
            'NameBook.required'=>'Please enter Name of Book',
            'Price.required'=>'Please enter Price of Book',
            'Amount.required'=>'Please enter Amount of Book',
            ]);
        

        
        $book->ten_sach = $rq->NameBook;
        $extension = ['jpg','png','jpeg','end'];
        if($rq->hasFile('Avatar')){
            $file = $rq->file('Avatar');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if($key == 'end'){
                    return redirect('admin/book/edit')->with('Warning','Just except .jpg, .png, .jpeg');
                    
                }
                else if($duoi == $key){
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $name2 = str_random(4)."_".$name;
            while (file_exists("upload/images/".$name2)) {
                # code...
                $name2 = str_random(4)."_".$name;
            }
            $file->move("upload/images",$name2);
            $book->anh_bia = $name2;
        }
        $book->gioi_thieu = $rq->Description;
        $book->tac_gia_id = $rq->Author;
        $book->nha_xb_id = $rq->Publisher;
        $book->noi_dung_sach_id = $rq->Content;
        $book->ngay_phat_hanh = $rq->ReleaseDate;
        $book->kich_thuoc = $rq->Size;
        $book->trong_luong = $rq->Weight;
        $book->so_trang = $rq->PageNumber;
        $book->do_tuoi = $rq->Age;
        $book->gia_sach = $rq->Price;
        $book->so_luong = $rq->Amount;
        $book->khac = $rq->Other;
        $book->save();

        return redirect(route('admin.edit',$id))->with('Information','Upload Successful');
    }


    public function getDelete($id){
        $book = BookDetail::find($id);
        $book->delete();
        return redirect('admin/book/list')->with('Information','Selete Successful');
    }

    
    public function postAdd(Request $rq){
        $this->validate($rq,[
            'NameBook'=>'required',
            'Avatar'=>'required',
            'Price'=>'required',
            'Amount'=>'required',
            ],[
            'NameBook.required' =>'Please enter Name of Book',
            'Avatar.required' =>'Please enter Image of Book',
            'Price.required' =>'Please enter Price of Book',
            'Amount.required' =>'Please enter Amount of Book',
            ]);
        

        $book = new BookDetail;
        $book->ten_sach = $rq->NameBook;
        $extension = ['jpg','png','jpeg','end'];

        if($rq->hasFile('Avatar')){
            $file = $rq->file('Avatar');
            $duoi = $file->getClientOriginalExtension();
            foreach ($extension as $key) {
                # code...
                if($key == 'end'){
                    return redirect('admin/book/add')->with('Warning','Just except .jpg, .png, .jpeg');
                    
                }
                else if($duoi == $key){
                    break;
                }
            }
            $name = $file->getClientOriginalName();
            $name2 = str_random(4)."_".$name;
            while (file_exists("upload/images/".$name2)) {
                # code...
                $name2 = str_random(4)."_".$name;
            }
            $file->move("upload/images",$name2);
            $book->anh_bia = $name2;
        }
        else{
            $book->anh_bia = "";
        }   
        $book->gioi_thieu = $rq->Description;


        $book->tac_gia_id = $rq->Author;
        $book->nha_xb_id = $rq->Publisher;
        $book->loai_sach_id = $rq->Type;
        $book->chu_de_sach_id = $rq->Topic;
        $book->noi_dung_sach_id = $rq->Content;
        $book->ngay_phat_hanh = $rq->ReleaseDate;
        $book->kich_thuoc = $rq->Size;
        $book->trong_luong = $rq->Weight;
        $book->so_trang = $rq->PageNumber;
        $book->do_tuoi = $rq->Age;
        $book->gia_sach = $rq->Price;
        $book->so_luong = $rq->Amount;
        $book->khac = $rq->Other;
        $book->save();
        return redirect('admin/book/add')->with('Information','Upload Successful');
    }
}

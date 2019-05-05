<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookDetail;
use App\Booktype;
use App\BookTopic;
use App\BookContent;

class ClassifyBookController extends Controller
{
    //
    public function getTheLoai($id_theloai = null){
        $limit = 12;
        $theloai = Booktype::where('slug',$id_theloai)->first();
        $id = $theloai->id;
    	$books = BookDetail::where('loai_sach_id',$id)->paginate($limit);
        //dd($books);
    	
    	return view('pages.classify.theloai',['books'=>$books, 'loaisach'=>$theloai]);
    }
    public function getChuDe($id_chude = null){
        $limit = 12;
        $chude = BookTopic::where('slug',$id_chude)->first();
        $id = $chude->id;
    	$book = BookDetail::where('chu_de_sach_id',$id)->paginate($limit);
    	return view('pages.classify.chude',['book'=>$book, 'chude'=>$chude]);
    }
    public function getNoiDung($id_noidung = null){
        $limit = 12;
        $noidung = BookContent::where('slug', $id_noidung)->first();
        $id = $noidung->id;
    	$book = BookDetail::where('noi_dung_sach_id',$id)->paginate($limit);
    	
    	return view('pages.classify.noidung',['book'=>$book, 'noidung'=>$noidung]);
    }
}

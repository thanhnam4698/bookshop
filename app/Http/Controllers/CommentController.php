<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\BookDetail;
use App\ReplyComment;

class CommentController extends Controller
{
    //
    public function postComment(Request $rq, $iduser, $idbook){
   		// $cmt = new Comment;
   		// $cmt->noi_dung = $rq->content_cmt;
   		// $cmt->chi_tiet_sach_id = $idbook;
   		// $cmt->nguoi_dung_id = $iduser;
   		// $cmt->save();
   		echo 'something';
   		// return back()->withInput();
    }

    public function postAddComment(Request $request, $id, $id_sach){
        $this->validate($request,
            [
                'content_cmt'=>'required|min:1|max:400',
            ],
            [
                'content_cmt.required'=>'bạn chưa nhập comment',
                'content_cmt.min'=>'comment phải có độ dài từ 1 cho đến 400 hý tự',
                'content_cmt.max'=>'comment phải có độ dài từ 1 cho đến 400 hý tự',
            ]
        );
        $cmt = new Comment;
        $cmt->noi_dung = $request->content_cmt;
        $cmt->nguoi_dung_id = $id;
        $cmt->chi_tiet_sach_id = $id_sach;
        $cmt->save();

        $book = BookDetail::find($id_sach);
        return back()->withInput();
    }

    public function postEditComment(Request $rq, $id_cmt){
      $this->validate($rq,
        [
            'content_cmt'=>'required|min:1|max:400',
        ],
        [
            'content_cmt.required'=>'Bạn chưa nhập comment',
            'content_cmt.min'=>'Comment phải có độ dài từ 1 cho đến 400 hý tự',
            'content_cmt.max'=>'Comment phải có độ dài từ 1 cho đến 400 hý tự',
        ]
      );
      $cmt = Comment::find($id_cmt);
      $cmt->noi_dung = $rq->content_cmt;
      $cmt->save();
      return back()->withInput();
    }

    public function getDeleteComment($id_cmt)
    {
      $cmt = Comment::find($id_cmt);
      
      // $cmt=>Delete();
      if($cmt == ""){
        echo"comment này không phải của bạn";
      }else{
        $cmt->delete();
      }
      return back()->withInput();
    }

    public function postReplyComment(Request $rq, $id_cmt, $id_user){
      $this->validate($rq,
        [
            'content_cmt'=>'required|min:1|max:400',
        ],
        [
            'content_cmt.required'=>'Bạn chưa nhập comment',
            'content_cmt.min'=>'Comment phải có độ dài từ 1 cho đến 400 hý tự',
            'content_cmt.max'=>'Comment phải có độ dài từ 1 cho đến 400 hý tự',
        ]
      );
      $rep = new ReplyComment;
      $rep->customers_id = $id_user;
      $rep->binh_luan_id = $id_cmt;
      $rep->noi_dung = $rq->content_cmt;
      $rep->save();
      return back();
    }

    public function getDeleteReply($id_rep){
      $rep = ReplyComment::find($id_rep);
      $rep->delete();
      return back();
    }

    public function postEditReplyComment(Request $rq, $id_rep){
      $this->validate($rq,
        [
            'content_cmt'=>'required|min:1|max:400',
        ],
        [
            'content_cmt.required'=>'Bạn chưa nhập comment',
            'content_cmt.min'=>'Comment phải có độ dài từ 1 cho đến 400 hý tự',
            'content_cmt.max'=>'Comment phải có độ dài từ 1 cho đến 400 hý tự',
        ]
      );
      $rep = ReplyComment::find($id_rep);
      $rep->noi_dung = $rq->content_cmt;
      $rep->save();
      return back()->withInput();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\AnswerComment;
 

class AnswerController extends Controller
{
    public function index($question_id){
        return redirect()->route('question.detail',['question_id'=>$question_id]);
    }
    
    
    public function store($question_id,Request $request)
    {
        $data = [
            'question_id' =>$question_id,
            'user_id'     =>1,  // jika ada sistem login maka user id diambil dari session
            'content'     =>$request->input('answer')
        ];

        Answer::create($data);

        return redirect()->route('question.detail',['question_id'=>$question_id]);
    }

    public function storeComment($question_id,$answer_id,Request $request)
    {
        $data = [
            'answer_id'   => $answer_id,
            'user_id'     => 1,
            'content'     =>$request->input('comment')
        ];

        AnswerComment::create($data);
        return redirect()->route('question.detail',['question_id'=>$question_id]);
    }
}

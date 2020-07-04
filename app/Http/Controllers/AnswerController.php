<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
 

class AnswerController extends Controller
{
    public function index($pertanyaan_id){
        return redirect()->route('question.detail',['id'=>$pertanyaan_id]);
    }
    
    
    public function store($pertanyaan_id,Request $request)
    {
        $data = [
            'question_id' =>$pertanyaan_id,
            'user_id'     =>1,  // jika ada sistem login maka user id diambil dari session
            'content'     =>$request->input('answer')
        ];

        Answer::create($data);

        return redirect()->route('question.detail',['id'=>$pertanyaan_id]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Question;

class QuestionController extends Controller
{
    
    
    public function index()
    {
        $questions = question::all();

        return view('pages.question-list',compact('questions'));
    }
    
    public function create()
    {
        return view('pages.question-add',['url'=>route('question.add')]);
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => 1,
            'title'   => $request->input('title'),
            'content' => $request->input('question'),
        ];
        
        $question = Question::create($data);
        return redirect()->route('question.detail',['question_id'=>$question->id]);
    }

    public function detailQuestion($question_id)
    {
        $question = Question::find($question_id);
        
        return view('pages.question-detail',compact('question'));
    }

    public function edit($question_id){
        $question = Question::find($question_id);
        $url      = route('question.edit',['question_id'=>$question_id]);
        
        
        return view('pages.question-add',
                    compact(
                        'question',
                        'url' 
                    )
                );
    }

    public function update($question_id,Request $request){
        $question = Question::find($question_id);

        $question->title   = $request->input('title');
        $question->content = $request->input('question');
        $question->save();

        return redirect()->route('question.detail',['question_id'=>$question_id]);
    }

    public function destroy($question_id){
        $question = DB::table('questions')->where('question_id',$question_id)->delete();
        return redirect()->route('question.list');
    }

}

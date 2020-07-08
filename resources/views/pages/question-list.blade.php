@extends('adminLTE.master')

@section('page-title',"Question List")

@section('content')
<div class="card">
    <div class="card-body p-0">
      <table class="table  projects">
          <tbody>
              @foreach ($questions as $question)
              <tr>
                  <td width="10%">
                    <img alt="Avatar" class="table-avatar" src="{{asset('adminLTE/dist/img/avatar.png')}}">
                  </td>
                  <td width="70%">
                    <a href="{{route('question.detail',['question_id'=>$question->id])}}">
                        <strong> {{$question->title}}</strong>
                      </a>
                      <br/>
                      <small>
                          From <span class="badge badge-success">{{$question->user->username}}</span> &nbsp;&nbsp;&nbsp;&nbsp; {{date_format(date_create($question->updated_at),'F, d Y ')}} 
                      </small>
                  </td>
                  <td>
                    <a href="{{route('question.detail',['question_id'=>$question->id])}}" class="btn btn-success btn-sm m-1">
                      <i class="far fa-eye"></i>
                    </a>
                    <a href="{{route('question.form-edit',['question_id'=>$question->id])}}" class="btn btn-warning btn-sm m-1">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{route('question.delete',['question_id'=>$question->id])}}" style="display:inline;" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm m-1 "><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
              </tr>
              @endforeach
              
          </tbody>
      </table>
    </div>
  </div>
@endsection
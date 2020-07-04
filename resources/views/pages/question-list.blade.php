@extends('adminLTE.master')

@section('page-title',"Question List")

@section('content')
<div class="card">
    <div class="card-body p-0">
      <table class="table  projects">
          <tbody>
              @foreach ($questions as $question)
              <tr>
                  <td width="20px">
                    <img alt="Avatar" class="table-avatar" src="{{asset('adminLTE/dist/img/avatar.png')}}">
                  </td>
                  <td>
                    <a href="{{route('question.detail',['id'=>$question->id])}}">
                        <strong> {{$question->title}}</strong>
                      </a>
                      <br/>
                      <small>
                          From <span class="badge badge-success">{{$question->username}}</span> &nbsp;&nbsp;&nbsp;&nbsp; {{$question->date_create}}  &nbsp;&nbsp;&nbsp;&nbsp; {{$question->time_create}}
                      </small>
                  </td>
              </tr>
              @endforeach
              
          </tbody>
      </table>
    </div>
  </div>
@endsection
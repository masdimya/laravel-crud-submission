@extends('adminLTE.master')
@section('page-title',$question->title)
@section('page-detail')
    <small>
        From &nbsp;&nbsp; <span class="badge badge-success">{{$question->user->username}}</span> &nbsp;&nbsp; {{date_format(date_create($question->updated_at),'F, d Y ')}}
    </small>
@endsection
    
@section('content')
<div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card">
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form">
            <div class="card-body">
              <div class="form-group">
                  <div class="row align-items-center">
                      <div class="col-md-1 text-center">
                        <div class="start mt-4 mb-4 text-warning">
                            <i class="far fa-star fa-lg"></i>
                            <strong>{{$question->votes}}</strong>
                        </div>
                        <div class="likes mt-4 mb-4 text-success">
                            <i class="far fa-thumbs-up fa-lg"></i>
                            <strong>{{$question->likes}}</strong>
                        </div>
                        <div class="dislikes mt-4 mb-4 text-danger">
                            <i class="far fa-thumbs-down fa-lg"></i>
                            <strong>{{$question->dislikes}}</strong>
                        </div>
                      </div>
                      <div class="col-md-11">
                        <div class="m-3">
                            {{$question->content}}
                        </div>
                        <hr>
                        <div class="pl-5">
                            @isset($question->questionComment)
                                @foreach ($question->questionComment as $comment)  
                                    <div class="coment">
                                        <h6 class="small">
                                            {{$comment->content}} 
                                            - <span class="badge badge-primary">{{$comment->username}}</span> 
                                            <span class="text-muted"> {{date_format(date_create($comment->updated_at),'F, d Y ')}} </span> 
                                        </h6>
                                        <hr>
                                    </div>
                                @endforeach
                                
                            @endisset
                           
                            <div class="add-comment">
                                <input class="border-0 small col-9" type="text" name="comment" placeholder="add comment">
                                <input type="submit" class="btn btn-sm btn-primary small" value="Add Comment">
                                <hr>
                            </div>
                        </div>
                      </div>
                  </div>
                
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-success"><i class="far fa-thumbs-up fa-lg"></i></button>
              <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-thumbs-down fa-lg"></i></button>
            
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                
                <h4>{{count($question->answer)}} Answer</h4>
                <div class="btn-group btn-group-toggle ml-auto" data-toggle="buttons">
                    <label class="btn btn-outline-secondary active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
                    </label>
                    <label class="btn btn-outline-secondary">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Oldest
                    </label>
                    <label class="btn btn-outline-secondary">
                    <input type="radio" name="options" id="option3" autocomplete="off"> Vote
                    </label>
                </div>
                
            </div>
            <div class="card-body p-0">
                @isset($question->answer)
                <!-- answer -->
                    @foreach ($question->answer as $answer)
                    <div class="form-group pl-3 pr-3 mb-0">
                        <div class="row align-items-center">
                            <div class="col-md-1 text-center">
                            <div class="start mt-4 mb-4 text-warning">
                                <i class="far fa-star fa-lg"></i>
                                <strong>{{$answer->votes}}</strong>
                            </div>
                            <div class="likes mt-4 mb-4 text-success">
                                <i class="far fa-thumbs-up fa-lg"></i>
                                <strong>{{$answer->likes}}</strong>
                            </div>
                            <div class="dislikes mt-4 mb-4 text-danger">
                                <i class="far fa-thumbs-down fa-lg"></i>
                                <strong>{{$answer->dislikes}}</strong>
                            </div>
                            </div>
                            <div class="col-md-11">
                                <div class="m-3">
                                    {{$answer->content}}
                                </div>
                                <div class="m-3 d-flex">
                                    <small class="ml-auto">
                                        from {{$answer->user->username}} &nbsp;&nbsp;&nbsp;&nbsp; {{date_format(date_create($answer->updated_at),'F, d  Y ')}}
                                    </small>
                                </div>
                                <hr>
                                <!-- comment section here -->
                                <div class="pl-5">
                                @isset($answer->answerComment)
                                    @foreach ($answer->answerComment as $comment)  
                                        <div class="coment">
                                            <h6 class="small">
                                                {{$comment->content}} 
                                                - <span class="badge badge-primary">{{$comment->user->username}}</span> 
                                                <span class="text-muted"> {{date_format(date_create($comment->updated_at),'F, d Y ')}} </span> 
                                            </h6>
                                            <hr>
                                        </div>
                                    @endforeach   
                                @endisset
                                <!-- add comment -->
                                <div class="add-comment">
                                    <form action="{{route('answer.comment',['question_id'=>$question->id,'answer_id'=>$answer->id])}}" method="post">
                                        @csrf
                                        <input class="border-0 small col-9" type="text" name="comment" placeholder="add comment">
                                        <input type="submit" class="btn btn-sm btn-primary small" value="Add Comment">
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            <!-- end comment section here -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 bg">
                                <button type="submit" class="btn btn-sm btn-success"><i class="far fa-thumbs-up fa-lg"></i></button>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-thumbs-down fa-lg"></i></button>              
                                <hr>
                            </div>
                        </div>
                    </div>
                    @endforeach
                <!-- end answer -->
                @endisset

                <!-- add answer -->
                <div class="form-group pl-3 pr-3">
                    <form action="{{route('answer.add',['question_id'=>$question->id])}}" method="POST">
                        @csrf
                        <label for="question"><h3>Your Answer</h3></label>
                        <textarea class="form-control" rows="5" id="question" name="answer" placeholder="Add Your Answer" style="height: 103px;"></textarea>
                        <input type="submit" class="btn btn-primary mt-3" value="Add Answer"> 
                    </form>             
                </div>
                <!-- end add answer -->
              </div>   
        </div>
      </div>
    </div>
  </div>
@endsection
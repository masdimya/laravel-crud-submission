@extends('adminLTE.master')
@section('page-title',"Create Question")
    
@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
          </div>
          <!-- /.card-header -->
          <!-- form start -->
        <form role="form" method="POST" action="{{route('question.add')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Add Title">
              </div>
              <div class="form-group">
                <label for="question">Question</label>
                <textarea class="form-control" rows="5" id="question" name="question" placeholder="Add Question" style="height: 103px;"></textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

        

      </div>
      <!--/.col (left) -->
      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
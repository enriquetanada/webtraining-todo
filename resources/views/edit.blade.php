@extends('index')

@section('content')
   <div class="container">
        <div class="row mt-5">
            <a href="{{ route('todos.index')}}" role="button" class="btn btn-primary mb-2">
                Back
            </a>
            <h3>Edit Todo</h3>
        </div>

        @if($errors->any()) 
          <div class="alert alert-danger" role="alert">
            <strong>There's an error</strong>
          </div>
          <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
            @endforeach
          </ul>
        @endif

        <div class="row">
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" aria-describedby="title" value="{{$todo->title}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
   </div>
@endsection
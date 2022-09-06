@extends('index')

@section('content')
    <div class="container mt-5">

        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{$message}}
          </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Todos</h4>
                        <a href="{{ route('todos.create')}}" role="button" class="btn btn-primary">
                            Add Todo
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Todo</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todos as $todo)
                                <tr>
                                    <td>{{$todo->id}}</td>
                                    <td>{{$todo->title}}</td>
                                    @if($todo->is_completed)
                                        <td>Completed</td>
                                    @else
                                        <td>Not Started</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('todos.edit', $todo->id) }}" role="button" class="btn btn-primary">
                                            Edit
                                        </a>
                                        <form action="{{route('todos.destroy', $todo->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @if(!$todo->is_completed)
                                        <form action="{{route('todos.status', $todo->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info">Set as Completed</button>
                                        </form>
                                        @else 
                                        <form action="{{route('todos.status', $todo->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-info">Not started</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
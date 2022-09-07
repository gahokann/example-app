@extends('layouts.default')

@section('active')active @endsection {{-- Подсветка кнопки --}}

@section('title') Home Page @endsection {{-- Заголовок страницы --}}

@section('content') {{-- Вставка данного кода в default.blade.php --}}
<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="text-center mt-5">
    <h2>Add Todo</h2>

    <form class="row g-3 justify-content-center" method="POST" action="{{route('todos.store')}}">
        @csrf
        <div class="col-6">
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </div>
    </form>
</div>

<div class="text-center mt-5">
    <h2>Search Todo</h2>

    <form class="row g-3 justify-content-center" method="GET" action="{{ route('todos.search') }}">
        @csrf
        <div class="col-6">
            <input type="text" class="form-control" name="search" placeholder="Search">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </div>
    </form>
</div>

<div class="text-center">
    <h2>All Todos</h2>
    {{-- @php var_dump($todos) @endphp --}}
    @if(count($todos))
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Developer</th>
                </tr>
                </thead>
                <tbody>

                @php $counter=1 @endphp

                @foreach($todos as $todo)
                    <tr>
                        <th>{{$counter}}</th>
                        <td>{{$todo->title}}</td>
                        <td>{{$todo->created_at}}</td>
                        <td>
                            @if($todo->is_completed)
                                <div class="badge bg-success">Completed</div>
                            @else
                                <div class="badge bg-warning">Not Completed</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('todos.edit',['todo'=>$todo->id])}}" class="btn btn-info">Edit</a>
                            <a href="{{route('todos.destroy',['todo'=>$todo->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <form action="{{route('todos.adddeveloper',[$todo->id])}}" method="POST">
                                @csrf
                                <select class="form-select" aria-label="Default select example" name="select">
                                    @foreach ($dev as $devs)
                                        @if($todo->devID == $devs->id)
                                            <option selected value="{{ $devs->id }}">{{ $devs->name }}</option>
                                        @else
                                            <option value="{{ $devs->id }}">{{ $devs->name }}</option>
                                            @endif
                                    @endforeach
                                    
                                  </select>
                                  <button class="btn btn-warning" style="margin-top: 15px ">Choose</button>
                            </form>
                        </td>
                    </tr>

                    @php $counter++; @endphp

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="alert alert-warning" style="width: 50%; margin: 0 auto; role="alert">
        Записей не найдено!
    </div>
    @endif
</div>



@endsection



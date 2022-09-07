@extends('layouts.default')
@section('active')active @endsection

@section('content')
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
        <h2>Add Developers</h2>
    
        <form class="row g-3 justify-content-center" method="POST" action="{{route('developer.store')}}">
            @csrf
            <div class="col-6">
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>
    </div>

    <div class="text-center">
        <h2>All Developer</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6">
    
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
    
                    @php $counter=1 @endphp
    
                    @foreach($devs as $dev)
                        <tr>
                            <th>{{$counter}}</th>
                            <td>{{$dev->name}}</td>
                            <td>{{$dev->created_at}}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('developer.edit',[$dev->id])}}">Edit</a>
                                <a href="{{route('developer.destroy',[$dev->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php
                        @endphp
                        @php $counter++; @endphp
    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
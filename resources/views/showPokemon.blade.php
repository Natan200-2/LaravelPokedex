@extends('main.layouts')

@section('title',$pokemon->name)

@section('content')
    <div>
        <img src="{{$image}}" alt="teste">
    </div>
@endsection
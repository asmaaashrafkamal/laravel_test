@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-primary" role="alert">
        {{Session::get('error')}}
    </div>
@endif
<table class="table" >
    @empty(!$album)
        <thead>
          <tr >
            <th scope="col">Album Id</th>
            <th scope="col">Album Name</th>
            <th scope="col">Album Images</th>
            <th scope="col">Change To Another Album</th>
            <th scope="col">Update Photos</th>
            <th scope="col">Delete Pictures</th>
            <th scope="col">Delete Album with Pictures</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($album as $o)
                <tr class="offerRow{{$o->id}}">
                    <th scope="row">{{$o->id}}</th>
                    <td>{{$o->album_name}}</td>
                    <td>
                    @foreach ($o->picture as $p)
                    <img src="{{asset('images/albums/'.$p->picture_name)}}" width="100" height="100">
                    @endforeach
                </td>
                    <td><a href="{{url('change/'.$o -> id)}}" type="button" class="btn btn-primary">Change To Another Album</a></td>
                    <td><a href="{{url('edit/'.$o -> id)}}" type="button" class="btn btn-primary">Update Photos</a></td>
                    <td><a href="{{route('album.delete',$o -> id)}}" class="btn btn-danger">Delete Pictures</a></td>
                    <td><a href="{{route('album.picture.delete',$o -> id)}}" class="btn btn-danger">Delete Album with Pictures</a></td>

                </tr>
            @endforeach
            @else
                <tr>
                    <div class="alert alert-info"  role="alert">
                        No Albums founded
                    </div>
                </tr>
            @endempty

    </tbody>
@stop




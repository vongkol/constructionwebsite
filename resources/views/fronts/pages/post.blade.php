@extends('layouts.front')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <h3 class="text-primary">{{$main->name}}</h3>
                <hr>
                <ul>
                    <li><a href="{{url('/category/'.$main->id)}}">All</a></li>
                    @foreach($subs as $s)
                        <li><a href="{{url('/sub-category/'.$main->id.'?sub='.$s->id)}}">{{$s->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
               <h3>{{$post->title}}</h3>
               <hr>
               {!!$post->description!!}
            </div>
        </div>
    </div>
@endsection
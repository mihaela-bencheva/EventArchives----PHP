@extends('layouts.app')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>{{$title}}</h2>
            </header>
            {!! $text !!}
            <img src="../../images/events.jpg" alt="...">
        </div>
    </div>
@endsection
@extends('layouts.current.app-current')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Type</h2>
            </header>
            @foreach ($events as $event)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$event->event_name}}</h5>
                    <p class="card-text">Year: {{$event->event_year}}</p>
                    <a href="{{ url('event/'.$event->id) }}" class="btn btn-primary">View More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

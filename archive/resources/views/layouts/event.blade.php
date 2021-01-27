@extends('layouts.app')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Events</h2>
            </header>
                @foreach ($events as $event)
                    <div class="card" style="width: 18rem;height: 30rem">
                        @if ($event->image != null)
                            <img class="card-img-top" style="width:18rem;height:13rem" src="{{ url(''.$event->image.'') }}" alt="Image">
                        @else
                            <img src="../../images/event.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$event->event_name}}</h5>
                            <p class="card-text">Year: {{$event->event_year}}</p>
                            @if ($event->description != null)
                                <p class="card-text p-2">Description: {!! $event->description !!}</p>
                            @else
                                <p class="card-text p-2">Description: -</p>
                            @endif
                            <a href="{{ url('event/'.$event->id) }}" class="btn btn-primary">View More</a>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
@endsection
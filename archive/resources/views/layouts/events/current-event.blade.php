@extends('layouts.current.app-current')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Event</h2>
            </header>
            <div class="card" style="width: 18rem;">
                    @if ($event->image != null)
                        <img class="card-img-top" style="width:18rem;height:13rem" src="{{ url(''.$event->image.'') }}" alt="Image">
                    @endif
                <div class="card-body">
                    <h5 class="card-title">{{$event->event_name}}</h5>
                    <p class="card-text">{{$event->event_year}}</p>
                    @if(!empty($types))
                    <p class="card-text">
                        Type:
                        <br>
                        @include('layouts.events.current-event-types')
                    </p>
                    @endif
                    @if(!empty($archives))
                    <p class="card-text">
                        Archive:
                        <br>
                        @include('layouts.events.current-event-archives')
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

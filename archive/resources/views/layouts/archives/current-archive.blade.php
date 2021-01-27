@extends('layouts.current.app-current')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Archive</h2>
            </header>
            @foreach($archive_event as $archive_event)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4>Archive: </h4>
                        <h5 class="card-title">{{$archive_event->archive_name}}</h5>
                        <p class="card-text">Created At: {{$archive_event->created_at}}</p>
                        @if($archive_event->description != null)
                            <p class="card-text">Description: {!! $archive_event->description !!}</p>
                        @endif
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h4>Event: </h4>
                        <h5 class="card-title">{{$archive_event->event_name}}</h5>
                        <p class="card-text">Year: {{$archive_event->event_year}}</p>
                        <a href="{{ url('event/'.$archive_event->id) }}" class="btn btn-primary">View More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

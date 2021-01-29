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
                    @if($types != null)
                    <p class="card-text">
                        Types:
                        <br>
                        @foreach($types as $type)
                            <ul>
                                <li>
                                    <a href="{{ url('type/'.$type->id) }}">{{$type->name}}</a>
                                </li>
                            </ul>
                        @endforeach
                    </p>
                    @endif
                    @if($archives != null)
                    <p class="card-text">
                        Archives:
                        <br>
                        @foreach($archives as $archive)
                            <p class="card-text">{{$archive->archive_name}}</p>
                            <p class="card-text">Created At: {{$archive->created_at}}</p>
                        @endforeach
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

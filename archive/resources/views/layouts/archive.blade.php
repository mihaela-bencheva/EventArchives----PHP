@extends('layouts.app')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Archives</h2>
            </header>
            @foreach ($archives as $archive)
                <div class="card" style="width: 18rem;">
                    <img src="../../images/archive.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$archive->archive_name}}</h5>
                        <p class="card-text">Created: {{$archive->created_at}}</p>
                        @if ($archive->description != null)
                            <p class="card-text">Description: {!! $archive->description !!}</p>
                        @else
                            <p class="card-text">Description: -</p>
                        @endif
                        <a href="{{ url('archive/'.$archive->id) }}" class="btn btn-primary">View More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

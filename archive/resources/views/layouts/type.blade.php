@extends('layouts.app')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Types</h2>
            </header>
            <div class="list-group">
                @foreach ($types as $type)
                    <a href="{{ url('type/'.$type->id) }}" class="list-group-item list-group-item-action">{{$type->name}}</a>
                @endforeach   
            </div>
        </div>
    </div>
@endsection
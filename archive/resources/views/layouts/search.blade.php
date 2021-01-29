@extends('layouts.app')

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>Search</h2>
            </header>
            <form action="{{ route('search-name') }}" method="GET" class="d-inline align-items-start">
                <input class="input-group-text d-inline" style="width: 40rem" type="text" name="search-name" placeholder="Event:" required/>
                <button  class="btn my-3" type="submit" style="width: 15rem; height: 4rem">Search by Event Name</button>
            </form>
            <form action="{{ route('search-type') }}" method="GET" class="d-inline align-items-start">
                <input class="input-group-text d-inline" style="width: 40rem" type="text" name="search-type" placeholder="Type:" required/>
                <button  class="btn my-3" type="submit" style="width: 15rem; height: 4rem" >Search by Type Of Event</button>
            </form>
        </div>
    </div>
@endsection

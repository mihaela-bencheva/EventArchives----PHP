@foreach($archives as $archive)
        <p class="card-text">{{$archive->archive_name}}</p>
        <p class="card-text">Created At: {{$archive->created_at}}</p>
@endforeach
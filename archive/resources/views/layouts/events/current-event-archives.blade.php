@foreach($archives as $archive)
        <p class="card-text text-white h5 p-2">Name: {{$archive->archive_name}}</p>
        <p class="card-text text-white h5 p-2">Created At: {{$archive->created_at}}</p>
@endforeach
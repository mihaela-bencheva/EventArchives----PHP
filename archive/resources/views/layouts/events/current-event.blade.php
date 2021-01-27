<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Event</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="card box-shadow  d-flex bg-danger">
            @if ($event->image != null)
                <img style="width:30rem;height:25rem" src="{{$event->image}}" alt="Image">
            @endif
            <pre>{{var_dump($event->image)}}</pre>
            <p class="card-text text-white h5 p-2">Event: {{$event->event_name}}</p>
            <p class="card-text text-white h5 p-2">Year: {{$event->event_year}}</p>
            @if(!empty($types))
            <p class="card-text text-white h5 p-2">
                Type:
                <br>
                @include('layouts.events.current-event-types')
            </p>
            @endif
            @if(!empty($archives))
            <p class="card-text text-white h5 p-2">
                Archive:
                <br>
                @include('layouts.events.current-event-archives')
            </p>
            @endif
        </div>
    </div>
</body>

</html> 
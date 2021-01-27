<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Events</title>
</head>

<body>
    <div class="container">
        @foreach ($events as $event)
            <div class="d-flex justify-content-center col-lg-12 col-xl-6 py-3">
                <div class="card box-shadow  d-flex bg-danger">
                    <p class="card-text text-white h5 p-2">Name: {{$event->event_name}}</p>
                    <p class="card-text text-white h5 p-2">Year: {{$event->event_year}}</p>
                    @if ($event->image != null)
                        <img style="width:30rem;height:25rem" src="{{$event->image}}" alt="Image">
                    @endif
                    @if ($event->description != null)
                        <p class="card-text text-white h5 p-2">Description: {!! $event->description !!}</p>
                    @else
                        <p class="card-text text-white h5 p-2">Description: -</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</body>

</html> 
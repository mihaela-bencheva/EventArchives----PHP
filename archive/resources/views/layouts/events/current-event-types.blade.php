@foreach($types as $type)
    <ul>
        <li>
            <a href="{{ url('type/'.$type->id) }}">{{$type->name}}</a>
        </li>
    </ul>
@endforeach
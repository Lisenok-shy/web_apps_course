@extends('basado')
@section('content')
<h2>Список домиков</h2>
<table>
    <thead>
        <td>id</td>
        <td>Название</td>
        <td>Площадь(кв.м)</td>
    </thead>
    @foreach ($houses as $house)
        <tr>
            <td>{{$house->id}}</td>
            <td>{{$house->address}}</td>
            <td>{{$house->area}}</td>
        </tr>
    @endforeach
</table>
{{ $houses->links() }}
@endsection
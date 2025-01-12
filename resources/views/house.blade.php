<body>
    <h2>{{$house ? "Дом ".$house->address : "Сосал"}}</h2>
    @if($house)
    <table>
    <thead>
        <td>id</td>
        <td>Название</td>
    </thead>
    @foreach ($house->categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->category}}</td>
        </tr>
    @endforeach
    </table>
    @endif
</body>
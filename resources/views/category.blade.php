<!DOCTYPE html>
<meta charset='utf-8'>
	<head>
		<title>605-41mE.A.</title>
	</head>
	<body>
    <h2>{{$category ? "Категория: ".$category->category : "venom"}}</h2>
    @if($category)
    <table>
    <thead>
        <td>id</td>
        <td>Название</td>
        <td>Площадь(кв.м)</td>
    </thead>
    @foreach ($category->houses as $house)
        <tr>
            <td>{{$house->id}}</td>
            <td>{{$house->address}}</td>
            <td>{{$house->area}}</td>
        </tr>
    @endforeach
    </table>
    @endif
</body>
</html>

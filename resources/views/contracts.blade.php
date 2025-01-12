<!DOCTYPE html>
<meta charset='utf-8'>
<head>
		<title>605-41mE.A.</title>
        <style>.invalid {color:red;}</style>
	</head>
	<body>
    <table>
    <thead>
        <td>id</td>
        <td>номер</td>
        <td>цена</td>
        <td>buyer_id</td>
        <td>house_id</td>
        <td>начало</td>
        <td>конец</td>
        <td>подтвержден</td>
        <td>Действия</td>
    </thead>
    @foreach ($contracts as $contract)
        <tr>
            <td>{{$contract->id}}</td>
            <td>{{$contract->num}}</td>
            <td>{{$contract->price}}</td>
            <td>{{$contract->buyer_id}}</td>
            <td>{{$contract->house_id}}</td>
            <td>{{$contract->date_begin}}</td>
            <td>{{$contract->date_end}}</td>
            <td>{{$contract->confirmed}}</td>
            <td>
                <a href = "{{url('contract/delete/'.$contract->id)}}">Удалить</a>
                <a href = "{{url('contract/edit/'.$contract->id)}}">Подтвердить</a>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>

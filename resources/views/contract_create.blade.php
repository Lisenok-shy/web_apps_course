<!DOCTYPE html>
<meta charset="utf-8">
	<head>
		<title>605-41mE.A.</title>
        <style>.invalid {color:red;}</style>
	</head>
	<body>
    <h2>Создание контракта</h2>
    <form method = "post" action={{url("contract")}}>
        @csrf
        <label>Название контракта</label>
        <input type = "text" name = "num" value = {{old("num")}}>
        @error("num")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Дата начала</label>
        <input type = "date" name = "date_begin" value = {{old("date_begin")}}>
        @error("date_begin")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Дата окончания</label>
        <input type = "date" name = "date_end" value = {{old("date_end")}}>
        @error("date_end")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Дом</label>
        <select id ="select_house" name="house_id" value={{old("house_id")}}>
            @foreach ($houses as $house)
            <option value={{$house->id}} @if(old("house_id")==$house->id) selected @endif>{{$house->address}}</option>
            @endforeach
        </select>
        @error("house_id")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <input type='submit' value='Отправить на согласование'/>
    </form>
</body>
</html>
</script>


@extends('basado')
@section('content')
<script>
    function myFunction() {
        var x = document.getElementById("form_category");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<div class="container">
    <h2>{{$house ? "Дом " . $house->address : "Дома с таким ID нет"}}</h2>
    @if(Auth::user()->is_admin)
    <h2 class="btn btn-warning" onclick="myFunction()">Добавить категорию?</h2>
    <form method="post" action={{url("category/".$house->id)}} id="form_category" style="display:none">
        @csrf
        <select class="form-select form-select-sm" name="category_id">
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->category}}</option>
            @endforeach
        </select>
        <br>
        <input type='submit' value='Сохранить' class="btn btn-primary" />
    </form>
    @endif
    @if($house and count($house->categories)>0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-1">id</th>
                <th scope="col" class="col-1">Название</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($house->categories as $category)
            <tr>
                <th>{{$category->id}}</th>
                <td>{{$category->category}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <h2>Галерея</h2>
    <div class="d-flex flex-column overflow-scroll" style="max-height:600px">
        @foreach ($house->houseimgs as $img)
        <div class="p-2 mr-auto">
            <img src="{{asset('/storage/'.$img->img)}}" alt="image" style="width: 400px; margin-top: 50px"></img>
        </div>
        @endforeach
    </div>
</div>

@endsection
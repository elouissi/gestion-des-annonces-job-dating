<form action="{{route('compagnie')}}" method="post">
    {{ csrf_field() }}


    <input type="submit" value="send data" >

</form>
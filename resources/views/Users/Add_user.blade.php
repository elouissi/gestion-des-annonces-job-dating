@extends('Compagnies.create')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('users.store')}}" method="POST">
    @csrf
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">add user</h6>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput"
                placeholder="name">
            <label for="floatingInput">name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="address" name="email" class="form-control" id="floatingPassword"
                placeholder="address">
            <label for="floatingInput">email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword"
                placeholder="password">
            <label for="floatingInput">password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="confirm-password" class="form-control" id="floatingPassword"
                placeholder="verify password">
            <label for="floatingInput"> verify password</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select form-select " name="role_name" aria-label=".form-select-lg example">
                <option selected>select his role</option>
                @foreach($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
              
            </select>
         </div>

        <button type="submit"class="btn btn-sm btn-primary">add users</button>

       
    </div>
</div>
</form>
@endsection
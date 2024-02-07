@extends('layouts.dashbord_compagnies')
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
<form action="{{ route('Announcement.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">add </h6>
        <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control" id="floatingInput"
                placeholder="title">
            <label for="floatingInput">title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="address" name="content" class="form-control" id="floatingPassword"
                placeholder="content">
            <label for="floatingInput">content</label>
        </div>
    
        <div class="form-floating mb-3">
            <select class="form-select form-select " name="compagnie_id" aria-label=".form-select-lg example">
                <option selected>select your company</option>
                @foreach($compagnies as $Compagnie)
                <option value="{{$Compagnie->id}}">{{$Compagnie->name}}</option>
                @endforeach
              
            </select>
         </div>
        <div class="form-floating mb-3">
            <select class="form-select form-select " name="user_id" aria-label=".form-select-lg example">
                <option selected>select user</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              
            </select>
         </div>
         <div class="form-floating mb-3">
            <div>
                <label for="formFileLg" class="form-label">select image for your announcement</label>
                <input class="form-control form-control-lg bg-dark" id="formFileLg" type="file" name="image">
            </div>
        </div>
      
        <button type="submit"class="btn btn-sm btn-primary">add compagnie</button>

       
    </div>
</div>
</form>
@endsection
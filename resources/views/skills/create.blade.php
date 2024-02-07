
@extends('layouts.dashboard_skills')
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
<form action="{{ route('skill.store')}}" method="POST">
    @csrf
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">add </h6>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput"
                placeholder="name">
            <label for="floatingInput">name</label>
        </div> 
        <button type="submit"class="btn btn-sm btn-primary">add skill</button>

       
    </div>
</div>
</form>
 @endsection
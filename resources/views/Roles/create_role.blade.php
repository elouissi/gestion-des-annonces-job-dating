
@extends('Compagnies.create')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
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
<form action="{{ route('compagnies.store')}}" method="POST">
    @csrf
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">add </h6>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput"
                placeholder="name">
            <label for="floatingInput">name</label>
        </div>
 
        <div class="form-floating mb-3">
            <select name="permission" id="permission" multiple>
                @foreach($permission as $one)
                <option value="{{ $one->id }}">{{ $one->name }} </option>
                @endforeach
            </select>
        </div>
        
       
        <button type="submit"class="btn btn-sm btn-primary">add role</button>

       
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('permission')  // id
</script>
@endsection
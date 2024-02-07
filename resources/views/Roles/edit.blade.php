
@extends('layouts.dashboard_roles')
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
<form action="{{ route('roles.update', $role->id)}}" method="POST">
    @csrf
    @method('PUT')

  <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">update role </h6>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput"
                placeholder="name" value="{{$role->name}}">
            <label for="floatingInput">name</label>
        </div>
    
        <div class="form-floating mb-3">
            <select name="permission[]" id="permission" multiple>
           
                @foreach($permissions as $filtration)
                    
                    <option   value="{{ $filtration->name }}" {{ in_array($filtration->id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $filtration->name }}</option>
               
                @endforeach
            </select>
        </div>
        
       
        <button type="submit"class="btn btn-sm btn-primary">update</button>

       
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('permission')  // id
</script>
@endsection
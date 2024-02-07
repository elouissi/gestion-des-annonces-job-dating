@extends('layouts.dashboard_skills')
@section('content')
<form action="{{ route('skill.update', $skill->id)}}" method="POST">
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">update skill </h6>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput " value="{{ $skill->name }}"
                placeholder="name">
            <label for="floatingInput">name</label>
        </div>
    
        <button type="submit"class="btn btn-sm btn-primary">update skill</button>
    </div>
</div>
</form>
@endsection
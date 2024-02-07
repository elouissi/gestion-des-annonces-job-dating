@extends('layouts.dashbord_compagnies')
@section('content')
<form action="{{ route('compagnies.update', $compagnie->id)}}" method="POST">
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">update compagnie </h6>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput " value="{{ $compagnie->name }}"
                placeholder="name">
            <label for="floatingInput">name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="address" name="address" class="form-control" id="floatingPassword"value="{{ $compagnie->address }}"
                placeholder="address">
            <label for="floatingInput">address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="contact" class="form-control" id="floatingPassword"value="{{ $compagnie->contact }}"
                placeholder="contact">
            <label for="floatingInput">contact</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="field_of_activity" class="form-control" id="floatingPassword"value="{{ $compagnie->field_of_activity }}"
                placeholder="contact">
            <label for="floatingInput">field of activity</label>
        </div>
        <button type="submit"class="btn btn-sm btn-primary">update compagnie</button>
    </div>
</div>
</form>
@endsection
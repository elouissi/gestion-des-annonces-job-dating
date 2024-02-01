@extends('Compagnies.create')
@section('content')
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
            <input type="address" name="address" class="form-control" id="floatingPassword"
                placeholder="address">
            <label for="floatingInput">address</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Open this select menu</option>
                @foreach($Announcements as $a)
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
         </div>
        <div class="form-floating mb-3">
            <input type="text" name="field_of_activity" class="form-control" id="floatingPassword"
                placeholder="contact">
            <label for="floatingInput">field of activity</label>
        </div>
        <button type="submit"class="btn btn-sm btn-primary">add compagnie</button>

       
    </div>
</div>
</form>
@endsection
@extends('Compagnies.create')
@section('content')
<form action="{{ route('Announcement.update', $announcement->id)}}" method="POST">
    @csrf
    @method('PUT')
 <div class="col-sm-12 col-xl-6" style="margin: auto">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">update announcement </h6>
        <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control" id="floatingInput " value="{{ $announcement->title }}"
                placeholder="title">
            <label for="floatingInput">title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="address" name="content" class="form-control" id="floatingPassword"value="{{ $announcement->content }}"
                placeholder="content">
            <label for="floatingInput">content</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select form-select " name="compagnie_id" aria-label=".form-select-lg example">
                 @foreach($compagnies as $Compagnie)
                <option value="{{$Compagnie->id}}">{{$Compagnie->name}}</option>
                @endforeach
              
            </select>
         </div>
         <div class="form-floating mb-3">
            <select class="form-select form-select " name="user_id" aria-label=".form-select-lg example">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              
            </select>
         </div>
        <button type="submit"class="btn btn-sm btn-primary">update announcement</button>
    </div>
</div>
</form>
@endsection
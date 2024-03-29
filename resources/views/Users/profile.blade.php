@extends('layouts.dashboard_users')
@section('content')
<link rel="stylesheet" href="{{asset('css/profil.css')}}">
 
 <div class="card">
    <div class="ds-top"></div>
    <div class="avatar-holder">
      <img src="images/téléchargement (30).png" alt="Albert Einstein">
    </div>
    <form action="{{route('users.edit', auth()->user()->id )}}" method="POST">
      @method('PUT')
      @csrf

    <div class="name">
      <label for="floatingInput"><strong>name</strong></label>

       <input type="text" style="margin: auto; width: 50%;" name="name" class="form-control" id="floatingInput " value="{{auth()->user()->name}}"
      placeholder="name"> 
      @can('show_users')

      @foreach(auth()->user()->roles as $role)
       <label for="floatingInput"><strong>role</strong></label> 
     <select style="margin: auto; width: 50%;"  name="roles" class="form-select  mb-3" aria-label=".form-select-lg example">
        @foreach($roles as $role)
      <option value="{{$role->name}}">{{$role->name}}</option>
      @endforeach
   </select>
  @endforeach
  @endcan
  <label for="floatingInput"><strong>email</strong></label> 
  <input type="text" style="margin: auto; width: 50%;" name="email" class="form-control" id="floatingInput " value="{{auth()->user()->email}}"
 placeholder="role"> 
 <label for="floatingInput"><strong>skill</strong></label> 

<select style="width: 50%; " class="mx-4" name="skills[]" id="skill" multiple>
    <!-- Options de compétences -->
    @foreach($skills as $skill)
        <option value="{{ $skill->id }}" {{ in_array($skill->id, auth()->user()->skills->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $skill->name }}</option>
    @endforeach
</select>
<button style="margin-top: 11px; " type="submit"class="btn btn-sm btn-primary">update profile</button>

       </div>

      </form>

 
    <div class="ds-skill">
       <h6>Skill <i class="fa fa-code" aria-hidden="true"></i></h6>
      @foreach(auth()->user()->skills as $skill)
      <div class="skill html">
        <h6><i class="fas fa-code"></i> {{$skill->name}} </h6>
        <div class="bar bar-html">
          <p>95%</p>
        </div>
        @endforeach
     
        
      </div>
   

    
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
  <script>
      new MultiSelectTag('skill')  // id
  </script>
   @endsection
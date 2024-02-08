@extends('layouts.dashboard_users')
@section('content')
<link rel="stylesheet" href="{{asset('css/profil.css')}}">
 <div class="card">
    <div class="ds-top"></div>
    <div class="avatar-holder">
      <img src="images/téléchargement (30).png" alt="Albert Einstein">
    </div>
    <div class="name">
      <a href="https://codepen.io/AlbertFeynman/" target="_blank"><strong>name:</strong>{{auth()->user()->name}}</a>
      @foreach(auth()->user()->roles as $role)
      <p><strong>role:</strong>{{$role->name}}</p>
  @endforeach
      <p><strong>email:</strong>{{auth()->user()->email}}</p>
      </div>
 
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
   @endsection
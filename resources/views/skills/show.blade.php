@extends('layouts.dashboard_skills')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">skills</h6>
             <a class="btn btn-sm btn-primary" href="{{ route('skill.create') }}">add skill</a>
        </div>
 
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                     
                        <th scope="col">id</th>
                         <th scope="col">name</th>
                         {{-- <th scope="col">createdDate</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                    @foreach ($skills as $key => $skill)                    
                    <tr>
                        <td>{{ $skill->id }}</td>
                        <td>{{ $skill->name }}</td>
                  
                                           
                         <td>
                            <form action="{{ route('skill.destroy',$skill->id) }}" method="POST">
                               
                             <a class="btn btn-success" href="{{ route('skill.edit',$skill->id) }}">update</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"class="btn btn-primary" >delete</button>
                            </form>
                        </td>
                     </tr>
                     @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
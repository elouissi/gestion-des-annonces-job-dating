@extends('layouts.dashboard_roles')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">roles</h6>
             <a class="btn btn-sm btn-primary" href="{{ route('roles.create') }}">add roles</a>
        </div>
 
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                     
                        <th scope="col">name</th>
                         <th scope="col">permission</th>
                         {{-- <th scope="col">createdDate</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                    @foreach ($roles as $key => $role)                    
                    <tr>
                        <td>{{ $role->name }}</td>
                  
                        <td >
                            @foreach ($role->permissions as $permission)
                            {{ $permission->name }}
                        @endforeach                             </td>                      
                         <td>
                            <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
                               
                             <a class="btn btn-success" href="{{ route('roles.edit',$role->id) }}">update</a>
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
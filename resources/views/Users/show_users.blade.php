@extends('layouts.dashboard_users')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">compagnies</h6>
             <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">add users</a>
        </div>
 
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                     
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">role</th>
                         {{-- <th scope="col">createdDate</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($data as $key => $user)                    
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>                        
                        @can('show_annoncement')
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('users.edit',$user->id) }}">update</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="btn btn-primary" >delete</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('Compagnies.create')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">compagnies</h6>
             <a class="btn btn-sm btn-primary" href="{{ route('Compagnies.formCompagnies') }}">add compagnie</a>
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
                        <td>{{ $user->role }}</td>
                         {{-- <td>{{ $user->title }}</td> --}}
                        <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                               
                            <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">show</a>
                            <a class="btn btn-success" href="{{ route('users.edit',$user->id) }}">update</a>
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
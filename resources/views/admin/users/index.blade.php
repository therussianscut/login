@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Users</div>


                        <div class="card-body">


                    <table class="table">


                        <thead>

                        <th scope="col"> Name</th>
                        <th scope="col"> Email</th>
                        <th scope="col"> Roles</th>
                        <th scope="col"> Actions</th>

                        </thead>

                        <tbody>
                   @foreach($users as $user)



                        <tr>

                            <th> {{$user->name}}</th>
                            <th>  {{$user->email}}</th>
                            <th>  {{implode(', ', $user->roles()->get()->pluck('name')->toArray())}} </th>
                            <th> <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary"> Edit</a>


                                <form  action="{{ route('admin.users.destroy', $user->id) }} "   method="POST" class="float-left">
                                    @csrf
                                    @method('delete')

                                    <button type="submit"class="btn btn-danger"> Delete</button>



                                </form>




                            </th>



                        </tr>







                       @endforeach
                       </tbody>
                       </table>

                            {{$users->links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection


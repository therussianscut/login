@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Users</div>


                        <div class="card-body">


                    <table class="table">


                        <thead>

                        <th scope="col"> Name</th>
                        <th scope="col"> Email</th>
                        <th scope="col"> Roles</th>

                        </thead>

                        <tbody>
                   @foreach($users as $user)



                        <tr>

                            <th> {{$user->name}}</th>
                            <th>  {{$user->email}}</th>
                            <th>  {{implode(', ', $user->roles()->get()->pluck('name')->toArray())}} </th>

                        </tr>





                       @endforeach
                       </tbody>
                       </table>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection


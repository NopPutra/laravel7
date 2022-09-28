@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class=card-header>
                            <h4 class="text-uppercase" style="float: left">Add User</h4>
                            <a href="{{route('users.create')}}" data-toggle="modal" data-target="#addUser" style="float: right" class="btn btn-dark"><i class="fa fa-plus"></i>Add User</a>
                        </div>
                        <div class="card-body">
                            <table class=table table-bordered table-left>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">
                                            @if ($user->is_admin == 1) Admin
                                            @else Cashire
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#viewUser{{$user->id}}"><i class="fa fa-eye"></i>View</a> 
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editUser{{$user->id}}"><i class="fa fa-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser{{$user->id}}"><i class="fa fa-trash"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- modal view user -->
                                    <div class="modal right fade" id="viewUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('users.show', $user->id)}}" method="post">
                                                    @csrf
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" name="email" id="" value="{{$user->email}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="text" name="password" id="" value="{{$user->password}}" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Role</label>
                                                            <input type="text" id="" class="form-control" value="{{$user->is_admin}}" readonly>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary btn-block">Update User</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- modal edit user -->
                                    <div class="modal right fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('users.update', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                        <div class="form-group">
                                                            <label for="">Name</label>
                                                            <input type="text" name="name" id="" value="{{$user->name}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" name="email" id="" value="{{$user->email}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Password</label>
                                                            <input type="password" name="password" id="" value="{{$user->password}}" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Role</label>
                                                            <select name="is_admin" id="" class="form-control">
                                                                <option value="1" 
                                                                    @if ($user->is_admin == 1) selected 
                                                                    @endif>Admin
                                                                </option>
                                                                <option value="2"
                                                                    @if ($user->is_admin == 2) selected
                                                                    @endif>Cashire
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary btn-block">Update User</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <!-- modal delete user -->
                                    <div class="modal right fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                        <p>Do you want to delete this {{$user->name}} ?</p>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                                {{ $users->links() }}
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="card">
                    <div class=card-header> 
                        <h4 class="text-uppercase">Search User</h4>
                    </div>
                        <div class="card-body">   
                            ............
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal adding new user -->
    <div class="modal right fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('users.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="is_admin" id="" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Cashire</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-block">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <style>
            .modal.right .modal-dialog{
                top: 0;  
                right: 0;
                margin-right: 20vh;
            }

            .modal.fade:not(.in).right .modal-dialog{
                -webkit-transform: translate(25%, 0. 0);
                transform: translate3d(25%, 0, 0);
            }
        </style>

@endsection
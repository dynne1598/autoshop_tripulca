@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row col-xs-4" >
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><b>REGISTER A USER</b></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select id="role" type="role" class="form-control" name="role" value="{{ old('role') }}" required>
                                    <option>--Select User's Role--</option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Employee</option>
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button onclick="register()" class="btn btn-primary">Register</button>
                                    <script>function register()
                                         {
                                            alert('User already registered!')
                                         }
                                     </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <table class="table table-responsive" style="width: 70%" align="center">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>USERNAME</th>
                            <th>ROLE</th>
                            <th>ACTION</th>
                        </tr> 
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->role}}</td>
                            <td><a href="{{route('register.destroy',$user->id) }}"><button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                            <td><button type="submit" class=" btn btn-primary">Edit</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

           
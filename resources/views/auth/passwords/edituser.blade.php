@extends('layouts.app')

@section('content')



  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit"><b>Want to do changes?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" action="{{ route('register.update', $registered->id) }}" method="post">
            {{ method_field('POST') }}
                        <div class="form-group{{ $errors->has('Name') ? ' has-error' : '' }}">
                            <label for="Name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="Name" type="Name" class="form-control" name="name" value="{{ $registered->name }}" required autofocus>

                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}">
                            <label for="Username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="Username" type="Username" class="form-control" name="username" value="{{ $registered->email }}" required>                              
                            </div>
                       </div>

<!-- nadungag nga textbox for registered users/edit form -->
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password</label>

                              <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ $registered->password }}" required>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$registered->password_confirmation }}"  required>
                            </div>
                        </div>
<!-- hantod dre -->
                       
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
              </div>
         </div>
     </div>
</td>  

      
@endsection   
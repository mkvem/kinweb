@extends('shared.app')

@section('title')
List User
@endsection

@section('content')
          @if($user->exists)
          {!! Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
          @else
          {!! Form::model($user, ['route' => ['users.store'], 'class' => 'form-horizontal form-label-left']) !!}
          @endif
            <div class="form-group">
                 {!! Form::label('name', 'Nama Pegawai *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                 <div class="col-md-6 col-sm-6 col-xs-12">
                 {!! Form::text('name', $user->name, ['autofocus'=> true, 'class'=> 'form-control bg-light-gray', 'placeholder' => 'Nama Pegawai']) !!}
                 @if($errors->has('name'))<div class="help-block">{{ $errors->first('name') }}</div>@endif
                </div>
            </div>
            <div class="form-group">
              {!! Form::label('username', 'Username *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); !!}
               <div class="col-md-6 col-sm-6 col-xs-12">
                 {!! Form::text('username', $user->username, ['autofocus'=> true, 'class'=> 'form-control bg-light-gray', 'placeholder' => 'Username']) !!}
                 @if($errors->has('username'))<div class="help-block">{{ $errors->first('username') }}</div>@endif  
                 </div>       
            </div>
            <div class="form-group">
              {!! Form::label('password', 'Password *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); !!}
               <div class="col-md-6 col-sm-6 col-xs-12">
                 {!! Form::password('password', ['autofocus'=> true, 'class'=> 'form-control bg-light-gray', 'placeholder' => 'Password']) !!}
                 </div>   
            </div>
            <div class="form-group">
              {!! Form::label('confpassword', 'Cofirmation Password *', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12']); !!}
               <div class="col-md-6 col-sm-6 col-xs-12">
                 {!! Form::password('confpassword', ['autofocus'=> true, 'class'=> 'form-control bg-light-gray', 'placeholder' => 'Confirmation Password']) !!}
                 </div>   
            </div>

             <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('users.index') }}"><button class="btn btn-primary" type="button">Cancel</button></a>
              </div>
            </div>
          </form>
@endsection
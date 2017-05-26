@extends('shared.app')

@section('title')
Detail User
@endsection

@section('content')
    {{-- Modal --}}
    <!-- Modal -->
    <div id="addGudang" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Gudang</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            {!! Form::model($gudanguser, ['route' => ['gudanguser.store'], 'method'=>'POST', 'class' => 'form-horizontal form-label-left']) !!}
              <div class="form-group">
                {!! Form::label('gudangs', 'Gudang', ['class'=> 'control-label col-md-3 col-sm-3 col-xs-12']); !!}
                <div class="col-md-9 col-sm-9 col-xs-12">  
                {!! Form::hidden('user_id', $user->id, ['autofocus'=> true]) !!}
                  {!! Form::select('gudangs[]', $gudangs, $user->gudang_id, ['class'=> 'form-control select2_multiple', 'multiple'=>'multiple']) !!}
                  @if($errors->has('gudangs'))<div class="help-block">{{ $errors->first('category_id') }}</div>@endif
                </div>          
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="submit" class="btn btn-success" value="Save">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>

      </div>
    </div>
    </div>
    {{-- End of Modal --}}
    IMEI : {{$user->imei}}<br/>
    Nama : {{$user->name}}
    <div class="row">
      <div class="col-xs-2">
        <h4>List Gudang</h4>
      </div>
      <div class="col-xs-2 col-offset-xs-1">
            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addGudang">
              <span class="fa fa-plus"></span>&nbsp;Add Gudang
            </button>
      </div>
    </div>
    <table class="datatable table table-striped table-bordered">
        <thead>
          <tr>
            <td>No</td>
            <td>Gudang</td>
            <td>Tindakan</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($user->gudangs as $gudang)
         <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$gudang->name}}</td>
            <td>
              {{ Form::open(['route' => ['gudanguser.destroy', $gudang->id], 'method' => 'delete', 'style' => 'display:inline;']) }}
                {!! Form::hidden('user_id', $user->id, ['autofocus'=> true]) !!}
                {!! Form::hidden('gudang_id', $gudang->id, ['autofocus'=> true]) !!}
                <button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
                {{ Form::close() }}
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
@endsection

@include('shared.datatable')
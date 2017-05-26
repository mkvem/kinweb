@extends('shared.app')

@section('title')
Daftar User
@endsection

@section('content')
          <p>Daftar semua user yang dapat mengakses aplikasi</p>
          <table class="datatable table table-striped table-bordered">
              <thead>
                <tr>
                  <td>No</td>
                  <td>IMEI</td>
                  <td>Nama</td>
                  <td>Tanggal approve</td>
                  <td>Tindakan</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$user->imei}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->updated_at}}</td>
                  <td>
                    <a href="{{ route('users.show', ['id' => $user->id]) }}" data-toggle="tooltip" title="Detail Gudang">
                      <button class="btn btn-primary btn-xs"><span class="fa fa-info"></span></button>
                    </a>
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" data-toggle="tooltip" title="Edit">
                      <button class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></button>
                    </a>
                    <a href="{{ route('users.disapprove', ['id' => $user->id]) }}" data-toggle="tooltip" title="Disapprove">
                      <button class="btn btn-danger btn-xs"><span class="fa fa-close"></span></button>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>

          <h3>Daftar semua user yang tunggu approve</h3>
          <table class="datatable table table-striped table-bordered">
              <thead>
                <tr>
                  <td>No</td>
                  <td>IMEI</td>
                  <td>Nama</td>
                  <td>Tindakan</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users_notapprove as $user)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$user->imei}}</td>
                  <td>{{$user->name}}</td>
                  <td>
                    <a href="{{ route('users.show', ['id' => $user->id]) }}" data-toggle="tooltip" title="Detail Gudang">
                      <button class="btn btn-primary btn-xs"><span class="fa fa-info"></span></button>
                    </a>
                    <a href="{{ route('users.approve', ['id' => $user->id]) }}" data-toggle="tooltip" title="Approve">
                      <button class="btn btn-success btn-xs"><span class="fa fa-check"></span></button>
                    </a>
                    <a href="{{ route('users.edit', ['id' => $user->id]) }}" data-toggle="tooltip" title="Edit">
                      <button class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span></button>
                    </a>
                    {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'style' => 'display:inline;']) }}
                      <button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"><span class="fa fa-trash"></span></button>
                      {{ Form::close() }}
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" media="screen,projection">
@endpush

@include('shared.datatable')
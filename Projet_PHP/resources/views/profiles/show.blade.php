@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Birth Date</td>
          <td>Telephone</td>
          <td>Address</td>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td>{{$profile->id}}</td>
          <td>{{$profile->firstName}}</td>
          <td>{{$profile->lastName}}</td>
          <td>{{$profile->birthDate}}</td>
          <td>{{$profile->telNbr}}</td>
          <td>{{$profile->address}}</td>
          <td>
            <a class="dropdown-item" href="{{ route('edit') }}"
              onclick="event.preventDefault();
                document.getElementById('edit-form').submit();">
              {{ __('Edit Profile') }}
            </a>
            <form id="edit-form" action="{{ route('edit') }}" method="GET" style="display: none;">
              @csrf
            </form>
          </td>
        </tr>
    </tbody>
  </table>
<div>
@endsection
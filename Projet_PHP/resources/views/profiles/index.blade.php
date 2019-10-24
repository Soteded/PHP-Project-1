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
  
  <div class="container">
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
          @foreach($profiles as $profile)
          <tr>
              <td>{{$profile->id}}</td>
              <td>{{$profile->firstName}}</td>
              <td>{{$profile->lastName}}</td>
              <td>{{$profile->birthDate}}</td>
              <td>{{$profile->telNbr}}</td>
              <td>{{$profile->address}}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  
  {{ $profiles->links() }}
  

<div>
@endsection
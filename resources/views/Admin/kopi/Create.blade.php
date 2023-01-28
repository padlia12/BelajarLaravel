@extends('backend.master')
@section('content')
<div class="card card-body">
      <form action="{{route('kopi-store')}}" method="post">
      @csrf
  <div class="form-group">
    <label for="Name">Name</label>
    <input name="Name" class="form-control" id="Name">
      @error('Name')
      <span class="text-danger">
      <strong>{{$message}}</strong>
      </span>
      @enderror
  </div>
  <div class="form-group">
    <label for="price">price</label>
    <input name="price" class="form-control" id="price">
    @error('price')
      <span class="text-danger">
      <strong>{{$message}}</strong>
      </span>
      @enderror
  </div>
  <div class="form-group">
    <label for="brand">brand</label>
    <input name="brand" class="form-control" id="brand">
    @error('brand')
      <span class="text-danger">
      <strong>{{$message}}</strong>
      </span>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
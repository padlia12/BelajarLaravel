@extends('backend.master')
@section('content')
<div class="card card-body">
      <form action="{{route('kopi-update',$kopi->id)}}"method="post">
      @csrf
      @method("put")
         <div class="mb-3">
            <label for="Name">Name</label>
            <input name="Name" type="text" value="{{$kopi->Name}}"class="form-control" id="Name">
            @error('Name')
            <span class="text-danger">
                <strong>{{$message}}</strong>
            </span>
            @enderror
         </div>
            <div class="mb-3">
            <label for="price">price</label>
            <input name="price"  type="text" value="{{$kopi->price}}" class="form-control" id="price">
            @error('price')
            <span class="text-danger">
                <strong>{{$message}}</strong>
            </span>
            @enderror
         </div>
            <div class="mb-3">
            <label for="brand">brand</label>
            <input name="brand" type="text" value="{{$kopi->brand}}"  class="form-control" id="brand">
            @error('brand')
            <span class="text-danger">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
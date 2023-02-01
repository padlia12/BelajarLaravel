@extends('backend.master')
@section('content')

<div class="card card-body">
  @if (Auth::user()->role=="admin")
<a href="{{Route('kopi-create')}}"><button class="btn btn-success">+ tambahkan data</button></a>
  @endif
    <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Merek</th>
            @if (Auth::user()->role=="admin")
            <th scope="col">Action</th>
            @endif
          </tr>
        </thead>
        <tbody>
        @foreach ($kopi as $key => $item)
         <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->Name }}</td>
            <td>{{$item->price}}</td>
             <td>{{$item->brand}}</td>
             @if (Auth::user()->role=="admin")
             <td>
                <a class="btn btn-primary" href="{{Route('kopi-edit', $item->id)}}">
                    Edit
                </a>
                <form action="{{Route('kopi-delete', $item->id)}}"
                    method="post" style="display: inline"
                    class="form-check-inline">
                    @csrf
                    @method('Delete')
                    <button class="btn btn-danger"
                    type="submit">Hapus</button>
                </form>
             </td>
             @endif
         </tr>
         @endforeach
         </tbody>
    </table>
    </div>
    <div class="mt-2 float-right">
      {{$kopi->links()}}
    </div>
    @if(session('status'))
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Sukses!',
      text: "{{session('status')}}",
    });
    </script>
@endif 
@endsection



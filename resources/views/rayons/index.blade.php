@extends('layouts.master')

@section('content')
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="float-left">
            <h2>Data Rayon</h2>
         </div>
         <div class="float-right">
            <a class="btn btn-success" href="{{ route('rayons.create') }}"> Create</a>
         </div>
      </div>
   </div>
   <br>
   @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ $message }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
   @endif

   <table class="table table-bordered">
      <tr>
         <th>No</th>
         <th>Nama Rayon</th>
         <th width="280px">Action</th>
      </tr>
      @foreach ($rayons as $rayon)
         <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon }}</td>
            <td>
               <form action="{{ route('rayons.destroy', $rayon->id) }}" method="POST">

                  <a class="btn btn-primary" href="{{ route('rayons.edit', $rayon->id) }}">Edit</a>

                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger">Delete</button>
               </form>
            </td>
         </tr>
      @endforeach
   </table>

   {!! $rayons->links() !!}

@endsection

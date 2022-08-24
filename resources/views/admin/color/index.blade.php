@extends('layouts/admin')
@section('title', 'Paper index')
@section('content')

{{-- // Session message  --}}

@include('layouts/include/admin/session')

      <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3> Paper Type  </h3>
            <a href="{{url('admin/color/create')}}" class="btn btn-primary btn-sm "> Add Paper Type  </a>
        </div>
       <div class="card-body">
        <table class="table table-border table-striped">
          <thead>
            <tr>
              <th> ID </th>
              <th> Paper Type  </th>
              <th> Paper  Code </th>
              <th> Status </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody> 
           @foreach ($colors as $color)
           <tr>
            <td> {{$color->id}} </td>
            <td> {{$color->name}}</td>
            <td> {{$color->code}}</td>
            <td> {{$color->status == 1? 'hidden': 'visible'}} </td>
            <td> 
              <div class="d-flex">
                <a href="/admin/color/{{$color->id}}/edit" class="btn btn-success btn-sm me-2"> Edit </a>
              <form action="/admin/color/{{$color->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to delete')" > Delete </button>
              </form>
              </div>
            </td>
          </tr>
           @endforeach
          </tbody>
        </table>
       </div>
       
      </div>

@endsection


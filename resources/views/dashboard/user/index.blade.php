@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-6">
    {{-- <a class="btn btn-primary mb-3" href="/dashboard/categories/create">Tambah Data</a> --}}
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          {{-- <th scope="col">Action</th> --}}
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $user )

        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->name }}</td>
          {{-- <td>
            <a href="/dashboard/user/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('yang bener?')"><span data-feather="x-circle"></span></button>
            </form>
        </td> --}}

        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

@endsection

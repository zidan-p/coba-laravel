@extends('dashboard.layouts.main')

@section('container')
    <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts :o</h1>
    </div>
    
    <div class="table-responsive col-lg-9">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="/dashboard/posts/{{ $post->slug }}" class="badge rounded-pill bg-info"> {{-- akan ditangani oleh show pada controller --}}
                    <span data-feather="eye" class="align-text-bottom"></span>
                </a>
                <a href="" class="badge rounded-pill bg-warning">
                    <span data-feather="edit" class="align-text-bottom"></span>
                </a>
                <a href="" class="badge rounded-pill bg-danger">
                    <span data-feather="x-circle" class="align-text-bottom"></span>
                </a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </div>

@endsection
@extends('layouts.app')

@section('title') Index @endsection
@section('content')
<div class="text-center">
  <a href="{{route('posts.create')}}" class="mt-4 btn "><x-button type='success' action='Create Post'></x-button></a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->slug}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at->format('Y-m-d')}}</td>
        <td>
            <a href="{{route('posts.show', $post['id'])}}" class="btn "><x-button type='primary' action='View'></x-button></a>
            {{-- <a href="{{route('posts.show', ['post' =>$post['id']])}}" class="btn btn-info">View</a> --}}
            <a href="{{route('posts.edit', $post['id'])}}" class="btn "><x-button type='secondary' action='Edit'></x-button></a>
            {{-- <x-button type='danger'  action='Delete' dataTogle='modal' dataTarget='#exampleModal{{$post['id']}}'></x-button> --}}
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post['id']}}">
              Delete
            </button>
          </td>
          <td>
            <div class="modal  fade " id="exampleModal{{$post['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog  ">
                <div class="modal-content bg-danger">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Confirm Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center text-white">
                    Are You Sure You Want To Delete This Post
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success " data-bs-dismiss="modal">NO</button>
                    <form action="{{route('posts.destroy',$post['id'])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <input type="submit" class="btn btn-warning text-white " value="YES">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="w-50 m-auto">{{$posts->onEachSide(2)->links()}}</div>
   <!-- Button trigger modal -->
   {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  {{-- <div class="modal fade" id="exampleModal{{$post['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{route('posts.destroy',$post['id'])}}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="submit">
          </form>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
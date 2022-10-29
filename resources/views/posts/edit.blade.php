@extends('layouts.app')

@section('title') create @endsection
@section('content')
        <form method="POST" action="{{route('posts.update',$post['id'])}}">
          @csrf
          @method('put')
          <div> <input type="hidden" name="post-id" value="{{$post->id}}"></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" type="text" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="description"  type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">{{$post->description}} </textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="posted-by" class="form-control @error('posted-by') is-invalid @enderror">
                  <option value="{{$post->user->id}}">{{$post->user->name}}</option>
                </select>
                @error('posted-by')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

@endsection
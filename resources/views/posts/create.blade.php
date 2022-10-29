@extends('layouts.app')

@section('title') create @endsection
@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
        <form method="POST" action="{{route('posts.store')}}">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="description"  type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"> </textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="posted-by" @error('posted-by') is-invalid @enderror class="form-control">
                  @foreach ($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
                @error('posted-by')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
         
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
   
@endsection
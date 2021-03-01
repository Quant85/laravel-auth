@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-12">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div>
      @endif
    </div>
    <div>
      <a style="margin: 19px;" href="{{ route('admin.posts.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Body</th>
          <th>Slug</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td scope="row">{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->slug}}</td>
            <td>
              <a href="{{route('admin.posts.show', ['post' => $post->slug])}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>
              <a href="{{route('admin.posts.edit', ['post' => $post->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy-{{$post->id}}"><i class="fas fa-trash fa-xs fa-fw"></i></button>

                  {{-- Start Add Modal -  --}}
                  <div class="modal fade" id="destroy-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="post-destroy-{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="#destroy-{{$post->id}} title">Delete Post</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          🚨 Sei sicuro di volerlo cancellare? 🚨 <br> 🚨 E se poi te ne penti?! 🚨
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{ route('admin.posts.destroy',['post' => $post->slug])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- End Add Model --}}
              </td>
              <td>
                  {{-- <form action="{{ route('admin.posts.destroy',['post' => $post->slug])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-xs fa-fw"></i></button>
                  </form> --}}
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
@endsection
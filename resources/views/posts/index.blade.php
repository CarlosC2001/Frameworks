@extends('app')

@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('post')}}">
        @csrf

        <div class="mb-3 col">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
            <label for="title" class="form-label">Título Del Post</label>
            <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Comprar la cena">

            <label for="category_id" class="form-label">Categoria Del Post</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Crear Post" class="btn btn-primary my-2" />
        </div>
    </form>

    <div >
        @foreach ($posts as $post)
        
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('post-edit', ['id' => $post->id]) }}">{{ $post->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('post-destroy', [$post->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            
        @endforeach
    </div>
    </div>
</div>
@endsection
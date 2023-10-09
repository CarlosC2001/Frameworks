@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="card">
                <button type="button" class="btn btn-primary btn-lg" onclick="location.href='{{ route('post') }}'">POST</button>
                <button type="button" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('categories.index') }}'">CATEGORY</button>
 
            </div>
        </div>
        </div>
</div>
@endsection

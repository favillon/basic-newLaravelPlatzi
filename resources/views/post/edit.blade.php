@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Articulos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.update') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Titulo *</label>
                            <input type="text" name="title" 
                                    class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Imagen</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido *</label>
                            <textarea name="body"  rows="6" class="form-control" required>{{old('body')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="iframe">Contenido Multimedia</label>
                            <textarea name="iframe"  rows="6" class="form-control">{{ old('iframe') }}</textarea>
                        </div>
                        <div class="form-group">
                            @method('PUT')
                            @csrf
                            <input type="submit" value="Actualizar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

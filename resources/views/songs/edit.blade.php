@extends('layouts.app')

@section('title', 'Edit song data: "' . $song->title . '"')

@section('content')
    <form action="{{ route('songs.update', $song) }}" method="POST" class="row gy-5">
        @csrf
        @method('PUT')

        <div class="col-4">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
            value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="album" class="form-label">Album</label>
            <input type="text" class="form-control @error('album') is-invalid @enderror" name="album" id="album"
            value="{{ old('album') }}">
            @error('album')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author"
            value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control @error('editor') is-invalid @enderror" name="editor" id="editor"
                value="{{ old('editor') }}">
            @error('editor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="length" class="form-label">Durata</label>
            <input type="time" class="form-control @error('length') is-invalid @enderror" name="length" id="length"
                value="{{ old('length') }}">
            @error('length')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="poster" class="form-label">URL Img</label>
            <textarea type="text" class="form-control @error('poster') is-invalid @enderror" name="poster" id="poster">{{ old('poster') }}</textarea>
            @error('poster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Salva</button>
        </div>
    </form>
@endsection
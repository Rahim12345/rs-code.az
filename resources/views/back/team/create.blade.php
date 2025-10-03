@extends('back.layouts.master')

@section('css')
    <style>
    .special{
        font-weight: bold !important;
        color: #fff !important;
        background: #1e1e26 !important;
        text-transform: uppercase;
    }
    </style>
@endsection

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-12">
            <a href="{{ route('team.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
                @csrf
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="src">Cover</label>
                        <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                        @error('src')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="full_name">Full name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control @error('full_name') is-invalid  @enderror" value="{{ old('full_name') }}">
                        @error('full_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="professional">Professional</label>
                        <input type="text" name="professional" id="professional" class="form-control @error('professional') is-invalid  @enderror" value="{{ old('professional') }}">
                        @error('professional')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary float-right">ADD</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')

@endsection

@extends('back.layouts.master')

@section('content')
    <div class="content m-3">
        <div class="mb-3 col-md-12">
            <a href="{{ route('services.index') }}" class="btn btn-primary w-100">All</a>
            <form action="{{ route('services.update',$service->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                    @if($service->src)
                        <img src="{{ asset('files/services/'.$service->src) }}" style="width: 100px" alt="">
                    @endif
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="src">Cover</label>
                        <input type="file" class="form-control @error('src') is-invalid  @enderror" name="src" id="src" value="{{ old('src') }}">
                        @error('src')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="alt">ALT</label>
                        <input type="text" class="form-control @error('alt') is-invalid  @enderror" id="alt" name="alt" value="{{ old('alt',$service->alt) }}">
                        @error('alt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="name_az">Name(AZ)</label>
                        <input type="text" class="form-control @error('name_az') is-invalid  @enderror" name="name_az" id="menu_az" value="{{ old('name_az',$service->name_az) }}">
                        @error('name_az')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="name_en">Name(EN)</label>
                        <input type="text" class="form-control @error('name_en') is-invalid  @enderror" name="name_en" id="menu_en" value="{{ old('name_en',$service->name_en) }}">
                        @error('name_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="name_ru">Name(RU)</label>
                        <input type="text" class="form-control @error('name_ru') is-invalid  @enderror" name="name_ru" id="menu_en" value="{{ old('name_ru',$service->name_ru) }}">
                        @error('name_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary float-end">EDIT</button>
                </div>
            </form>
        </div>
    </div>
@endsection

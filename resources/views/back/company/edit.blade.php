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
            <a href="{{ route('company.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        @if($company->src != '')
                            <img src="{{ asset('files/company/'.$company->src) }}" alt="" style="width: 200px">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="src">Cover</label>
                        <input type="file" class="form-control @error('src') is-invalid  @enderror" id="src" name="src">
                        @error('src')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="alt">ALT</label>
                        <input type="text" class="form-control @error('alt') is-invalid  @enderror" id="alt" name="alt" value="{{ old('alt',$company->alt) }}">
                        @error('alt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="text_en">Group</label>
                        <select name="group_id" id="group_id" class="form-control @error('group_id') is-invalid  @enderror">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{ old('group_id',$company->group_id) == $group->id ? 'selected' : '' }} class="special">{{ $group->name_az }}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid  @enderror" value="{{ old('name',$company->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="about_az">About(AZ)</label>
                        <textarea name="about_az" id="about_az" cols="30" rows="4" class="form-control @error('about_az') is-invalid  @enderror">{{ old('about_az',$company->about_az) }}</textarea>
                        @error('about_az')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="about_en">About(EN)</label>
                        <textarea name="about_en" id="about_en" cols="30" rows="4" class="form-control @error('about_en') is-invalid  @enderror">{{ old('about_en',$company->about_en) }}</textarea>
                        @error('about_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="about_ru">About(RU)</label>
                        <textarea name="about_ru" id="about_ru" cols="30" rows="4" class="form-control @error('about_ru') is-invalid  @enderror">{{ old('about_ru',$company->about_ru) }}</textarea>
                        @error('about_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary float-right">Əlavə et</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script>
        let csrf_token = $('meta[name="csrf-token"]').attr('content');
        let rootUrl = $('#rootUrl').val();

        CKEDITOR.replace('about_az',{
            language: 'az',
            filebrowserImageBrowseUrl: rootUrl + '/file-explore?type=Files',
            filebrowserImageUploadUrl: rootUrl + '/file-explore/upload?type=Files&_token=' + csrf_token,
            filebrowserBrowseUrl: rootUrl + '/file-explore?type=Files',
            filebrowserUploadUrl: rootUrl + '/file-explore/upload?type=Files&_token=' + csrf_token,
        });

        CKEDITOR.replace('about_en',{
            language: 'az',
            filebrowserImageBrowseUrl: rootUrl + '/file-explore?type=Files',
            filebrowserImageUploadUrl: rootUrl + '/file-explore/upload?type=Files&_token=' + csrf_token,
            filebrowserBrowseUrl: rootUrl + '/file-explore?type=Files',
            filebrowserUploadUrl: rootUrl + '/file-explore/upload?type=Files&_token=' + csrf_token,
        });

        CKEDITOR.replace('about_ru',{
            language: 'az',
            filebrowserImageBrowseUrl: rootUrl + '/file-explore?type=Files',
            filebrowserImageUploadUrl: rootUrl + '/file-explore/upload?type=Files&_token=' + csrf_token,
            filebrowserBrowseUrl: rootUrl + '/file-explore?type=Files',
            filebrowserUploadUrl: rootUrl + '/file-explore/upload?type=Files&_token=' + csrf_token,
        });
    </script>
@endsection

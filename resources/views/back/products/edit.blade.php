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
            <a href="{{ route('product.index') }}" class="btn btn-primary w-100">Bütün</a>
            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" class="mb-5">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group mb-3 col-md-8">
                        @if($product->src)
                            <img src="{{ asset('files/products/covers/'.$product->src) }}" style="width: 100px" alt="">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-8">
                        <label class="form-label" for="src">Cover</label>
                        <input type="file" class="form-control @error('src') is-invalid  @enderror" name="src" id="src" value="{{ old('src') }}">
                        @error('src')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="service_id">Servis</label>
                        <select name="service_id" id="service_id" class="form-control @error('title_az') is-invalid  @enderror">
                            <option value="" class="special">Birini seçin</option>
                            @foreach($services as $service)
                                <option class="special" value="{{ $service->id }}" {{ $service->id == old('service_id',$product->service_id) ? 'selected' : '' }}>{{ $service->name_az }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="alt">ALT</label>
                        <input type="text" class="form-control @error('alt') is-invalid  @enderror" id="alt" name="alt" value="{{ old('alt',$product->alt) }}">
                        @error('alt')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-12" id="youtubeLink" style="display: {{ old('service_id',$product->service_id) == 49 ? 'block' : 'none' }}">
                        <label class="form-label" for="link">Youtube link</label>
                        <input type="text" class="form-control @error('link') is-invalid  @enderror" id="link" name="link" value="{{ old('link',$product->link) }}">
                        @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="title_az">Title(AZ)</label>
                        <input type="text" class="form-control @error('title_az') is-invalid  @enderror" name="title_az" id="title_az" value="{{ old('title_az',$product->title_az) }}">
                        @error('title_az')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="title_en">Title(EN)</label>
                        <input type="text" class="form-control @error('title_en') is-invalid  @enderror" name="title_en" id="title_en" value="{{ old('title_en',$product->title_en) }}">
                        @error('title_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="title_ru">Title(RU)</label>
                        <input type="text" class="form-control @error('title_ru') is-invalid  @enderror" name="title_ru" id="title_ru" value="{{ old('title_ru',$product->title_ru) }}">
                        @error('title_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="text_az">Text(AZ)</label>
                        <textarea name="text_az" id="text_az" class="form-control @error('text_az') is-invalid  @enderror" cols="30" rows="4">{{ old('text_az',$product->text_az) }}</textarea>
                        @error('text_az')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="text_en">Text(EN)</label>
                        <textarea name="text_en" id="text_en" class="form-control @error('text_en') is-invalid  @enderror" cols="30" rows="4">{{ old('text_en',$product->text_en) }}</textarea>
                        @error('text_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-4">
                        <label class="form-label" for="text_ru">Text(RU)</label>
                        <textarea name="text_ru" id="text_ru" class="form-control @error('text_ru') is-invalid  @enderror" cols="30" rows="4">{{ old('text_ru',$product->text_ru) }}</textarea>
                        @error('text_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="company_id">Company</label>
                        <select name="company_id" id="company_id"  class="form-control @error('company_id') is-invalid  @enderror">
                            <option class="special" value="">Birini seçin</option>
                            @foreach($companies as $company)
                                <option class="special" value="{{ $company->id }}" {{ old('company_id',$product->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3 col-md-12">
                        <label class="form-label" for="images">Images</label>
                        <input type="file" class="form-control @error('images') is-invalid  @enderror" name="images[]" id="images" value="{{ old('images') }}" multiple="multiple" accept="image/*">
                        @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($product->images as $image)
                            <div class="form-group mb-3 col-md-2" style="border: 2px solid black">
                                <img src="{{ asset('files/products/images/'.$image->src) }}" alt="" style="width: 100px">
                                <a href="{{ route('image.deleter',['id'=>$image->id]) }}" onclick="if (confirm('Şəkili silməl istədiyinizdən əminsiniz?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger float-end" title="Delete">
                                    <i class="fa fa-times"></i>
                                </a>
                                <input type="number" min="0" max="100" class="form-control orderNo" value="{{ $image->order_no }}" data-id="{{ $image->id }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary float-right">EDIT</button>
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

        CKEDITOR.replace('text_az',{
            language: 'az',
            filebrowserImageBrowseUrl: rootUrl + '/laravel-filemanager?type=Files',
            filebrowserImageUploadUrl: rootUrl + '/laravel-filemanager/upload?type=Files&_token=' + csrf_token,
            filebrowserBrowseUrl: rootUrl + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: rootUrl + '/laravel-filemanager/upload?type=Files&_token=' + csrf_token,
        });

        CKEDITOR.replace('text_en',{
            language: 'az',
            filebrowserImageBrowseUrl: rootUrl + '/laravel-filemanager?type=Files',
            filebrowserImageUploadUrl: rootUrl + '/laravel-filemanager/upload?type=Files&_token=' + csrf_token,
            filebrowserBrowseUrl: rootUrl + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: rootUrl + '/laravel-filemanager/upload?type=Files&_token=' + csrf_token,
        });

        CKEDITOR.replace('text_ru',{
            language: 'az',
            filebrowserImageBrowseUrl: rootUrl + '/laravel-filemanager?type=Files',
            filebrowserImageUploadUrl: rootUrl + '/laravel-filemanager/upload?type=Files&_token=' + csrf_token,
            filebrowserBrowseUrl: rootUrl + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: rootUrl + '/laravel-filemanager/upload?type=Files&_token=' + csrf_token,
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#service_id").select2({
                width: '100%'
            });

            $("#company_id").select2({
                width: '100%'
            });

            $("#service_id").change(function () {
                let service_id = $(this).val();
                if (service_id == 49)
                {
                    $('#youtubeLink').css('display','block');
                }
                else
                {
                    $('#youtubeLink').css('display','none');
                }
            });
        });

        $(document).on('input','.orderNo', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let  imgID      = $(this).attr('data-id');
            let  order_no   = $(this).val();
            $.ajax({
                type : 'POST',
                data : {
                    imgID       : imgID,
                    order_no    : order_no
                },
                url : '{!! route('image.ordered') !!}',
                success: function (response) {
                    toastr.success('Sıra nömrəsi dəyişdirildi');
                },
                error: function (myErrors)
                {
                    $.each(myErrors.responseJSON.errors, function (key, error) {
                        toastr.success(error);
                    });
                }
            });
        });
    </script>
@endsection

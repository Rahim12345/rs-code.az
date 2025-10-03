@extends('back.layouts.master')

@section('content')
    
<style>
 .mg{
   height: 400px;
 }
</style>

<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Bloq</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{ $blog->id }}">
              <label>Slug</label>
              <div class="form-group">
                <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control" id="slug" rows="30">
                @if ($errors->first('slug'))
                <span class="alert alert-danger">{{ $errors->first('slug') }}</span>
                @endif
              </div>
              <label>Başlıq Azərbaycanca</label>
              <div class="form-group">
                <input type="text" name="title_az" value="{{ $blog->title_az }}" class="form-control" id="title_az" rows="30">
                @if ($errors->first('title_az'))
                <span class="alert alert-danger">{{ $errors->first('title_az') }}</span>
                @endif
              </div>
              <label>Başlıq Rusca</label>
              <div class="form-group">
                <input type="text" name="title_ru" value="{{ $blog->title_ru }}" class="form-control" id="title_ru" rows="30">
                @if ($errors->first('title_ru'))
                <span class="alert alert-danger">{{ $errors->first('title_ru') }}</span>
                @endif
              </div>
              <label>Başlıq Ingilisce</label>
              <div class="form-group">
                <input type="text" name="title_en" value="{{ $blog->title_en }}" class="form-control" id="title_en" rows="30">
                @if ($errors->first('title_en'))
                <span class="alert alert-danger">{{ $errors->first('title_en') }}</span>
                @endif
              </div>
              <label>Kiçik başlıq Azərbaycanca</label>
              <div class="form-group">
                <input type="text" name="review_az" value="{{ $blog->review_az }}" class="form-control" id="review_az">
                @if ($errors->first('review_az'))
                <span class="alert alert-danger">{{ $errors->first('review_az') }}</span>
                @endif
              </div>
              <label>Kiçik başlıq İngiliscə</label>
              <div class="form-group">
                <input type="text" name="review_en" value="{{ $blog->review_en }}" class="form-control" id="review_en">
                @if ($errors->first('review_en'))
                <span class="alert alert-danger">{{ $errors->first('review_en') }}</span>
                @endif
              </div>
              <label>Kiçik başlıq Rusca</label>
              <div class="form-group">
                <input type="text" name="review_ru" value="{{ $blog->review_ru }}" class="form-control" id="review_ru">
                @if ($errors->first('review_ru'))
                <span class="alert alert-danger">{{ $errors->first('review_ru') }}</span>
                @endif
              </div>
              <label>Tarix Azərbaycanca</label>
              <div class="form-group">
                <input type="text" name="date_az" value="{{ $blog->date_az }}" class="form-control" id="date_az">
                @if ($errors->first('date_az'))
                <span class="alert alert-danger">{{ $errors->first('date_az') }}</span>
                @endif
              </div>
              <label>Tarix Rusca</label>
              <div class="form-group">
                <input type="text" name="date_ru" value="{{ $blog->date_ru }}" class="form-control" id="date_ru">
                @if ($errors->first('date_ru'))
                <span class="alert alert-danger">{{ $errors->first('date_ru') }}</span>
                @endif
              </div>
              <label>Tarix İngiliscə</label>
              <div class="form-group">
                <input type="text" name="date_en" value="{{ $blog->date_en }}" class="form-control" id="date_en">
                @if ($errors->first('date_en'))
                <span class="alert alert-danger">{{ $errors->first('date_en') }}</span>
                @endif
              </div>
              <label>Mətn Azərbaycanca</label>
              <div class="form-group">
                <textarea name="text_az" class="form-control mg" id="text_az">{!! $blog->text_az !!}</textarea>
                @if ($errors->first('text_az'))
                <span class="alert alert-danger">{{ $errors->first('text_az') }}</span>
                @endif
              </div>  
              <label>Mətn Rusca</label>
              <div class="form-group">
                <textarea name="text_ru" class="form-control mg" id="text_ru">{!! $blog->text_ru !!}</textarea>
                @if ($errors->first('text_ru'))
                <span class="alert alert-danger">{{ $errors->first('text_ru') }}</span>
                @endif
              </div> 
              <label>Mətn İngiliscə</label>
              <div class="form-group">
                <textarea name="text_en" class="form-control mg" id="text_en">{!! $blog->text_en !!}</textarea>
                @if ($errors->first('text_en'))
                <span class="alert alert-danger">{{ $errors->first('text_en') }}</span>
                @endif
              </div> 
              <div class="form-group">
                <h4 class="card-title text-dark">Şəkil:</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                    <img src="/images/blog/{{ $blog->photo }}" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                    <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Şəkli seç</span>
                        <span class="fileinput-exists">Dəyiş</span>
                        <input type="file" id="photo" value="{{ old('photo') }}" name="photo">
                    </span>
                    @if ($errors->first('photo'))
                <span class="alert alert-danger">{{ $errors->first('photo') }}</span>
                @endif
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                    </div>
                </div>
              </div> 
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#text_az' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#text_en' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#text_ru' ) )
        .catch( error => {
            console.error( error );
        } );

        
</script>
@endsection
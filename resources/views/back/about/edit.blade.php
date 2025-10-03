@extends('back.layouts.master')

@section('content')
    
<style>
 .mg{
   height: 400px;
 }
 .ck.ck-editor__main p{
    color: #000;
}
</style>

<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Stacked Form</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="">
              @csrf
              <label>Haqqımızda Azərbaycanca</label>
              <div class="form-group">
                <textarea name="about_az" class="mg text-dark" id="about_az" rows="30">{!! $about->about_az !!}</textarea>
                @if ($errors->first('about_az'))
                <span class="alert alert-danger">{{ $errors->first('about_az') }}</span>
                @endif
              </div>
              <label>Haqqımızda İngiliscə</label>
              <div class="form-group">
                <textarea name="about_en" class="form-control mg" id="about_en">{!! $about->about_en !!}</textarea>
                @if ($errors->first('about_az'))
                <span class="alert alert-danger">{{ $errors->first('about_en') }}</span>
                @endif
              </div>
              <label>Haqqımızda Rusca</label>
              <div class="form-group">
                <textarea name="about_ru" class="form-control mg" id="about_ru">{!! $about->about_ru !!}</textarea>
                @if ($errors->first('about_az'))
                <span class="alert alert-danger">{{ $errors->first('about_ru') }}</span>
                @endif
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
        .create( document.querySelector( '#about_az' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#about_en' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#about_ru' ) )
        .catch( error => {
            console.error( error );
        } );

        
</script>
@endsection
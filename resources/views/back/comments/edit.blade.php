@extends('back.layouts.master')

@section('content')

<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Comments</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              <label>Azərbaycanca ad</label>
              <div class="form-group">
                <input type="text" name="name_az" value="{{ $comment->name_az }}" class="form-control" id="name_az" rows="30">
                @if ($errors->first('name_az'))
                <span class="alert alert-danger">{{ $errors->first('name_az') }}</span>
                @endif
              </div>
              <label>Rusca ad</label>
              <div class="form-group">
                <input type="text" name="name_ru" value="{{ $comment->name_ru }}" class="form-control" id="name_ru" rows="30">
                @if ($errors->first('name_ru'))
                <span class="alert alert-danger">{{ $errors->first('name_ru') }}</span>
                @endif
              </div>
              <label>İngiliscə ad</label>
              <div class="form-group">
                <input type="text" name="name_en" value="{{ $comment->name_en }}" class="form-control" id="name_en" rows="30">
                @if ($errors->first('name_en'))
                <span class="alert alert-danger">{{ $errors->first('name_en') }}</span>
                @endif
              </div>
              <label>Azərbaycanca rəy</label>
              <div class="form-group">
                <input type="text" name="comment_az" value="{{ $comment->comment_az }}" class="form-control" id="comment_az" rows="30">
                @if ($errors->first('comment_az'))
                <span class="alert alert-danger">{{ $errors->first('comment_az') }}</span>
                @endif
              </div>
              <label>İngiliscə rəy</label>
              <div class="form-group">
                <input type="text" name="comment_en" value="{{ $comment->comment_en }}" class="form-control" id="comment_en" rows="30">
                @if ($errors->first('comment_en'))
                <span class="alert alert-danger">{{ $errors->first('comment_en') }}</span>
                @endif
              </div>
              <label>Rusca rəy</label>
              <div class="form-group">
                <input type="text" name="comment_ru" value="{{ $comment->comment_ru }}" class="form-control" id="comment_ru" rows="30">
                @if ($errors->first('comment_ru'))
                <span class="alert alert-danger">{{ $errors->first('comment_ru') }}</span>
                @endif
              </div>
              <div class="form-group">
                <h4 class="card-title text-dark">Şəkil:</h4>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                    <img src="/images/comments/{{ $comment->photo }}" alt="...">
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
@endsection
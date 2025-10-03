@extends('back.layouts.master')

@section('jquery')

<script>

  $(function(){
    num = 2;
    $(".photo-number:last").html(num);
    $(".addphoto").click(function(){
      if(num > 15)
      {
        alert("15'dən artıq şəkil əlavə edə bilməzsiniz!!");
        return false;
      }
    var copy = $(".copy-form").html();
    num++;
    $(".photo-number:last").html(num);
    $(".zone").append(copy);
    });

    editnum = $("body").find(".photo-number-edit:first").html();

    $(".addphotoedit").click(function(){
      if(editnum > 15)
      {
        alert("15'dən artıq şəkil əlavə edə bilməzsiniz!!");
        return false;
      }
    var copy = $(".copy-form").html();
    editnum++;
    $(".photo-number-edit:last").html(editnum);
    $(".zone-edit").append(copy);
    });

    $(".add").click(function(){
      var num = $("#projects").val();
    })

    $(".btn-file").click(function(){
       val =  $(this).children("#first_hidden").val();
       alert(val);
    })

    $(".delete").click(function(){
      var id = $(this).data('id');
      if(confirm('Silmək istədiyinizə əminsiniz?'))
      {
          $.ajax({
          url: '/admin/delete-project',
          type: "post",
          data: {id:id},
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          success: function(data){
            alert(data.message);
            if(data.status == 1)
            {
              $("tr#"+data.id).remove();
            }
          },
          error: function(e){
              alert(e);
          }
          })
      }
      else
      {
        return false;
      }
      
    })

  $(".edit").click(function(){
    $("#projects").trigger('reset');
    $(".copy-form-zone").not(".copy-form-zone:last").remove();
    var id = $(this).data('id');
    $.ajax({
      url: "/admin/edit-project",
      type: "POST",
      data: {id:id},
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(e){
        $("#name_edit").val(e.project.name);
        $("#link_edit").val(e.project.link);
        $("#category_edit").val(e.project.kateqoriya);
        $("#slug_edit").val(e.project.slug);
        $("#tarix_edit").val(e.project.tarix);
        $("#id").val(e.project.id);
        photo = e.images.split('|');
        $("#thumb").attr("src", "/images/projects/"+photo[0]);
        $("#first_hidden").val(photo[0]);
        num = 2;
        for (let index = 1; index < photo.length; index++) {
          $(".photo-number-edit:last").html(num);
        $("#thumbother").attr("src", "/images/projects/"+photo[index]);
        $("#other_hiddens").val(photo[index]);
        var copy = $(".copy-form-edit").html();
        $(".zone-edit").append(copy);
        num++;
          
        }
        
      },
      error: function(){
        alert("error");
      }
    })
  })

  })
  
</script>
    
@endsection

@section('content')

{{-- Store Modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="projects" enctype="multipart/form-data">
              @csrf
                <div class="zone">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Ad:</label>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control text-dark" >
                  @if ($errors->first('name'))
                  <span class="alert alert-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Link:</label>
                  <input type="text" name="link" id="link" value="{{ old('link') }}" class="form-control text-dark" >
                  @if ($errors->first('link'))
                  <span class="alert alert-danger">{{ $errors->first('link') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Tarix:</label>
                  <input type="text" name="tarix" id="tarix" value="{{ old('tarix') }}" class="form-control text-dark" >
                  @if ($errors->first('tarix'))
                  <span class="alert alert-danger">{{ $errors->first('tarix') }}</span>
                  @endif
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Kateqoriya:</label>
                    <select name="category" id="category" value="{{ old('category') }}" class="form-control text-dark">
                      <option value="websites">Web Saytlar</option>
                      <option value="portfolio">Portfolio</option>
                      <option value="e-commerce">E-Ticarət</option>
                      <option value="blog">Blog</option>
                    </select>
                    @if ($errors->first('category'))
                    <span class="alert alert-danger">{{ $errors->first('category') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Slug:</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control text-dark" >
                    @if ($errors->first('slug'))
                    <span class="alert alert-danger">{{ $errors->first('slug') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <h4 class="card-title text-dark">Ana şəkil:</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                        <img src="../../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" id="photo" value="{{ old('photos') }}" name="photos[]">
                        </span>
                        @if ($errors->first('photos'))
                    <span class="alert alert-danger">{{ $errors->first('photos') }}</span>
                    @endif
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                  </div>
                </div>
                  <button type="button" class="btn btn-secondary addphoto">
                    Şəkil əlavə et +
                  </button>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  {{-- Store Modal End --}}



  {{-- Edit Modal --}}
  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editmodal">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="projects_edit" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" id="id" value="">
                <div class="zone-edit">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Ad:</label>
                  <input type="text" name="name" id="name_edit" value="{{ old('name') }}" class="form-control text-dark" >
                  @if ($errors->first('name'))
                  <span class="alert alert-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Link:</label>
                  <input type="text" name="link" id="link_edit" value="{{ old('link') }}" class="form-control text-dark" >
                  @if ($errors->first('link'))
                  <span class="alert alert-danger">{{ $errors->first('link') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Tarix:</label>
                  <input type="text" name="tarix" id="tarix_edit" value="{{ old('tarix') }}" class="form-control text-dark" >
                  @if ($errors->first('tarix'))
                  <span class="alert alert-danger">{{ $errors->first('tarix') }}</span>
                  @endif
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Kateqoriya:</label>
                    <select name="category" id="category_edit" value="{{ old('category') }}" class="form-control text-dark">
                      <option value="websites">Web Saytlar</option>
                      <option value="portfolio">Portfolio</option>
                      <option value="e-commerce">E-Ticarət</option>
                      <option value="blog">Blog</option>
                    </select>
                    @if ($errors->first('category'))
                    <span class="alert alert-danger">{{ $errors->first('category') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Slug:</label>
                    <input type="text" name="slug" id="slug_edit" value="{{ old('slug') }}" class="form-control text-dark" >
                    @if ($errors->first('slug'))
                    <span class="alert alert-danger">{{ $errors->first('slug') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <h4 class="card-title text-dark">Ana şəkil:</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                        <img src="../../assets/img/image_placeholder.jpg" id="thumb" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" id="photo" value="{{ old('photos') }}" name="photos[]">
                            <input type="hidden" id="first_hidden" name="photos_hidden[]">
                        </span>
                        @if ($errors->first('photos'))
                    <span class="alert alert-danger">{{ $errors->first('photos') }}</span>
                    @endif
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                  </div>
                </div>
                  <button type="button" class="btn btn-secondary addphotoedit">
                    Şəkil əlavə et +
                  </button>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
   {{-- Edit Modal End --}}

  <div class="content">
    <div class="row">
        
      <ol class="breadcrumb bg-transparent ml-3">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Library</a>
        </li>
        <li class="breadcrumb-item active">Data</li>
      </ol><br>
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="tools float-right">
              <div class="dropdown">
                <button type="button" class="btn btn-default dropdown-toggle btn-link btn-icon" data-toggle="dropdown">
                  <i class="tim-icons icon-settings-gear-63"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="/about/edit">Düzəliş Et</a>
                </div>
              </div>
            </div>
            <h4 class="card-title">İşlərimiz</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal">
                    Add
                  </button>
                <thead class="text-primary">
                  <tr>
                    <th>
                      Ad
                    </th>
                    <th>
                      Link
                    </th>
                    <th>
                      Kateqoriya
                    </th>
                    <th>
                        Slug
                    </th>
                    <th width="10%">
                        Foto
                    </th>
                    <th width="20%">

                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr id="{{ $project->id }}">
                        <td>
                          {{ $project->name }}
                        </td>
                        <td>
                          {{ $project->link }}
                        </td>
                        <td>
                          {{ $project->kateqoriya }}
                        </td>
                        <td>
                          {{ $project->slug }}
                        </td>
                        <td>
                          @foreach ($project->images as $i)
                            @if ($loop->first)
                            <img src="/images/projects/{{$i->photo}}" alt="">
                            @endif
                          @endforeach
                          
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary edit" data-id="{{ $project->id }}" data-toggle="modal" data-target="#editmodal">
                                Edit
                              </button>
                              <button type="button" class="btn btn-secondary delete" data-id="{{ $project->id }}">
                                Delete
                              </button>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="copy-form" style="display: none">
        <h4 class="card-title text-dark">Foto <span class="photo-number"></span>:</h4>
        <div class="fileinput photo-display fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
            <img src="../../assets/img/image_placeholder.jpg" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
            <span class="btn btn-rose btn-round btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="photos[]">
            </span>
            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
        </div>
  </div>

  <div class="copy-form-edit" style="display: none">
    <div class="copy-form-zone">
     <h4 class="card-title text-dark">Foto <span class="photo-number-edit"></span>:</h4>
      <div class="fileinput photo-display fileinput-new text-center" data-provides="fileinput">
          <div class="fileinput-new thumbnail">
          <img src="../../assets/img/image_placeholder.jpg" id="thumbother" alt="...">
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail"></div>
          <div>
          <span class="btn btn-rose btn-round btn-file">
              <span class="fileinput-new">Select image</span>
              <span class="fileinput-exists">Change</span>
              <input type="file" name="photos[]">
              <input type="hidden" name="photos_hidden[]" id="other_hiddens">
          </span>
          <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
          </div>
      </div>
    </div>
</div>

<div class="copy-form-add" style="display: none">
  <div class="copy-form-zone-add">
   <h4 class="card-title text-dark">Foto <span class="photo-number-edit-add"></span>:</h4>
    <div class="fileinput photo-display fileinput-new text-center" data-provides="fileinput">
        <div class="fileinput-new thumbnail">
        <img src="../../assets/img/image_placeholder.jpg" alt="...">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail"></div>
        <div>
        <span class="btn btn-rose btn-round btn-file">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="photos[]">
        </span>
        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
        </div>
    </div>
  </div>
</div>
  

 
@endsection
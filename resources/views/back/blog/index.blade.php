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
      alert(editnum);
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

    $(".delete").click(function(){
      var id = $(this).data('id');
      if(confirm('Silmək istədiyinizə əminsiniz?'))
      {
          $.ajax({
          url: '/admin/delete-blog',
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
          }
          })
      }
      else
      {
        return false;
      }
      
    })

  })
  
</script>
    
@endsection

@section('content')



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
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
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
            <h4 class="card-title">Bloqlar</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <a href="/admin/add-blog">
                <button type="button" class="btn btn-primary add">
                    Add
                  </button></a>
                <thead class="text-primary">
                  <tr>
                    <th>
                      Başlıq
                    </th>
                    <th>
                      Qısa Başlıq
                    </th>
                    <th>
                      Mətn
                    </th>
                    <th>
                        Tarix
                    </th>
                    <th width="10%">
                        Foto
                    </th>
                    <th width="20%">

                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr id="{{ $blog->id }}">
                        <td>
                          {{ $blog->title_az }}
                        </td>
                        <td>
                          {{ $blog->review_az }}
                        </td>
                        <td>
                          {!! \Illuminate\Support\Str::limit($blog->text_az, 150, "...") !!}
                        </td>
                        <td>
                          {{ $blog->date_az }}
                        </td>
                        <td>
                          <img src="/images/blog/{{ $blog->photo }}" alt="">
                        </td>
                        <td class="text-center">
                          <a href="/admin/edit-blog/{{ $blog->id }}">
                            <button type="button" class="btn btn-primary edit" data-id="{{ $blog->id }}" data-toggle="modal" data-target="#editmodal">
                                Edit
                              </button>
                            </a>
                              <button type="button" class="btn btn-secondary delete" data-id="{{ $blog->id }}">
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
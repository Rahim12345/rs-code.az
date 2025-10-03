@extends('back.layouts.master')

@section('jquery')

<script>
  
  $(function(){
      
  $(".edit").click(function(){
    $("#projects").trigger('reset');
    var id = $(this).data('id');
    $.ajax({
      url: "/admin/edit-partner",
      type: "POST",
      data: {id:id},
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(e){
        $("#name_edit").val(e.partner.name);
        $("#link_edit").val(e.partner.link);
        $("#thumb").attr("src", "/images/partners/"+e.partner.logo);
        $("#logo_hidden").val(e.partner.logo);
        $("#id").val(e.partner.id);
      },
      error: function(){
        alert("error");
      }
    })
  })

  $(".delete").click(function(){
      var id = $(this).data('id');
      if(confirm('Silmək istədiyinizə əminsiniz?'))
      {
          $.ajax({
          url: '/admin/delete-partner',
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

{{-- Store Modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Müştərilər</h5>
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
                    <h4 class="card-title text-dark">Logo:</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                        <img src="../../assets/img/image_placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" id="logo" value="{{ old('logo') }}" name="logo">
                        </span>
                        @if ($errors->first('logo'))
                    <span class="alert alert-danger">{{ $errors->first('logo') }}</span>
                    @endif
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                  </div>
                </div>
              
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
                    <h4 class="card-title text-dark">Logo:</h4>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                        <img src="../../assets/img/image_placeholder.jpg" id="thumb" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" id="logo_edit" value="{{ old('logo') }}" name="logo">
                            <input type="hidden" id="logo_hidden" name="logo_hidden">
                        </span>
                        @if ($errors->first('logo'))
                    <span class="alert alert-danger">{{ $errors->first('logo') }}</span>
                    @endif
                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                  </div>
                </div>
              
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
            <h4 class="card-title">Müştərilərimiz</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal">
                    Add
                  </button>
                <thead class="text-primary">
                  <tr>
                    <th width="10%" class="text-center">
                      Logo
                    </th>
                    <th class="text-center">
                      Link
                    </th>
                    <th class="text-center">
                      Ad
                    </th>
                    <th width="20%">

                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $partner)
                    <tr id="{{ $partner->id }}">
                        <td class="text-center">
                            <img src="/images/partners/{{ $partner->logo }}" alt="">
                          </td>
                        <td class="text-center">
                          {{ $partner->link }}
                        </td>
                        <td class="text-center">
                          {{ $partner->name }}
                        </td>   
                        <td class="text-center">
                            <button type="button" class="btn btn-primary edit" data-id="{{ $partner->id }}" data-toggle="modal" data-target="#editmodal">
                                Edit
                              </button>
                              <button type="button" class="btn btn-secondary delete" data-id="{{ $partner->id }}">
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
  

 
@endsection
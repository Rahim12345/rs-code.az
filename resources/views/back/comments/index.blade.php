@extends('back.layouts.master')

@section('title', 'Haqqımızda')
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
                  <a class="dropdown-item" href="">Düzəliş Et</a>
                </div>
              </div>
            </div>
            <h4 class="card-title">Haqqımızda</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>
                        Azərbaycanca ad
                      </th>
                      <th>
                        İngiliscə ad
                      </th>
                      <th>
                        Rusca ad
                      </th>
                      <th>

                      </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <td>
                        {{ $comment->name_az }}
                        </td>
                        <td>
                        {{ $comment->name_en }}
                        </td>
                        <td>
                        {{ $comment->name_ru }}
                        </td>
                        <td>
                        <img src="/images/comments/{{ $comment->comment_ru }}" alt=""> 
                        </td>
                        <td class="text-center">
                            <a href="/admin/edit-comment/{{ $comment->id }}">
                              <button type="button" class="btn btn-primary edit"  data-toggle="modal" data-target="#editmodal">
                                  Edit
                                </button>
                              </a>
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
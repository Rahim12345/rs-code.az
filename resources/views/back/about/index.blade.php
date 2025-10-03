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
                  <a class="dropdown-item" href="/admin/about/edit">Düzəliş Et</a>
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
                      Azərbaycanca
                    </th>
                    <th>
                      İngiliscə
                    </th>
                    <th>
                      Rusca
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      {!! $about->about_az !!}
                    </td>
                    <td>
                      {!! $about->about_en !!}
                    </td>
                    <td>
                      {!! $about->about_ru !!}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection
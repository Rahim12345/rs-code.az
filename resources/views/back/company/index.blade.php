@extends('back.layouts.master')

@section('content')
    <div class="content">
        <div class="mb-3 col-md-12">
            <a href="{{ route('company.create') }}" class="btn btn-primary w-100">Əlavə et</a>
            <table class="table table-vcenter table-mobile-md card-table">
                <thead style="cursor: ">
                <tr>
                    <th>Group</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->group->name_az }}</td>
                        <td>{{ $company->name }}</td>
                        <td>
                            <div class="btn-list flex-nowrap d-flex">
                                <a href="{{ route('company.edit',$company->id) }}" class="btn btn-primary mr-1"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('company.destroy',$company->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Silmək istədiyinizdən əminsiniz?')"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

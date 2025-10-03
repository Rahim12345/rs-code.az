@extends('back.layouts.master')

@section('content')
    <div class="content">
        <div class="mb-3 col-md-12">
            <a href="{{ route('team.create') }}" class="btn btn-primary w-100">Əlavə et</a>
            <table class="table table-vcenter table-mobile-md card-table">
                <thead style="cursor: ">
                <tr>
                    <th>Profil</th>
                    <th>Full name</th>
                    <th>professional</th>
                    <th>Sıra nömrəsi</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($works as $work)
                    <tr>
                        <td><img src="{{ asset('files/teams/'.$work->src) }}" style="width: 100px" alt=""></td>
                        <td>{{ $work->full_name }}</td>
                        <td>{{ $work->professional }}</td>
                        <td><input type="number" min="0" value="{{ $work->order_no }}" class="form-control team" data-id="{{ $work->id }}"></td>
                        <td>
                            <div class="btn-list flex-nowrap d-flex">
                                <a href="{{ route('team.edit',$work->id) }}" class="btn btn-primary mr-1"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('team.destroy',$work->id) }}" method="POST">
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


@section('js')
    <script>
        $('.team').change(function () {
            let id = $(this).attr('data-id');
            let order_no = $(this).val();

            $.ajax({
               type : 'GET',
               data : { order_no },
               url  : '/admin/team/'+id,
                success : function (response) {
                    toastr.success(response.message);
                }
            });
        });
    </script>
@endsection

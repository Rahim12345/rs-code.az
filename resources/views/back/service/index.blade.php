@extends('back.layouts.master')

@section('content')
    <div class="content">
        <div class="mb-3 col-md-12">
            <a href="{{ route('services.create') }}" class="btn btn-primary w-100">Add</a>
            <table class="table table-vcenter table-mobile-md card-table">
                <thead style="cursor: ">
                <tr>
                    <th>Name(AZ)</th>
                    <th>Name(EN)</th>
                    <th>Name(RU)</th>
                    <th>On Home</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody style="cursor: all-scroll;" id="services"></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            brendLoader();

            function brendLoader() {
                $('#services').html('');
                let token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    'url' : '/admin/service-loader',
                    'type' : 'POST',
                    data: { action: 'fetch_data' },
                    success : function (response) {
                        $('#services').html(response);
                    }
                });
            }

            $('tbody').sortable({
                placeholder: "ui-state-highlight",
                update: function (event, ui) {
                    let page_id_array = [];
                    $('tbody tr').each(function () {
                        page_id_array.push($(this).attr('id'));
                    });

                    $.ajax({
                        url: "/admin/service-loader",
                        method: "POST",
                        data: { page_id_array: page_id_array, action: 'update' },
                        success: function () {
                            toastr.success('Tablo yenidən sıralandı')
                            brendLoader();
                        }
                    })
                }
            });

        });
    </script >
@endsection

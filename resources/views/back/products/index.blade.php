@extends('back.layouts.master')

@section('content')
    <div class="content">
        <div class="col-md-12">
            <div class="card">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Məhsul əlavə et</a>
                <div class="table-responsive">
                    <table
                        class="table table-vcenter table-mobile-md card-table" id="mehsullar">
                        <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Servis</th>
                            <th>Title(AZ)</th>
                            <th>Title(EN)</th>
                            <th>Title(RU)</th>
                            <th>Sıra №</th>
                            <th></th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                        <h3>Silmək istiyirsən?</h3>
                        <div class="text-muted">Əgər siz həqiqətən Sil düyməsinə vursanız məhsulu heç vaxt geri qaytara bilməyəcəksiniz</div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                                        Ləğv et
                                    </a>
                                </div>
                                <div class="col">
                                    <form action="" method="POST" id="deleterForm">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" >Sil</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="modal-barcode" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content" id="non-printable">
                    <button type="button" id="close-barcode" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4 col-md-4 offset-4">
                        <div style="text-align: center;" id="barcode-content"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:void(0)" class="btn btn-white w-100" data-bs-dismiss="modal">
                                        Ləğv et
                                    </a>
                                </div>
                                <div class="col">
                                    <button type="submit" id="print" class="btn btn-danger w-100" >Çap et</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="printable" style="width: 80px !important;">
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Barcode</title>
                    </head>
                    <body>
                    <div class="ticket">
                        <table>
                            <tbody>
                            <tr>
                                <td class="price" id="bar"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    </body>
                    </html>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.2/b-html5-1.6.2/b-print-1.6.2/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js" integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).on('input','.productNo',function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let id          = $(this).attr('data-id');
            let order_no    = $(this).val();
            $.ajax({
                type : 'POST',
                data : {
                    id : id,
                    order_no : order_no
                },
                url : '{!! route('product.order') !!}',
                success: function (response) {
                    toastr.success('Sıra dəyişdirildi');
                },
                error: function (myErrors) {
                    $.each(myErrors.responseJSON.errors, function (key, error) {
                        toastr.success(error);
                    })
                }
            });
        });


        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#mehsullar');

            var today = new Date();
            var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
            var time = today.getHours() + "-" + today.getMinutes() + "-" + today.getSeconds();
            var fileName = date+'-'+time;

            table.DataTable({
                processing: true,
                serverSide: true,
                select: true,
                "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100,'Bütün']],
                ajax: {
                    url: "{{ route('product.index') }}",
                },
                columns: [
                    {data: 'src', name: 'src'},
                    {data: 'service_id', name: 'service_id'},
                    {data: 'title_az', name: 'title_az'},
                    {data: 'title_az', name: 'title_en'},
                    {data: 'title_az', name: 'title_ru'},
                    {data: 'order_no', name: 'order_no'},
                    {data: 'action', name: 'action',searchable:false,orderable: false},
                ],
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(0)').attr('data-label', 'Cover');
                    $( row ).find('td:eq(1)').attr('data-label', 'Servis');
                    $( row ).find('td:eq(2)').attr('data-label', 'NAME(AZ)');
                    $( row ).find('td:eq(3)').attr('data-label', 'NAME(EN)');
                    $( row ).find('td:eq(4)').attr('data-label', 'NAME(RU)');
                    $( row ).find('td:eq(5)').attr('data-label', 'Action');
                },
                "language": {
                    "emptyTable": "Cədvəldə heç bir məlumat yoxdur",
                    "infoEmpty": "Nəticə Yoxdur",
                    "infoFiltered": "( _MAX_ Nəticə İçindən Tapılanlar)",
                    "lengthMenu": "Səhifədə _MENU_ Nəticə Göstər",
                    "loadingRecords": "Yüklənir...",
                    "processing": "Gözləyin...",
                    "search": "Axtarış:",
                    "zeroRecords": "Nəticə Tapılmadı.",
                    "paginate": {
                        "first": "İlk",
                        "last": "Axırıncı",
                        "previous": "Öncəki",
                        "next": "Sonrakı"
                    },
                    "aria": {
                        "sortDescending": ": sütunu azalma sırası üzərə aktiv etmək",
                        "sortAscending": ": sütunu artma sırası üzərə aktiv etməkr"
                    },
                    "autoFill": {
                        "cancel": "Ləğv Et",
                        "fill": "Bütün hücrələri <i>%d<\/i> ile doldur",
                        "fillHorizontal": "Hücrələri üfiqi olaraq doldur",
                        "fillVertical": "Hücrələri şaquli olara1 doldur"
                    },
                    "buttons": {
                        "collection": "Kolleksiya <span class=\"\\\"><\/span>",
                        "colvis": "Sütun baxışı",
                        "colvisRestore": "Baxışı əvvəlki vəziyyətinə gətir",
                        "copy": "Kopyala",
                        "copyKeys": "Cədvəldəki qeydi kopyalamaq üçün CTRL və ya u2318 + C düymələrinə basın. Ləğv etmək üçün bu mesajı vurun və ya ESC düyməsini vurun.",
                        "copySuccess": {
                            "1": "1 sətir panoya kopyalandı",
                            "_": "%ds sətir panoya kopyalandı"
                        },
                        "copyTitle": "Panoya kopyala",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Bütün sətirlari göstər",
                            "_": "%d sətir göstər"
                        },
                        "pdf": "PDF",
                        "print": "Çap Et"
                    },
                    "decimal": ",",
                    "info": "_TOTAL_ Nəticədən _START_ - _END_ Arası Nəticələr",
                    "infoThousands": ".",
                    "searchBuilder": {
                        "add": "Koşul Ekle",
                        "button": {
                            "0": "Axtarış Yaradıcı",
                            "_": "Axtarış Yaradıcı (%d)"
                        },
                        "clearAll": "Filtrləri Təmizlə",
                        "condition": "Şərt",
                        "conditions": {
                            "date": {
                                "after": "Növbəti",
                                "before": "Öncəki",
                                "between": "Arasında",
                                "empty": "Boş",
                                "equals": "Bərabərdir",
                                "not": "Deyildir",
                                "notBetween": "Xaricində",
                                "notEmpty": "Dolu"
                            },
                            "number": {
                                "between": "Arasında",
                                "empty": "Boş",
                                "equals": "Bərabərdir",
                                "gt": "Böyükdür",
                                "gte": "Böyük bərabərdir",
                                "lt": "Kiçikdir",
                                "lte": "Kiçik bərabərdir",
                                "not": "Deyildir",
                                "notBetween": "Xaricində",
                                "notEmpty": "Dolu"
                            },
                            "string": {
                                "contains": "Tərkibində",
                                "empty": "Boş",
                                "endsWith": "İlə bitər",
                                "equals": "Bərabərdir",
                                "not": "Deyildir",
                                "notEmpty": "Dolu",
                                "startsWith": "İlə başlayar"
                            },
                            "array": {
                                "equals": "Bərabərdir",
                                "empty": "Boş",
                                "contains": "Tərkibində",
                                "not": "Deyildir",
                                "notEmpty": "Dolu",
                                "without": "Xaric"
                            }
                        },
                        "data": "Qeyd",
                        "deleteTitle": "Filtrləmə qaydasını silin",
                        "leftTitle": "Meyarı xaricə çıxarmaq",
                        "logicAnd": "və",
                        "logicOr": "vəya",
                        "rightTitle": "Meyarı içəri al",
                        "title": {
                            "0": "Axtarış Yaradıcı",
                            "_": "Axtarış Yaradıcı (%d)"
                        },
                        "value": "Değer"
                    },
                    "searchPanes": {
                        "clearMessage": "Hamısını Təmizlə",
                        "collapse": {
                            "0": "Axtarış Bölməsi",
                            "_": "Axtarış Bölməsi (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown}\/{total}",
                        "emptyPanes": "Axtarış Bölməsi yoxdur",
                        "loadMessage": "Axtarış Bölməsi yüklənir ...",
                        "title": "Aktiv filtrlər - %d"
                    },
                    "searchPlaceholder": "Axtarış",
                    "select": {
                        "1": "%d sətir seçildi",
                        "_": "%d sətir seçildi",
                        "cells": {
                            "1": "1 hücrə seçildi",
                            "_": "%d hücrə seçildi"
                        },
                        "columns": {
                            "1": "1 sütun seçildi",
                            "_": "%d sütun seçildi"
                        },
                        "rows": {
                            "1": "1 qeyd seçildi",
                            "_": "%d qeyd seçildi"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Öncəki",
                        "next": "Növbəti",
                        "hours": "Saat",
                        "minutes": "Dəqiqə",
                        "seconds": "Saniyə",
                        "unknown": "Naməlum",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Bağla",
                        "create": {
                            "button": "Təzə",
                            "title": "Yeni qeyd yarat",
                            "submit": "Qeyd Et"
                        },
                        "edit": {
                            "button": "Redaktə Et",
                            "title": "Qeydi Redaktə Et",
                            "submit": "Yeniləyin"
                        },
                        "remove": {
                            "button": "Sil",
                            "title": "Qeydləri sil",
                            "submit": "Sil",
                            "confirm": {
                                "_": "%d ədəd qeydi silmək istədiyinizə əminsiniz?",
                                "1": "Bu qeydi silmək istədiyinizə əminsiniz?"
                            }
                        },
                        "error": {
                            "system": "Sistem xətası baş verdi (Ətraflı Məlumat)"
                        },
                        "multi": {
                            "title": "Çox dəyər",
                            "info": "Seçilmiş qeydlər bu sahədə fərqli dəyərlər ehtiva edir. Bütün seçilmiş qeydlər üçün bu sahəyə eyni dəyəri təyin etmək üçün buraya vurun; əks halda hər qeyd öz dəyərini saxlayacaqdır.",
                            "restore": "Dəyişiklikləri geri qaytarın",
                            "noMulti": "Bu sahə qrup şəklində deyil, ayrı-ayrılıqda təşkil edilə bilər."
                        }
                    }
                },
                stateSave: true,
            });

            $('#print').click(function () {
                $("#printable").printThis({
                    importCSS: false,            // import parent page css
                    // importStyle: true,         // import style tags
                    loadCSS: "{{ asset('print.css') }}",
                    canvas: true
                });
            });

        });

        $(document).on('click','.MehsulDeleter',function () {
            let id = $(this).attr('data-id');
            if(confirm('Silmək istədiyinizdən əminsiniz?')){
                window.location.href = "/admin/product/"+id;
            }

        });
    </script>
@endsection

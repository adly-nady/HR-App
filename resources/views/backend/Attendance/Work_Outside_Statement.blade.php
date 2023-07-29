@extends('backend.layouts.parent')

@section('title', ' المأموريات ')


@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">بحث ...</h3>
            </div>
            <form class="form-horizontal">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10 m-auto">
                            <div class="row">

                                <div class="col-9 content_body row" style="align-content:center;text-align: center; ">
                                    <label for=""> تاريخ البحث </label>
                                    <input type="date" class="form-control only_date">
                                </div>

                                <div class="col-3" style="align-content:center;text-align: center; ">
                                    <label for=""> نوع البحث </label>
                                    <select class="form-select type_saerch">
                                        <option value="0" selected> تاريخ اليوم </option>
                                        <option value="1"> تاريخ زوجى </option>
                                        <option value="2"> تاريخ زوجى & الاسم </option>
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- /.card-footer -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info search_in_Work_Outside_Statement">بحث</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">جدول : المأموريات</h3>

            </div>
            {{-- Table Of All Attendance --}}
            <div class="col">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> الاسم </th>
                                <th> تاريخ  </th>
                                <th> المبلغ </th>
                                <th> حذف </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($dp = 0; $dp < count($data); $dp++)
                                <tr class="{{ $data[$dp]->id }}tr">
                                    <td>{{ $data[$dp]->name }}</td>
                                    <td>{{ $data[$dp]->date }}</td>
                                    <td>{{ $data[$dp]->cost_plus }}</td>
                                    <td><button class="btn btn-danger btn-sm delete" id="{{ $data[$dp]->id }}"><i
                                                class="fas fa-trash p-1"></i>حذف</button></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        @include('backend.include.message')
    </div>
@endsection


@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min') }}.js"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.search_select_box select').selectpicker();
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            var list_data;
            axios.post("{{ route('get_users') }}").then(function(res) {
                res.data.forEach(element => {
                    list_data += "<option value=" + element.id + ">" + element.name + "</option>";
                });
            });
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            $('.type_saerch').on('change', function(e) {
                switch ($(this).val()) {
                    case '0':
                        data =
                            '<div class="col-12"><label for=""> search by date for a day </label><input type="date" class="form-control only_date"></div>';
                        break;
                    case '1':
                        data =
                            '<label for=""> search by binary date </label><div class="col-6"><input type="date" class="form-control from_date"></div><div class="col-6"><input type="date" class="form-control to_date"></div>';
                        break;
                    case '2':
                        data =
                            '<label for=""> search by binary date </label><div class="col-6"><input type="date" class="form-control from_date2"></div><div class="col-6"><input type="date" class="form-control to_date2"></div><div class="col-10 m-auto"> <br> <select class="form-select w-100 name" id="Employe" data-live-search="true">' +
                            list_data + '</select><br/> </div>';
                        break;
                }
                $('.content_body').html(data);
            });
            //search
            $('.search_in_Work_Outside_Statement').on('click', function(e) {
                e.preventDefault();
                var only_date, from_date, from_date2, to_date, to_date2, name;

                only_date = $('.only_date').val();
                from_date = $('.from_date').val();
                from_date2 = $('.from_date2').val();
                to_date = $('.to_date').val();
                to_date2 = $('.to_date2').val();
                name = $('.name').val();
                type_saerch = $('.type_saerch').val();

                var URL = "{{ route('search_in_Work_Outside_Statement') }}";
                axios.post(URL, {
                    type_saerch: type_saerch,
                    only_date: only_date,
                    from_date: from_date,
                    from_date2: from_date2,
                    to_date: to_date,
                    to_date2: to_date2,
                    name: name,
                }).then(function(res) {
                    var data = "";
                    res.data.forEach(element => {
                        data += "<tr id='" + element.id + "tr'>";
                        data += "<td>" + element.emp_id + "</td>";
                        data += "<td>" + element.date + "</td>";
                        data += "<td>" + element.cost_plus + "</td>";
                        data += "<td>";
                        data += "<button class='btn btn-danger btn-sm delete' id='" +
                            element.id +
                            "''><i class='fas fa-trash p-1'></i>Delete</button>";
                        data += "</td>";
                        data += "</tr>";
                    });
                    $('tbody').html(data);
                });
            });
            // Get Data
            function GetRows() {
                axios.get("{{ route('list_of_Work_Outside_Statement') }}")
                    .then(function(response) {
                        var data = "";
                        response.data.forEach(element => {
                            data += "<tr id='" + element.id + "tr'>";
                            data += "<td>" + element.emp_id + "</td>";
                            data += "<td>" + element.date + "</td>";
                            data += "<td>" + element.cost_plus + "</td>";
                            data += "<td>";
                            data += "<button class='btn btn-danger btn-sm delete' id='" + element.id +
                                "''><i class='fas fa-trash p-1'></i>Delete</button>";
                            data += "</td>";
                            data += "</tr>";
                        });
                        $('tbody').html(data);
                    })
            }
            // Delete Item
            $('table').on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var URL = "{{ route('delete_Work_Outside_Statement') }}";
                axios.post(URL, {
                        id: id
                    })
                    .then(function(response) {
                        Toast.fire({
                            icon: 'success',
                            title: ' success '
                        })
                        GetRows();
                    })
                    .catch(function(error) {
                        Toast.fire({
                            icon: 'error',
                            title: ' error : ' + error
                        })
                    });
            });

        });
    </script>
@endsection()

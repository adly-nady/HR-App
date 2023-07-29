@extends('backend.layouts.parent')

@section('title', ' بوابة الامن ')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.') }}css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
@endsection

@section('content')
    {{-- Form Enter --}}
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"> اضافة اذن خروج بوابة</h3>
        </div>
        <form method="POST" class="form1">
            @csrf
            <div class="card-body row">

                <div class="col-12">
                    <!-- text input -->
                    <div class="form-group text-center">
                        <label> رقم الأذن </label>
                        <input type="text" class="form-control text-center is_Update id" value="{{ $New_ID ?? 0 }}"
                            readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label> أسم الموظف </label>
                        <div class="search_select_box w-100">
                            <select class="form-select w-100 emp_name1" id="Employe_ID" data-live-search="true">
                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                    <option value="{{ $Employees[$emp]->id }}">{{ $Employees[$emp]->name }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>ألتاريخ</label>
                        <input type="date" class="form-control Date" name="Date">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>الساعة</label>
                        <input type="time" class="form-control Time">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>الملاحظات</label>
                        <input type="text" class="form-control Notes">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6" style="padding: 25px">

                        <div class="form-check form-switch">
                            <input class="form-check-input  in" type="radio" role="switch" id="check_id1"
                                name="Salary_Action">
                            <label class="form-check-label" for="check_id1"> دخول </label>
                        </div>
                    </div>
                    <div class="col-6" style="padding: 25px">

                        <div class="form-check form-switch">
                            <input class="form-check-input out" type="radio" role="switch" id="check_id2"
                                name="Salary_Action">
                            <label class="form-check-label" for="check_id2"> خروج </label>
                        </div>
                    </div>
                </div>>
                <div class="col-12">
                    <div class="form-group d-flex justify-content-center" style="direction: rtl;">
                        <button class="Save btn bg-gradient-success" id="Save" style="color: white;">حفظ</button>
                        <button class="Clear btn bg-gradient-info" id="Clear" style="color: white;">تفريغ</button><br>
                    </div>
                </div>

            </div>
        </form>
        <!-- /.card-body -->
    </div>
    {{-- Start Form Search: --}}
    <div class="callout callout-success">
        <h5>نوع البحث ...</h5>
        <div>
            <select id="List_Search" class="form-control text-center List_Search">
                <option selected>...</option>
                <option value="date">ألتاريخ</option>
                <option value="date_name"> تاريخ & أسم </option>
            </select>
        </div>
        <form method="POST" class="form2">
            <div class="card-body col-12">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="inputEmail3" class="col-sm-12 col-form-label to_date_label d-none"> من تاريخ </label>
                        <input type="date" class="form-control to_date  d-none" id="inputEmail3">
                    </div>
                    <div class="col-sm-4">
                        <label for="inputEmail3" class="col-sm-12 col-form-label from_date_label  d-none"> الى تاريخ
                        </label>
                        <input type="date" class="form-control from_date  d-none" id="inputEmail3">
                    </div>
                    <div class="col-sm-4 text_Search">
                        <label for="inputEmail3" class="col-sm-12 col-form-label emp_name_label d-none"> أسم الموظف
                        </label>
                        <div class="search_select_box w-100">
                            <select class="form-select w-100 emp_name d-none" id="Employe_Search"
                                data-live-search="true">
                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                    <option value="{{ $Employees[$emp]->id }}">{{ $Employees[$emp]->name }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="Search_Btn btn  bg-gradient-info  d-none" style="color: white">بحث</button><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- End Form Search --}}
    {{-- table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> بيانات خروج البوابة </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 text-center">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th> أسم الموظف </th>
                            <th> التاريخ </th>
                            <th> الساعة </th>
                            <th> دخول </th>
                            <th> خروج </th>
                            <th> الملاحظات </th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($data = 0; $data < count($Gateway_Data); $data++)
                            <tr>
                                <td>{{ $Gateway_Data[$data]->id }}</td>
                                <td>{{ $Gateway_Data[$data]->name }}</td>
                                <td>{{ $Gateway_Data[$data]->date }}</td>
                                <td>{{ $Gateway_Data[$data]->time }}</td>
                                <td>
                                    @if ($Gateway_Data[$data]->in == 1)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($Gateway_Data[$data]->out == 1)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td>{{ $Gateway_Data[$data]->notes }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm delete" id="{{ $Gateway_Data[$data]->id }}"><i
                                            class="fas fa-trash p-1"></i>حذف</button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        @include('backend.include.message')
    </div>
@endsection


@section('js')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
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
        // Get Data
        function GetRows(Records) {
            var data = "";
            for (var element = 0; element < Records.length; element++) {
                data += "<tr>";
                data += "<td>" + Records[element].id + "</td>";
                data += "<td>" + Records[element].name + "</td>";
                data += "<td>" + Records[element].date + "</td>";
                data += "<td>" + Records[element].time + "</td>";
                data += "<td>";
                if (Records[element].in == 1) {
                    data += "<i class='fa fa-check' aria-hidden='true'></i>"
                }
                data += "</td>";
                data += "<td>";
                if (Records[element].out == 1) {
                    data += "<i class='fa fa-check' aria-hidden='true'></i>"
                }
                data += "</td>";
                data += "<td>" + Records[element].notes + "</td>";
                data += "<td><button class='btn btn-danger btn-sm delete' id='" + Records[element].id +
                    "'><i class='fas fa-trash p-1'></i>Delete</button></td>";
                data += "</tr>";
            };
            $('tbody').html(data);
        }
        // Save item
        $('.form1').on('click', '.Save', function(e) {
            e.preventDefault();
            var id = $('.id').val();
            var Params = {
                'id': $('.id').val(),
                'emp_id': $('#Employe_ID').val(),
                'date': $('.Date').val(),
                'time': $('.Time').val(),
                'notes': $('.Notes').val() ?? "",
                'in': $('.in').is(":checked") ?? 0,
                'out': $('.out').is(":checked") ?? 0,
            };
            var URL = "{{ route('GateWay.insert') }}";
            axios.post(URL, Params)
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "Inserted ...!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows(response.data.Gateway_Data);
                    id++;
                    $('.id').val(id);
                    clear();
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
        $('.form1').on('click', '.Clear', function(e) {
            e.preventDefault();
            clear();
        });

        function clear() {
            $('#Employe_ID').val("");
            $('.Date').val("");
            $('.Time').val("");
            $('.Notes').val("");
            $('.in').val('0');
            $('.out').val('0')
        }
        // Delete Item
        $('table').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var URL = "{{ route('GateWay.delete', ':id') }}".replace(':id', id);
            axios.get(URL)
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: "Deleted ...!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows(response.data.Gateway_Data);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
        // Select Search ...
        $('#List_Search').change(function() {
            if ($(this).find(':selected').val() == "date") {
                $('.from_date').removeClass("d-none").addClass("d-block");
                $('.from_date_label').removeClass("d-none").addClass("d-block");
                $('.to_date').removeClass("d-none").addClass("d-block");
                $('.to_date_label').removeClass("d-none").addClass("d-block");
                $('.Search_Btn').removeClass("d-none").addClass("d-block");

                $('.emp_name').removeClass("d-block").addClass("d-none");
                $('.emp_name_label').removeClass("d-block").addClass("d-none");
            } else if ($(this).find(':selected').val() == "date_name") {
                $('.from_date').removeClass("d-none").addClass("d-block");
                $('.from_date_label').removeClass("d-none").addClass("d-block");
                $('.to_date').removeClass("d-none").addClass("d-block");
                $('.to_date_label').removeClass("d-none").addClass("d-block");
                $('.emp_name').removeClass("d-none").addClass("d-block");
                $('.emp_name_label').removeClass("d-none").addClass("d-block");
                $('.Search_Btn').removeClass("d-none").addClass("d-block");
            }
        });
        // Search Method :-
        $('.form2').on('click', '.Search_Btn', function(e) {
            e.preventDefault();
            // Declerat Global Varibals :-
            var emp_name, from_date, to_date, Params, Query;
            emp_name = $('#Employe_Search').val();
            from_date = $('.from_date').val();
            to_date = $('.to_date').val();

            if ($('.List_Search').val() == 'date') {
                Params = {
                    'Query': ` gateway.date BETWEEN '${from_date}' AND '${to_date}' `,
                };
                console.log(Params);
            } else if ($('.List_Search').val() == 'date_name') {
                Params = {
                    'Query': ` gateway.date BETWEEN '${from_date}' AND '${to_date}' AND gateway.emp_id = '${emp_name}' `,
                };
                console.log(Params);
            }

            var URL = "{{ route('GateWay.Search') }}";
            axios.post(URL, Params)
                .then(function(response) {
                    GetRows(response.data.Gateway_Data);
                    Params = null;
                }).catch(function(error) {
                    console.log(error);
                    Params = null;
                });
        });
    </script>
@endsection()

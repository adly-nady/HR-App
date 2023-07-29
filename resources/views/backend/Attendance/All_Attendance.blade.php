@extends('backend.layouts.parent')

@section('title', 'الحضور و الانصراف')

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
    <div class="callout callout-success">
        <h5>تحديد نوع البحث ...</h5>
        <div>
            <select name="" id="" class="form-control text-center">
                <option selected>...</option>
                <option value="date">تاريخ</option>
                <option value="date_name">اسم & تاريخ</option>
            </select>
        </div>
        <form method="POST">
            @csrf
            <div class="card-body col-12">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="inputEmail3" class="col-sm-12 col-form-label to_date_label d-none">من تاريخ</label>
                        <input type="date" class="form-control to_date  d-none" id="inputEmail3">
                    </div>
                    <div class="col-sm-4">
                        <label for="inputEmail3" class="col-sm-12 col-form-label from_date_label  d-none">الى تاريخ</label>
                        <input type="date" class="form-control from_date  d-none" id="inputEmail3">
                    </div>
                    <div class="col-sm-4 text_Search">
                        <label for="inputEmail3" class="col-sm-12 col-form-label emp_name_label d-none">اسم الموظف</label>
                        <input type="text" class="form-control emp_name d-none" id="inputEmail3"
                            placeholder="Employee Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="Search_Btn btn btn-block bg-gradient-success d-none">بحث</button><br>
                    </div>

                    <div class="col-6" style="text-align: center">
                        <button type="button" class="test btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i
                                class="bi bi-file-plus"></i>أضافة:  يوم أجازة</button>
                    </div>
                    <div class="col-6" style="text-align: center">
                        <button type="button" class="test btn btn-primary" data-toggle="modal" data-target="#modal-lg2"><i
                                class="bi bi-file-plus"></i> أضافة: مأمورية</button>
                    </div>
                    <!-- /.modal -->
                    <!-- add day_of -->
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title">أضافة:  يوم أجازة</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="bi bi-file-plus"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="emp_name">أسم الموظف</label>
                                        <div class="search_select_box w-100">
                                            <select class="form-select w-100" id="Employe" data-live-search="true">
                                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                                    <option value="{{ $Employees[$emp]->id }}">{{ $Employees[$emp]->name }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <br>
                                        <label for="dateHoly">تاريخ يوم الاجازة</label>
                                        <input type="date" id="dateHoly" name="dateHoly" class="form-control date">
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding: 25px">

                                            <div class="form-check form-switch">
                                                <input class="form-check-input is_annual_holiday" type="checkbox"
                                                    role="switch" id="check_id">
                                                <label class="form-check-label" for="check_id"> إجازة سنوية</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">إغلاق </button>
                                        <button type="submit" class="btn btn-primary click_add_day_off">حفظ</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="modal-lg2">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> أضافة: مأمورية</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="bi bi-file-plus"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="emp_name">أسم الموظف</label>
                                        <div class="search_select_box w-100">
                                            <select class="form-select w-100" id="Employe2" data-live-search="true">
                                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                                    <option value="{{ $Employees[$emp]->id }}">{{ $Employees[$emp]->name }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <br>
                                        <label for="dateHoly">تاريخ المأمورية</label>
                                        <input type="date" id="dateHoly2" name="dateHoly" class="form-control date">
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding: 25px">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"> المبلغ : </span>
                                                <input type="text" class="form-control" id="cost2"
                                                     aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">إغلاق </button>
                                        <button type="submit" class="btn btn-primary click_add_day_out">حفظ</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </form>

    </div>
    <hr>
    <div class="row">
        {{-- Table Of All Attendance --}}
        <div class="col-sm-6">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>أسم الموظف</th>
                            <th>ألتاريخ</th>
                            <th>الساعة</th>
                        </tr>
                    </thead>
                    <tbody class="tbody1">
                        @for ($emp = 0; $emp < count($EmpData); $emp++)
                            <tr id="{{ $EmpData[$emp]->id }}tr">
                                {{-- <td>{{ $EmpData[$emp]->id }}</td> --}}
                                <td>{{ $EmpData[$emp]->name }}</td>
                                <td>{{ $EmpData[$emp]->date }}</td>
                                <td>{{ $EmpData[$emp]->time }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            {{-- @include('backend.include.message') --}}
        </div>
        {{-- Table Of calcolate days and time  Attendance --}}
        <div class="col-sm-6">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>أسم الموظف</th>
                            <th>عدد ايام العمل</th>
                            <th>عدد ساعات العمل</th>
                        </tr>
                    </thead>
                    <tbody class="tbody2">
                        @for ($emp = 0; $emp < count($EmpData2); $emp++)
                            <tr>
                                <td>{{ $EmpData2[$emp]->emp_name }}</td>
                                <td>{{ $EmpData2[$emp]->Count_Dayes_Work }}</td>
                                <td>{{ $EmpData2[$emp]->Total_Hours_Work }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            @include('backend.include.message')
        </div>
        {{-- {{ $products->links() }} --}}
    </div>
@endsection()

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

            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        // add day Out
        $('.click_add_day_out').on('click', function(e) {
            e.preventDefault();
            var name, date, is_annual_holiday;

            name = $('#Employe2').val();
            date = $('#dateHoly2').val();
            cost = $('#cost2').val();

            var url = "{{ route('click_add_day_out') }}";
            axios.post(url, {
                name: name,
                date: date,
                cost: cost
            }).then(function(res) {

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
                });
                if (res.data.error) {
                    Toast.fire({
                        icon: 'error',
                        title: ' error : ' + res.data.error
                    })
                } else {
                    $('#Employe').val(null);
                    $('#dateHoly').val(null);
                    $('#check_id').val(false);
                    Toast.fire({
                        icon: 'success',
                        title: ' success '
                    })
                }

            });
        });
        // add day off
        $('.click_add_day_off').on('click', function(e) {
            e.preventDefault();
            var name, date, is_annual_holiday;
            name = $('#Employe').val();
            date = $('#dateHoly').val();
            is_annual_holiday = $('#check_id').is(":checked");
            var url = "{{ route('add_day_off') }}";
            axios.post(url, {
                name: name,
                date: date,
                is_annual_holiday: is_annual_holiday
            }).then(function(res) {
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
                });
                if (res.data.error) {
                    Toast.fire({
                        icon: 'error',
                        title: ' error : ' + res.data.error
                    })
                } else {
                    $('#Employe').val(null);
                    $('#dateHoly').val(null);
                    $('#check_id').val(false);
                    Toast.fire({
                        icon: 'success',
                        title: ' success '
                    })
                }

            });
        });

        // Get Data :-
        function GetRows(EmpData, EmpData2) {
            var data = "";
            for (var emp = 0; emp < EmpData.length; emp++) {
                data += "<tr id='" + EmpData[emp].id + "'>";
                data += "<td>" + EmpData[emp].name + "</td>";
                data += "<td>" + EmpData[emp].date + "</td>";
                data += "<td>" + EmpData[emp].time + "</td>";
                data += "</tr>";
            }
            $('.tbody1').html(data);
            data = "";
            for (var emp2 = 0; emp2 < EmpData2.length; emp2++) {
                data += "<tr>";
                data += "<td>" + EmpData2[emp2].emp_name + "</td>";
                data += "<td>" + EmpData2[emp2].Count_Dayes_Work + "</td>";
                data += "<td>" + EmpData2[emp2].Total_Hours_Work + "</td>";
                data += "</tr>";
            }
            $('.tbody2').html(data);
        }

        // Declerat Global Varibals :-
        var text_query, from_date, to_date, QueryAttendance, QueryAttendanceT2;
        $('form').on('keyup', '.emp_name', function(e) {
            e.preventDefault();
            text_query = $(this).val();
            from_date = $('.from_date').val();
            to_date = $('.to_date').val();
            QueryAttendance =
                `attendance.emp_id = employees.id AND employees.name LIKE '${text_query}%'  AND attendance.date BETWEEN '${from_date}' AND '${to_date}' `;
            QueryAttendanceT2 =
                ` dayes_work.date BETWEEN '${from_date}' AND '${to_date}' AND  dayes_work.emp_name LIKE '${text_query}%'`;

            var URL = "{{ route('Attendance_search') }}";
            axios.post(URL, {
                    'text_query': text_query,
                    'from_date': from_date,
                    'to_date': to_date,
                    'QueryAttendance': QueryAttendance,
                    'QueryAttendanceT2': QueryAttendanceT2,
                })
                .then(function(response) {
                    // console.log(response.data.EmpData_Search);
                    GetRows(response.data.EmpData_Search, response.data.EmpData2);
                }).catch(function(error) {
                    console.log(error);
                });
        });

        $('form').on('click', '.Search_Btn', function(e) {
            e.preventDefault();
            from_date = $('.from_date').val();
            to_date = $('.to_date').val();
            QueryAttendance =
                ` attendance.emp_id = employees.id AND  attendance.date  BETWEEN '${from_date}' AND '${to_date}' `;
            QueryAttendanceT2 = ` dayes_work.date  BETWEEN '${from_date}' AND '${to_date}' `;

            var URL = "{{ route('Attendance_search') }}";
            axios.post(URL, {
                    'from_date': from_date,
                    'to_date': to_date,
                    'QueryAttendance': QueryAttendance,
                    'QueryAttendanceT2': QueryAttendanceT2,
                })
                .then(function(response) {
                    // console.log(response.data.EmpData_Search);
                    GetRows(response.data.EmpData_Search, response.data.EmpData2);
                    // GetRows(response.data.EmpData_Search, response.data.EmpData2);
                }).catch(function(error) {
                    console.log(error);
                });
        });



        $('select').change(function() {


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
                $('.Search_Btn').removeClass("d-block").addClass("d-none");
            }
        });
    </script>
@endsection

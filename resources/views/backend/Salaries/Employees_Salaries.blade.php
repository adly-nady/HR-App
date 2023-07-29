@extends('backend.layouts.parent')

@section('title', 'رواتب الموظفين')

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
        <h5> نوع البحث  ...</h5>
        <div>
            <select name="" id="" class="form-control text-center List_Search">
                <option selected>...</option>
                <option value="date">التاريخ</option>
                <option value="date_name">التاريخ & الاسم</option>
            </select>
        </div>
        <form method="POST">
            @csrf
            <div class="card-body col-12">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="inputEmail3" class="col-sm-12 col-form-label to_date_label d-none"> الى تاريخ </label>
                        <input type="date" class="form-control to_date  d-none" id="inputEmail3">
                    </div>
                    <div class="col-sm-4">
                        <label for="inputEmail3" class="col-sm-12 col-form-label from_date_label  d-none"> من تاريخ </label>
                        <input type="date" class="form-control from_date  d-none" id="inputEmail3">
                    </div>
                    <div class="col-sm-4 text_Search">
                        <label for="inputEmail3" class="col-sm-12 col-form-label emp_name_label d-none"> اسم الموظف </label>
                        <div class="search_select_box w-100">
                            <select class="form-select w-100 emp_name d-none" id="Employe_Search" data-live-search="true">
                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                    <option value="{{ $Employees[$emp]->id }}">{{ $Employees[$emp]->name }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button class="Search_Btn btn btn-block bg-gradient-success d-none"> بحث </button><br>
                    </div>

                    <div class="col-6" style="text-align: center">
                        <button type="button" class="test btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i
                                class="bi bi-file-plus"></i>  إضافة مكافأة او خصم </button>
                    </div>
                    <div class="col-6" style="text-align: center">
                        <button type="button" class="test btn btn-primary" data-toggle="modal" data-target="#modal-lg2"><i
                                class="bi bi-file-plus"></i> إضافة سلفة </button>
                    </div>
                    <!-- Models-->
                    <!-- Model1: Salary Deduction -->
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title">   إضافة مكافأة او خصم  </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="bi bi-file-plus"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="emp_name"> أسم الموظف </label>
                                        <div class="search_select_box w-100">
                                            <select class="form-select w-100" id="Employe1" data-live-search="true">
                                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                                    <option value="{{ $Employees[$emp]->id }}">{{ $Employees[$emp]->name }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <br>
                                        <label for="dateHoly"> التاريخ </label>
                                        <input type="date" id="dateHoly1" name="dateHoly" class="form-control date1">
                                        <br>
                                        <label for="dateHoly"> عدد الايام </label>
                                        <input type="text" id="dateHoly" name="dateHoly"
                                            class="form-control count_days">
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-6" style="padding: 25px">

                                            <div class="form-check form-switch">
                                                <input class="form-check-input  Salary_Deduction" type="radio"
                                                    role="switch" id="check_id1" name="Salary_Action">
                                                <label class="form-check-label" for="check_id1">  خصم  </label>
                                            </div>
                                        </div>
                                        <div class="col-6" style="padding: 25px">

                                            <div class="form-check form-switch">
                                                <input class="form-check-input Salary_Reword" type="radio"
                                                    role="switch" id="check_id2" name="Salary_Action">
                                                <label class="form-check-label" for="check_id2">  مكافأة </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">إغلاق </button>
                                        <button type="submit"
                                            class="btn btn-primary click_add_salary_deduction_reward">حفظ</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    {{-- End Model1 --}}
                    <!-- Model2: Rewards -->
                    <div class="modal fade" id="modal-lg2">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> إضافة سلفة </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="bi bi-file-plus"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="emp_name"> اسم الموظف </label>
                                        <div class="search_select_box w-100">
                                            <select class="form-select w-100" id="Employe2" data-live-search="true">
                                                @for ($emp = 0; $emp < count($Employees); $emp++)
                                                    <option value="{{ $Employees[$emp]->id }}">
                                                        {{ $Employees[$emp]->name }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <br>
                                        <label for="dateHoly"> التاريخ </label>
                                        <input type="date" id="dateHoly2" name="dateHoly" class="form-control date2">
                                    </div>
                                    <div class="row">
                                        <div class="col" style="padding: 25px">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">  المبلغ :  </span>
                                                <input type="text" class="form-control amount" id="cost2"
                                                    aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">إغلاق</button>
                                        <button type="submit"
                                            class="btn btn-primary click_add_salary_borrow">حفظ</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    {{-- End Model2 --}}
                </div>
            </div>
        </form>

    </div>
    <hr>
    <div class="row">
        {{-- Table Of All Attendance --}}
        <div class="col-12">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th> الرقم </th>
                            <th> الاسم </th>
                            <th> القسم </th>
                            <th>  ايام العمل </th>
                            <th> اجمالى ساعات العمل </th>
                            <th> الاجازات </th>
                            <th> المأموريات  </th>
                            <th> ساعات العمل / الشهر </th>
                            <th> اجمالى الايام </th>
                            <th> اجمالى الساعات </th>
                            <th> فارق الساعات</th>
                            <th> اجر الساعة </th>
                            <th> اجمالى الراتب </th>
                            <th> مكافأت المأموريات </th>
                            <th> الخصم باليوم </th>
                            <th> المكافأت باليوم </th>
                            <th> اجمالى السلف </th>
                            <th>  عدد ايام الانتظام المضافة </th>
                            <th>  باقى الرصيد السنوي </th>
                            <th> الراتب المستحق </th>
                        </tr>
                    </thead>
                    <tbody class="tbody1">
                        {{-- @for ($emp = 0; $emp < count($EmpData); $emp++)
                            <tr>
                                <td>{{ $EmpData[$emp]->emp_id }}</td>
                                <td>{{ $EmpData[$emp]->emp_name }}</td>
                                <td>{{ $EmpData[$emp]->dep_name }}</td>
                                <td>{{ $EmpData[$emp]->Count_Dayes_Work }}</td>
                                <td>{{ $EmpData[$emp]->Total_Hours_Work }}</td>
                                <td>{{ $EmpData[$emp]->count_days_off }}</td>
                                <td>{{ $EmpData[$emp]->count_days_work_out }}</td>
                                <td>{{ $EmpData[$emp]->primary_hours_works }}</td>
                                <td>{{ $EmpData[$emp]->total_Days }}</td>
                                <td>{{ $EmpData[$emp]->All_hours }}</td>
                                <td>{{ $EmpData[$emp]->over_time }}</td>
                                <td>{{ $EmpData[$emp]->salary_hours }}</td>
                                <td>{{ $EmpData[$emp]->salary }}</td>
                                <td>{{ $EmpData[$emp]->work_out_reward }}</td>
                                <td>{{ $EmpData[$emp]->days_deduction }}</td>
                                <td>{{ $EmpData[$emp]->days_reward }}</td>
                                <td>{{ $EmpData[$emp]->sum_borrow_salary }}</td>
                                <td>{{ $EmpData[$emp]->plus_incentive }}</td>
                                <td>{{ $EmpData[$emp]->vacation_balance }}</td>

                                <td>{{ $EmpData[$emp]->Final_Salary }}</td>
                            </tr>
                        @endfor --}}
                    </tbody>
                </table>
            </div>
        </div>
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
        });
    </script>
    <script>
        // add day Out
        $('.click_add_salary_deduction_reward').on('click', function(e) {
            e.preventDefault();
            var name = $('#Employe1').val();
            var date = $('.date1').val();
            var count_days = $('.count_days').val();
            var Salary_Deduction = $('.Salary_Deduction').is(":checked");
            var Salary_Reword = $('.Salary_Reword').is(":checked");

            var url = "{{ route('add_salary_deduction_reward') }}";
            axios.post(url, {
                name: name,
                date: date,
                count_days: count_days,
                Salary_Deduction: Salary_Deduction,
                Salary_Reword: Salary_Reword
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
                })
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
        $('.click_add_salary_borrow').on('click', function(e) {
            e.preventDefault();
            var name = $('#Employe2').val();
            var date = $('.date2').val();
            var amount = $('.amount').val();
            var url = "{{ route('add_salary_borrow') }}";
            axios.post(url, {
                name: name,
                date: date,
                amount: amount
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
                })
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
        function GetRows(EmpData) {
            var data = "";
            for (var emp = 0; emp < EmpData.length; emp++) {
                data += "<tr>";
                data += "<td>" + EmpData[emp].emp_id + "</td>";
                data += "<td>" + EmpData[emp].emp_name + "</td>";
                data += "<td>" + EmpData[emp].dep_name + "</td>";
                data += "<td>" + EmpData[emp].Count_Dayes_Work + "</td>";
                data += "<td>" + EmpData[emp].Total_Hours_Work + "</td>";
                data += "<td>" + EmpData[emp].count_days_off + "</td>";
                data += "<td>" + EmpData[emp].count_days_work_out + "</td>";
                data += "<td>" + EmpData[emp].primary_hours_works + "</td>";
                data += "<td>" + EmpData[emp].total_Days + "</td>";
                data += "<td>" + EmpData[emp].All_hours + "</td>";
                data += "<td>" + EmpData[emp].hour_difference + "</td>";
                data += "<td>" + EmpData[emp].salary_hours + "</td>";
                data += "<td>" + EmpData[emp].salary + "</td>";
                data += "<td>" + EmpData[emp].work_out_reward + "</td>";
                data += "<td>" + EmpData[emp].days_deduction + "</td>";
                data += "<td>" + EmpData[emp].days_reward + "</td>";
                data += "<td>" + EmpData[emp].sum_borrow_salary + "</td>";
                data += "<td>" + EmpData[emp].plus_incentive + "</td>";
                data += "<td>" + EmpData[emp].vacation_balance + "</td>";
                data += "<td>" + EmpData[emp].Final_Salary + "</td>";
                data += "</tr>";
            }
            $('.tbody1').html(data);

        }

        // Declerat Global Varibals :-
        var emp_name, from_date, to_date, Params, QueryAttendance, QueryAttendanceT2;
        // Search Method :-
        $('form').on('click', '.Search_Btn', function(e) {
            e.preventDefault();

            emp_name = $('#Employe_Search').val();
            from_date = $('.from_date').val();
            to_date = $('.to_date').val();

            if ($('.List_Search').val() == 'date') {
                Params = {
                    'status': $('.List_Search').val(),
                    'from_date': from_date,
                    'to_date': to_date,
                    'QueryAttendance': QueryAttendance,
                    'QueryAttendanceT2': QueryAttendanceT2
                };
                console.log(Params);
            } else if ($('.List_Search').val() == 'date_name') {
                Params = {
                    'status': $('.List_Search').val(),
                    'emp_name': emp_name,
                    'from_date': from_date,
                    'to_date': to_date,
                    'QueryAttendance': QueryAttendance,
                    'QueryAttendanceT2': QueryAttendanceT2
                };
                console.log(Params);
            }


            var URL = "{{ route('Employees_Salaries.Search') }}";
            axios.post(URL, Params)
                .then(function(response) {
                    // console.log(response.data.EmpData_Search);
                    GetRows(response.data.EmpData_Search);
                    Params = null;
                }).catch(function(error) {
                    console.log(error);
                    Params = null;
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
                $('.Search_Btn').removeClass("d-none").addClass("d-block");
            }
        });
    </script>
@endsection

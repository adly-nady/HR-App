@extends('backend.layouts.parent')

@section('title', ' السلف/الراتب ')

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
            <option value="date"> ألتاريخ </option>
            <option value="date_name"> ألتاريخ & ألأسم </option>
        </select>
    </div>
    <form method="post">
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
                    <label for="inputEmail3" class="col-sm-12 col-form-label emp_name_label d-none"> أسم الموظف </label>
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
                    <button class="Search_Btn btn btn-block bg-gradient-success d-none">بحث</button><br>
                </div>
            </div>
        </div>
    </form>
</div>
<br>
<hr>
<br>
    {{-- table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> البيانات </h3>
            </div>

            <!-- /.card-header -->
            <div class="col">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>التاريخ </th>
                                <th>الموظف </th>
                                <th> المبلغ  </th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @for ($dp = 0; $dp < count($data); $dp++)
                                <tr>
                                    <td>{{ $data[$dp]->date }}</td>
                                    <td>{{ $data[$dp]->name }}</td>
                                    <td>{{ $data[$dp]->amount }}</td>
                                    <td><button class="btn btn-danger btn-sm delete" id="{{ $data[$dp]->id }}"><i class="fas fa-trash p-1"></i> حذف </button></td>
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
    </script>
    <script>
        function GetRows(empData) {
            var data = "";
            for (var emp = 0; emp < empData.length; emp++) {
                data += "<tr>";
                data += "<td>" + empData[emp].date + "</td>";
                data += "<td>" + empData[emp].name + "</td>";
                data += "<td>" + empData[emp].amount + "</td>";
                data += "<td><button class='btn btn-danger btn-sm delete' id='" + empData[emp].id +"'><i class='fas fa-trash p-1'></i>Delete</button></td>";
                data += "</tr>";
            }
            $('tbody').html(data);
            // data = "";
        }

        $('tbody').on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');

            var URL = "{{ route('Salary_Borrow_Delete', ':id') }}".replace(':id', id);
            axios.get(URL, {
                    id: id
                })
                .then(function(response) {
                    console.log(response.data.data);
                    Toast.fire({
                        icon: 'success',
                        title: ' success '
                    });
                    GetRows(response.data.data);
                })
                .catch(function(error) {
                    Toast.fire({
                        icon: 'error',
                        title: ' error : ' + error
                    });
                });
        });

        // Declerat Global Varibals :-
        var emp_name, from_date, to_date, Params, Query;
        // Search Method :-
        $('form').on('click', '.Search_Btn', function(e) {
            e.preventDefault();

            emp_name = $('#Employe_Search').val();
            from_date = $('.from_date').val();
            to_date = $('.to_date').val();

            if ($('.List_Search').val() == 'date') {
                Query = `  borrow_salary.date BETWEEN '${from_date}' AND '${to_date}' `;
                Params = {
                    'status': $('.List_Search').val(),
                    'Query': Query,
                };
                console.log(Params);
            } else if ($('.List_Search').val() == 'date_name') {
                Query = `  borrow_salary.date BETWEEN '${from_date}' AND '${to_date}' AND borrow_salary.emp_id =  '${emp_name}' `;
                Params = {
                    'status': $('.List_Search').val(),
                    'Query': Query,
                };
                console.log(Params);
            }


            var URL = "{{ route('Salary_Borrow_Search') }}";
            axios.post(URL, Params)
                .then(function(response) {
                    console.log(response.data.Emp_data);
                    GetRows(response.data.Emp_data);
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
@endsection()

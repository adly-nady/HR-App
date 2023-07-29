@extends('backend.layouts.parent')

@section('title', ' الموظفين')

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
@endsection

@section('content')
    <div class="row">
        <col-12>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>رقم</th>
                            <th>الاسم</th>
                            <th> رقم الكارت </th>
                            <th>الصلاحية</th>
                            <th>كلمة المرور</th>
                            <th>الراتب/الشهر</th>
                            <th>القسم</th>
                            <th> المسمى الوظيفي </th>
                            <th> حذف </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($emp = 0; $emp < count($EmpData); $emp++)
                            <tr id="{{ $EmpData[$emp]->id }}tr">
                                <td>{{ $EmpData[$emp]->id }}</td>
                                <td>{{ $EmpData[$emp]->name }}</td>
                                <td>{{ $EmpData[$emp]->id_card }}</td>
                                <td>{{ $EmpData[$emp]->role }}</td>
                                <td>{{ $EmpData[$emp]->password }}</td>
                                <td>{{ $EmpData[$emp]->salary_month }}</td>
                                <td>{{ $EmpData[$emp]->dep_name }}</td>
                                <td>{{ $EmpData[$emp]->job_title }}</td>
                                <td class="text-center py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-info Select" id="{{ $EmpData[$emp]->id }}"
                                            href="{{ route('Employee_Select', $EmpData[$emp]->id) }}"><i
                                                class="fas fa-eye p-1"></i>تحديد</a>
                                        <button class="btn btn-danger Delete" id="{{ $EmpData[$emp]->id }}"><i
                                                class="fas fa-trash p-1"></i>حذف</button>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </col-12>

        @include('backend.include.message')
    </div>
    {{-- {{ $products->links() }} --}}
@endsection()

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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        // Get Data :-
        function GetRows(EmpDataTable) {
            var data = "";
            for (var emp = 0; emp < EmpDataTable.length; emp++) {
                data += "<tr id='" + EmpDataTable[emp].id + "'>";
                data += "<td>" + EmpDataTable[emp].id + "</td>";
                data += "<td>" + EmpDataTable[emp].name + "</td>";
                data += "<td>" + EmpDataTable[emp].id_card + "</td>";
                data += "<td>" + EmpDataTable[emp].role + "</td>";
                data += "<td>" + EmpDataTable[emp].password + "</td>";
                data += "<td>" + EmpDataTable[emp].salary_month + "</td>";
                data += "<td>" + EmpDataTable[emp].dep_name + "</td>";
                data += "<td>" + EmpDataTable[emp].job_title + "</td>";
                data += "<td class='text-center py-0 align-middle'>";
                data += "<div class='btn-group btn-group-sm'>";
                data += "<button class='btn btn-info Select' id='" + EmpDataTable[emp].id +
                    "'><i class='fas fa-eye p-1'></i>Select</button>";
                data += "<button class='btn btn-danger Delete' id='" + EmpDataTable[emp].id +
                    "'><i class='fas fa-trash p-1'></i>Delete</button>";
                data += "</div>";
                data += "</td>";
                data += "</tr>";
            }
            $('tbody').html(data);
        }

        // Delete Row :-
        $('tbody').on('click', '.Delete', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var URL = "{{ route('delete_Employee', ':id') }}".replace(':id', id);
            axios.get(URL)
                .then(function(response) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.data.Message ?? "Not Find Parameter",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    GetRows(response.data.EmpDataTable);
                });
        });
    </script>
@endsection

@extends('backend.layouts.parent')

@section('title', 'إضافة الموظفين')


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

    <div class="col-12">
        <form method="POST">
            @csrf
            <!-- Form Element sizes -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">بيانات الموظف الاساسية</h3>
                </div>
                <div class="card-body row">
                    <div class="col-12">
                        <!-- text input -->
                        <div class="form-group">
                            <label>رقم الموظف</label>
                            <input type="text" class="form-control text-center id" value="{{ $id }}" update="{{ $update ?? 0 }}" placeholder="Enter ..." readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>اسم الموظف</label>
                            <input type="text" class="form-control name" name="name" id="name" value="{{ $Data_emp->name ?? ' ' }}" placeholder="Employee Name">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>رقم الكارت</label>
                            <input type="text" class="form-control id_card" name="id_card" value="{{ $Data_emp->id_card ?? ' ' }}" placeholder="Id Card">
                        </div>
                    </div>
                    <div class="col-3">
                        <label>الصلاحية </label>
                        <input type="number" class="form-control text-center role" name="role" value="{{ $Data_emp->role ?? ' ' }}" placeholder="Role">
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>كلمة المرور</label>
                            <input type="text" class="form-control password" value="{{ $Data_emp->password ?? ' ' }}" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-4">
                        <label>الراتب/الشهرى</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control salary_month" value="{{ $Data_emp->salary_month ?? ' ' }}" name="Salary" value="{{ old('Salary') }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>القسم</label>
                            <select name="" id="" class="form-control depart_id" name="Department">
                                @for ($emp = 0; $emp < count($depart); $emp++)
                                    @if ($ourDepart != null && $ourDepart == $depart[$emp]->id)
                                        <option value="{{ $depart[$emp]->id }}" selected>{{ $depart[$emp]->dep_name }}</option>
                                    @else
                                        <option value="{{ $depart[$emp]->id }}">{{ $depart[$emp]->dep_name }}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>المُسمى الوظيفي</label>
                            <input type="text" class="form-control job_title" value="{{ $Data_emp->job_title ?? ' ' }}" placeholder="Job Title">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="form-group">
                            <label> عدد ايام / حافز الانتظام </label>
                            <input type="number" class="form-control plus_incentive text-center" value="{{ $Data_emp->plus_incentive ?? ' ' }}" placeholder="0">
                        </div>
                    </div>
                    <div class="col-4 text-canter">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <hr>
            <!-- /.card -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">بيانات الموظف الثانوية </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>المؤهل</label>
                                    <select name="" id="" class="form-control Qualifications">
                                        @for ($emp = 0; $emp < count($qualific); $emp++)
                                            @if ($ourQualific != null && $ourQualific == $qualific[$emp]->id)
                                                <option value="{{ $qualific[$emp]->id }}" selected>{{ $qualific[$emp]->name }}</option>
                                            @else
                                                <option value="{{ $qualific[$emp]->id }}">{{ $qualific[$emp]->name }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>رصيد الإجازة السنوية</label>
                                    <input type="text" class="form-control text-center vacation_balance" value="{{ $emp_plus->vacation_balance ?? 0 }}" name="Accrued_Annual_Leave" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input army" type="checkbox" id="customCheckbox1" Ifchecked="{{ $emp_plus->army ?? 0 }}">
                                    <label for="customCheckbox1" class="custom-control-label h6">بيان موقف التجنيد</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input birth_certificate" type="checkbox" id="customCheckbox2" Ifchecked="{{ $emp_plus->birth_certificate ?? 0 }}">
                                    <label for="customCheckbox2" class="custom-control-label h6">شهادة الميلاد</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input fishe" type="checkbox" id="customCheckbox3" Ifchecked="{{ $emp_plus->fishe ?? 0 }}">
                                    <label for="customCheckbox3" class="custom-control-label h6">الفيش</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input health_certificate" type="checkbox" id="customCheckbox4" Ifchecked="{{ $emp_plus->health_certificate ?? 0 }}">
                                    <label for="customCheckbox4" class="custom-control-label h6">الشهادة الصحية </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input work_stub" type="checkbox" id="customCheckbox5" Ifchecked="{{ $emp_plus->work_stub ?? 0 }}">
                                    <label for="customCheckbox5" class="custom-control-label h6">كعب العمل</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input form_111" type="checkbox" id="customCheckbox6" Ifchecked="{{ $emp_plus->form_111 ?? 0 }}">
                                    <label for="customCheckbox6" class="custom-control-label h6">استمار 111</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input personal_id" type="checkbox" id="customCheckbox7" Ifchecked="{{ $emp_plus->personal_id ?? 0 }}">
                                    <label for="customCheckbox7" class="custom-control-label h6">صورة البطاقة الشخصية</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input personal_photos" type="checkbox" id="customCheckbox8" Ifchecked="{{ $emp_plus->personal_photos ?? 0 }}">
                                    <label for="customCheckbox8" class="custom-control-label h6">الصور الشخصية</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input job_request" type="checkbox" id="customCheckbox9" Ifchecked="{{ $emp_plus->job_request ?? 0 }}">
                                    <label for="customCheckbox9" class="custom-control-label h6"> طلب عمل </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input paper_qualification" type="checkbox" id="customCheckbox10" Ifchecked="{{ $emp_plus->paper_qualification ?? 0 }}">
                                    <label for="customCheckbox10" class="custom-control-label h6"> شهادة المؤهل </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="custom-control custom-checkbox ">
                                    <input class="custom-control-input driving_license" type="checkbox" id="customCheckbox11" Ifchecked="{{ $emp_plus->driving_license ?? 0 }}">
                                    <label for="customCheckbox11" class="custom-control-label h6"> صورة الرخصة </label>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-9 text-canter t-3">
                        <div class=".form-group">
                        </div>
                    </div>
                    {{-- Submit Button --}}
                    <div class="col-3 text-canter">
                        <div class="row col-12" style="display: inline-flex";>
                            <div class="col-4">
                                <button type="button" class="btn btn-block bg-gradient-success p-2 save">حفظ</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-block bg-gradient-info  p-2 Clear">تفريغ</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12"></div>
                    </div>
                </div>
            </div>
        </form>
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
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ url('dist/js/demo.js') }}"></script>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultInfo').click(function() {
                Toast.fire({
                    icon: 'info',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultWarning').click(function() {
                Toast.fire({
                    icon: 'warning',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultQuestion').click(function() {
                Toast.fire({
                    icon: 'question',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });

            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultInfo').click(function() {
                toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').click(function() {
                toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').click(function() {
                toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });

            $('.toastsDefaultDefault').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultTopLeft').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'topLeft',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultBottomRight').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'bottomRight',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultBottomLeft').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'bottomLeft',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultAutohide').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    autohide: true,
                    delay: 750,
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultNotFixed').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    fixed: false,
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultFull').click(function() {
                $(document).Toasts('create', {
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    icon: 'fas fa-envelope fa-lg',
                })
            });
            $('.toastsDefaultFullImage').click(function() {
                $(document).Toasts('create', {
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    image: '../../dist/img/user3-128x128.jpg',
                    imageAlt: 'User Picture',
                })
            });
            $('.toastsDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultInfo').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-info',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultWarning').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultDanger').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultMaroon').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-maroon',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    </script>
    <script>
        // let age = prompt('How old are you?', 100);
        // alert(`Your age = ${age} `);
        // Clear Data :-
        function Clear() {
            $('.name').val(" ");
            $('.id_card').val(" ");
            $('.role').val(" ");
            $('.password').val(" ");
            $('.salary_month').val(" ");
            $('.job_title').val(" ");
            $('.plus_incentive').val("0");
            $('.army').prop('checked', false);
            $('.birth_certificate').prop('checked', false);
            $('.fishe').prop('checked', false);
            $('.health_certificate').prop('checked', false);
            $('.work_stub').prop('checked', false);
            $('.form_111').prop('checked', false);
            $('.personal_id').prop('checked', false);
            $('.personal_photos').prop('checked', false);
            $('.job_request').prop('checked', false);
            $('.paper_qualification').prop('checked', false);
            $('.driving_license').prop('checked', false);
            $('.vacation_balance').val(0);
            $('.id').attr('update', 0);

        }
        // Save item
        $('form').on('click', '.save', function(e) {
            e.preventDefault();
            var id = $('.id').val();
            id++;
            var URL = "{{ route('Employee_save') }}";
            axios.post(URL, {
                    'id': $('.id').val(),
                    'name': $('.name').val(),
                    'id_card': $('.id_card').val(),
                    'role': $('.role').val(),
                    'password': $('.password').val(),
                    'salary_month': $('.salary_month').val(),
                    'depart_id': $('.depart_id option:selected').val(),
                    'job_title': $('.job_title').val(),
                    'Qualifications': $('.Qualifications option:selected').val(),
                    'plus_incentive': $('.plus_incentive').val(),
                    'army': $('.army').is(":checked") ?? 0,
                    'birth_certificate': $('.birth_certificate').is(":checked") ?? 0,
                    'fishe': $('.fishe').is(":checked") ?? 0,
                    'health_certificate': $('.health_certificate').is(":checked") ?? 0,
                    'work_stub': $('.work_stub').is(":checked") ?? 0,
                    'form_111': $('.form_111').is(":checked") ?? 0,
                    'personal_id': $('.personal_id').is(":checked") ?? 0,
                    'personal_photos': $('.personal_photos').is(":checked") ?? 0,
                    'vacation_balance': $('.vacation_balance').val() ?? 0,
                    'job_request':$('.job_request').is(':checked') ?? 0,
                    'paper_qualification':$('.paper_qualification').is(':checked') ?? 0,
                    'driving_license':$('.driving_license').is(':checked') ?? 0,
                    'update': $('.id').attr('update'),
                })
                .then(function(res) {
                    if (!res.data.errors) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.data ?? "Not Find Parameter",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        if ($('.id').attr('update') != 1) {
                            $('.id').val(id);
                            Clear();
                        }
                    } else {
                        res.data.errors.forEach(element => {
                            if (element) {
                                toastr.error(element);
                            }
                        });
                    }
                })
                .catch(function(error) {
                    toastr.error(error);
                });
        });

        $('form').on('click', '.Clear', function(e) {
            e.preventDefault();
            Clear();
        });

        if ($('.id').attr('update') == 1) {
            var army = $('.army').attr('Ifchecked') == 1 ? true : false;
            $('.army').prop('checked', army);

            var birth_certificate = $('.birth_certificate').attr('Ifchecked') == 1 ? true : false;
            $('.birth_certificate').prop('checked', birth_certificate);

            var fishe = $('.fishe').attr('Ifchecked') == 1 ? true : false;
            $('.fishe').prop('checked', fishe);

            var health_certificate = $('.health_certificate').attr('Ifchecked') == 1 ? true : false;
            $('.health_certificate').prop('checked', health_certificate);

            var work_stub = $('.work_stub').attr('Ifchecked') == 1 ? true : false;
            $('.work_stub').prop('checked', work_stub);

            var form_111 = $('.form_111').attr('Ifchecked') == 1 ? true : false;
            $('.form_111').prop('checked', form_111);

            var personal_id = $('.personal_id').attr('Ifchecked') == 1 ? true : false;
            $('.personal_id').prop('checked', personal_id);

            var personal_photos = $('.personal_photos').attr('Ifchecked') == 1 ? true : false;
            $('.personal_photos').prop('checked', personal_photos);

            var job_request = $('.job_request').attr('Ifchecked') == 1 ? true : false;
            $('.job_request').prop('checked', job_request);

            var paper_qualification = $('.paper_qualification').attr('Ifchecked') == 1 ? true : false;
            $('.paper_qualification').prop('checked', paper_qualification);

            var driving_license = $('.driving_license').attr('Ifchecked') == 1 ? true : false;
            $('.driving_license').prop('checked', driving_license);
        }
    </script>

@endsection()

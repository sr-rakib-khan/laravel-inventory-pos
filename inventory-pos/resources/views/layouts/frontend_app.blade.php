<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title>S.R Traders</title>




    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        @include('layouts.frontend_partial.header')

        @include('layouts.frontend_partial.sidebar')

        @yield('page-content')
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/custom-select.js') }}"></script>
    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('assets/js/moment.min.js') }}"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"
        integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"
        integrity="sha512-2/YdOMV+YNpanLCF5MdQwaoFRVbTmrJ4u4EpqS/USXAQNUDgI5uwYi6J98WVtJKcfe1AbgerygzDFToxAlOGEQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>







    <!-- delete sweetalert script -->
    <script>
        $(document).on("click", ".delete", function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            swal({
                    title: 'Are you sure to delete',
                    text: "Once delte, This will parmanently delete",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal('save data');
                    }
                })
        })
    </script>


    {{-- pdf create js code  --}}
    <script>
        $(document).ready(function() {
            $('#generatePDF').click(function() {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF();

                // টেবিলের মধ্যে ডেটা সংগ্রহ করা
                let content = [];
                $('#download thead tr').each(function() {
                    let rowData = [];
                    $(this).find('th').each(function() {
                        rowData.push($(this).text());
                    });
                    content.push(rowData);
                });

                $('#download tbody tr').each(function() {
                    let rowData = [];
                    $(this).find('td').each(function() {
                        rowData.push($(this).text());
                    });
                    content.push(rowData);
                });

                // টেবিল ডেটা PDF এ যোগ করা
                doc.autoTable({
                    head: [content[0]],
                    body: content.slice(1)
                });

                // PDF ডাউনলোড করা
                doc.save('info-list.pdf');
            });
        });
    </script>


    {{-- toastr js code  --}}
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>

    @include('layouts._main.css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        .btn-xs {
            padding: 0.1rem 1rem !important;
        }

        .form-control {
            padding: .375rem 2.25rem .375rem .75rem !important;
            min-height: calc(1.5em + (0.75rem + 5px));
        }

    </style>
</head>

<body>
    <div class="container-scroller">

        @include('layouts.admin.navbar')

        <div class="container-fluid page-body-wrapper">

            @include('layouts.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @if ($errors->any())
                        <x-alert type="danger">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </x-alert>
                    @endif

                    @if (Session::has('notif'))
                        {!! Session::get('notif') !!}
                    @endif

                    @yield('content')
                </div>

                @include('layouts.admin.footer')
            </div>
        </div>
    </div>

    @include('layouts._main.js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-table]').DataTable();

            $("[select-autocomplete]").select2({
                theme: "bootstrap-5",
            });
        })
    </script>
</body>

</html>

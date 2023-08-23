@extends('layouts.master')
@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
@endpush
@section('pageTitle')
    {{ __('Dashboard') }}
@endsection
@section('content')

@endsection
@push('js')
    <script src="{{ asset('backend/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{ asset('backend/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
    <!-- Datatable Setting js -->
    <script src="{{ asset('backendvendors/scripts/datatable-setting.js') }}"></script>
@endpush

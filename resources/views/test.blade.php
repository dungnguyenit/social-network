@extends('layouts.print')
@section('title', '個人別詳細')
@push('scripts')
<script defer src="{{ mix('/js/mics.js') }}" defer></script>
<script defer src="{{ mix('/js/pages/print_customize/tokyoas_print_customize.js') }}"></script>
@endpush
@section('content')
<section id="print_wrapper">
    <section id="print">
        <common-header></common-header>
        <main id="attendance_detail" class="totate">
            <section>
                <print-customize-person-block v-for="(employeePrint, index) in employeesPrint" :block-key="index" :employee-print="employeePrint">
                </print-customize-person-block>
            </section>
        </main>
    </section>
    <footer class="top_20">
        <small>2018©ITZmkt inc.</small>
    </footer>
</section>
@endsection
apps-fileview.texmex_20231019.01_p2
tokyoas_print_preview.blade.php
Displaying tokyoas_print_preview.blade.php.
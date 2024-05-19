@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>My Records</title>
</head>
<!--end::Head-->
<!--begin::Body-->
@section('content')
    @include('navbar')
    <!--begin::Main-->
    <!--begin::Root-->

    <div class="container justify-content-center">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            <!--begin::Wrapper-->
            <div class="m-10 d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid mx-auto" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" style="overflow: scroll" {{-- class="container-xxl" --}}>
                            <!--begin::Card-->
                            <div class="card" style="overflow: scroll">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <div class="mb-3">
                                            {{-- <label for="exampleFormControlInput1" class="form-label">Search</label> --}}
                                            <input type="input" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Search For Record">
                                        </div>
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-light-primary me-3"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Filter</button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                data-kt-menu="true" id="kt-toolbar-filter">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Separator-->
                                                <!--begin::Content-->
                                                <div class="px-7 py-5">
                                                    <form id="filter-form" action="{{ route('records.index') }}"
                                                        method="get">
                                                        <!--begin::Input group-->
                                                        <div class="mb-10">
                                                            <!--begin::Label-->
                                                            <label class="form-label fs-5 fw-bold mb-3">Category:</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            @php
                                                                $categories = \App\Models\Category::all();
                                                            @endphp

                                                            <select id="filter-select"
                                                                class="form-select form-select-solid fw-bolder"
                                                                data-kt-select2="true" data-placeholder="Select option"
                                                                data-allow-clear="true"
                                                                data-kt-customer-table-filter="month" name="filter"
                                                                data-dropdown-parent="#kt-toolbar-filter">
                                                                <option></option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->

                                                        <!--begin::Actions-->
                                                        <div class="d-flex justify-content-end">
                                                            <button type="reset" id="reset-button"
                                                                class="btn btn-light btn-active-light-primary me-2"
                                                                data-kt-menu-dismiss="true"
                                                                data-kt-customer-table-filter="reset">Reset</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                data-kt-menu-dismiss="true"
                                                                data-kt-customer-table-filter="filter">Apply</button>
                                                        </div>
                                                        <!--end::Actions-->
                                                    </form>

                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Filter-->

                                            <!--begin::Add customer-->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_add_customer">New Record</button>
                                            <!--end::Add customer-->
                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end align-items-center d-none"
                                            data-kt-customer-table-toolbar="selected">
                                            <div class="fw-bolder me-5">
                                                <span class="me-2"
                                                    data-kt-customer-table-select="selected_count"></span>Selected
                                            </div>
                                            <button type="button" class="btn btn-danger"
                                                data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                        </div>
                                        <!--end::Group actions-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                            data-kt-check-target="#kt_customers_table .form-check-input"
                                                            value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-125px">Description</th>
                                                <th class="min-w-125px">Amount</th>
                                                <th class="min-w-125px">Category</th>
                                                <th class="min-w-125px">Date</th>
                                                <th class="text-end min-w-70px">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">
                                            @foreach ($records as $record)
                                                <tr>
                                                    <!--begin::Checkbox-->
                                                    <td>
                                                        <div
                                                            class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </div>
                                                    </td>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Name=-->
                                                    <td>
                                                        <p class="text-primary  mb-1">{{ $record->description }}</p>
                                                    </td>
                                                    <!--end::Name=-->
                                                    <!--begin::Email=-->
                                                    <td>
                                                        <p class="text-danger  mb-1">{{ $record->amount }}</p>
                                                    </td>
                                                    <!--end::Email=-->
                                                    <!--begin::Company=-->
                                                    <td class="text-success">
                                                        {{ $record->category?->name ?? 'not specified' }}
                                                    </td>
                                                    <!--end::Company=-->

                                                    <!--begin::Date=-->
                                                    <td>{{ Carbon\Carbon::parse($record->date)->format('d-m-Y') }}</td>
                                                    <!--end::Date=-->
                                                    <!--begin::Action=-->
                                                    <td class="text-end">
                                                        <a href="#"
                                                            class="btn btn-sm btn-light btn-active-light-primary"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">Actions
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                            <span class="svg-icon svg-icon-5 m-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon--></a>
                                                        <!--begin::Menu-->
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                            data-kt-menu="true">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                {{-- <a href="../../demo8/dist/apps/customers/view.html"
                                                                    class="menu-link px-3">Edit</a> --}}
                                                                <div class="menu-link px-3" data-bs-toggle="modal"
                                                                    data-bs-target="#kt_modal_add_customer"
                                                                    onClick="edit({{ $record }})">Edit</div>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="{{ route('records.delete', ['record_id' => $record->id]) }}"
                                                                    class="menu-link px-3"
                                                                    data-kt-customer-table-filter="delete_row">Delete</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                    <!--end::Action=-->
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->


                            <!--begin::Modals-->
                            <!--begin::Modal - Records - Add-->
                            @extends('record.create')
                            <!--end::Modal - Customers - Add-->
                            <!--end::Modals-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    <script>
        // $(document).ready(function() {
        function edit(record) {
            const recordForm = $('#record_form');
            recordForm.attr('action', "/records/update/" + record.id);
            $('input[name=description]').val(record.description);
            $('input[name=amount]').val(record.amount);
            $('input[name=date]').val(record.date.split(' ')[0]);
        }
        // });

        document.addEventListener('DOMContentLoaded', function() {
            const resetButton = document.getElementById('reset-button');
            const filterForm = document.getElementById('filter-form');
            const filterSelect = document.getElementById('filter-select');

            resetButton.addEventListener('click', function(event) {
                // Prevent the default form reset behavior
                event.preventDefault();

                // Clear the select input
                filterSelect.value = '';

                // Remove the name attribute to avoid sending it in the request
                filterSelect.removeAttribute('name');

                // Submit the form
                filterForm.submit();
            });
        });

        $(document).ready(function() {

            var table = $('#kt_customers_table').DataTable({
                searching: true,
                pageLength: 30,
                search: false
            });

            $('#exampleFormControlInput1').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>

    <!--end::Root-->
    <!--begin::Drawers-->
    <!--end::Drawers-->
    <!--end::Main-->
@endsection

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

                            <!--end::Card-->


                            <!--begin::Modals-->
                            <!--begin::Modal - Records - Add-->
                            {{-- @extends('record.create') --}}
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

    <!--end::Root-->
    <!--begin::Drawers-->
    <!--end::Drawers-->
    <!--end::Main-->
@endsection

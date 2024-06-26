<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



        <!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{ asset("assets/plugins/custom/datatables/datatables.bundle.css") }} " rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset("assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset("assets/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />

</head>
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">

@yield('content')

    <script>var hostUrl = "assets/";</script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset("assets/plugins/global/plugins.bundle.js") }}"></script>
    <script src="{{ asset("assets/js/scripts.bundle.js") }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset("assets/plugins/custom/datatables/datatables.bundle.js") }} "></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset("assets/js/custom/apps/customers/list/export.js") }}"></script>
    <script src="{{ asset("assets/js/custom/apps/customers/list/list.js") }}"></script>
    <script src="{{ asset("assets/js/custom/apps/customers/add.js") }}"></script>
    <script src="{{asset("assets/js/custom/widgets.js")}}"></script>
    <script src="{{ asset("assets/js/custom/modals/create-app.js") }}"></script>

    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
</html>

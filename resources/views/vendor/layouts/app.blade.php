<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | {{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <link rel="shortcut icon" href="{{asset('vendors/assets/images/favicon.ico')}}">
        <link href="{{asset('vendors/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('vendors/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    </head>

    @include('vendor.layouts.header')

</html>

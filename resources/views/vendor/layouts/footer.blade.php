<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-end">
                {{date('Y')}} - {{date('Y',strtotime('+1 years'))}} © {{env('APP_NAME')}}
            </div>
        </div>
    </div>
</footer>

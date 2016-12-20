<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Frengkas | Dashboard</title>

    <!-- Data Tables -->
    <link href="{{ asset('/dashboard') }}/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="{{ asset('/dashboard') }}/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="{{ asset('/dashboard') }}/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="{{ asset('/dashboard') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/dashboard') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="{{ asset('/dashboard') }}/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('/dashboard') }}/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="{{ asset('/dashboard') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('/dashboard') }}/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        @include('layouts.nav')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <!-- <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form> -->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Frengkas - Aplikasi Pangkas Online</span>
                        </li>
                        @if (Auth::guest())

                        @else
                            <li>
                                <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @yield('content')
            <div class="footer">
                <div>
                    <strong>Copyright</strong> Frengkas - Aplikasi Pangkas Online &copy; {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('/dashboard') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('/dashboard') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="{{ asset('/dashboard') }}/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/dashboard') }}/js/inspinia.js"></script>
    <script src="{{ asset('/dashboard') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "{{ asset('/dashboard') }}/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
    <style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>
</html>

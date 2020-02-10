<!-- jQuery  -->
<script src="{{ asset('vertical/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('vertical/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vertical/assets/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('vertical/assets/js/waves.min.js')}}"></script>
<script src="{{ asset('vertical/assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{ asset('vertical/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ asset('vertical/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<script src="{{ asset('vertical/assets/plugins/moment/moment.js')}}"></script>
<script src="{{ asset('vertical/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js')}}"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<script src="{{ asset ('vertical/assets/pages/jquery.dashboard.init.js')}}"></script>

<!-- App js -->
<script src="{{ asset ('vertical/assets/js/app.js')}}"></script>
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset ('vertical/assets/images/favicon.ico')}}">

<!-- App css -->
<link href="{{ asset ('vertical/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset ('vertical/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset ('vertical/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset ('vertical/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

<script src="{{ asset ('vertical/assets/plugins/footable/js/footable.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/moment/moment.js')}}"></script>
<script src="{{ asset ('vertical/assets/pages/jquery.footable.init.js')}}"></script>

<!-- Pengguna js -->

<script src="{{ asset ('vertical/assets/pages/jquery.form-upload.init.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ asset ('vertical/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{ asset ('vertical/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/buttons.print.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{ asset ('vertical/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('vertical/assets/pages/jquery.datatable.init.js')}}"></script>

<script src="{{ asset ('js/modalDestroy.js')}}"></script>
<script src="{{ asset ('vertical/assets/pages/jquery.form-upload.init.js')}}"></script>
<script>
    $('#trDetailProduk').hide()
    $('#produkSelect').change(function() {
        let _id = $(this).val()
        if (_id != "") {
            $.ajax({
                url: "{{ url('produk') }}/" + _id,
                method: "GET",
                success: function(data) {
                    $('#tr_stok').html(data.stok)
                    $('#tr_harga').html("IDR " + data.harga_jual)
                    $('#trDetailProduk').slideDown("slow")
                }
            })
        } else {
            $('#trDetailProduk').slideUp("slow")
        }
    })
</script>
<script>
    $('#danaContent').hide()
    $('#radioCash').click(function() {
        $('#danaContent').hide()
        $('#cashContent').slideDown("slow")
    })
    $('#radioDana').click(function() {
        $('#cashContent').hide()
        $('#danaContent').slideDown("slow")
    })
</script>
<script>
    $('.edit').click(function() {
        let __nama = $(this).attr("__nama")
        let __action = $(this).attr("__action")

        $('#formCreate').attr("action", __action)
        $('#namaProduk').html(__nama)
        $('#openFormCreate').click()
    })
</script>
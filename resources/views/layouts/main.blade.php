<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @include('partials.title-page')


    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/chocolat.css') }}">



    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
{{--
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --> --}}
<style>
    .floating {
    position: fixed;
    width: 50px;
    height: 50px;
    bottom: 30px;
    right: 30px;
    background-color: #06ad00;
    color: #fff;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 3;
    }

    .fab-icon {
    margin-top: 16px;
    }

</style>

</head>

    {{-- @if (Auth::user()->role == 'operator')
        <body class="sidebar-mini">
    @else
        <body>
    @endif --}}
<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg bg-success"></div>

    @include('sweetalert::alert')
    @include('partials.navbar')
    @if (Auth::user()->role == 'superadmin')
    @include('partials.Sadmin.sidebar')
    @elseif (Auth::user()->role == 'admin')
    @include('partials.Admin.sidebar')
    @else
    @include('partials.Operator.sidebar')
    @endif

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; @php
            echo date('Y')
            @endphp
         Design By <a href="https://tanjungbalaikota.go.id/">Pemerintah Kota Tanjungbalai</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>


  <!-- JS Libraies -->
  <script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.chocolat.min.js') }}"></script>


  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $(document).ready(function () { // datatable clintside
            $('#datatables').DataTable();
        });
  </script>
  <script>
      $(document).ready(function () { // datatable clintside
            $('#datatables-disordering').DataTable({
                ordering: false,
                responsive: true
            });
        });
  </script>
  {{-- <script>
    $(function() { // ajax datatable serverside
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('user.json') !!}', // memanggil route yang menampilkan data json
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'email',
                    name: 'email'
                },
            ]
        });
    });
</script> --}}
<script type="text/javascript">
    function confirmation_destroy(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        console.log(urlToRedirect); // verify if this is the right URL
        Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Setelah dihapus, kamu tidak dapat mengambalikan datanya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            })
            .then((result) => {
                // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                } else {
                    Swal.fire('Wops !',
                        'Perintah Hapus dibatalkan .',
                        'success');
                }
            });
    }
</script>

<script>
function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    Swal.fire({
            title: 'Apakah anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya !'
        })
        .then((result) => {
            // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
            if (result.isConfirmed) {
                window.location.href = urlToRedirect;
            } else {
                Swal.fire('Wops !',
                    'Konfirmasi dibatalkan.',
                    'success');
            }
        });
}
</script>

<script>
    $(document).ready(function(){
        $('#MybtnModal').click(function(){
            // $('#Mymodal').modal('show')
            $("#fire-modal-2").modal('show');

        });
    });
</script>

</body>
</html>


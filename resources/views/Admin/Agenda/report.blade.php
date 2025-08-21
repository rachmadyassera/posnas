@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Export Laporan Kegiatan </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('activity.download') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tanggal Awal </label>
                                <input type="date" name="tglawal" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Akhir </label>
                                <input type="date" name="tglakhir" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                                <input type="submit" value="Download" id="exportPdfBtn" class="btn btn-success">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


    <script>
        document.getElementById('exportPdfBtn').addEventListener('click', function() {
            let timerInterval;

            // Disable tombol
            this.style.display = 'none';

            Swal.fire({
                title: "Sedang proses unduhan ...",
                html: "Progres ini akan ditutup setelah export berhasil.",
                timer: 3000,
                timerProgressBar: true,
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                },
                willClose: () => {
                    clearInterval(timerInterval);
                    this.style.display = 'inline-block';


                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });

            // document.getElementById('loading').style.display = 'block';

            // setTimeout(() => {
            //     document.getElementById('loading').style.display = 'none';
            // }, 3000); // sembunyikan setelah download mulai
        });
    </script>
@endsection

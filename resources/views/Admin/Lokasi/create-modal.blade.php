
<div class="modal fade" role="dialog" id="fire-modal-2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Pendaftaran Lokasi</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('location.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lokasi</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lokasi</label>
                        <textarea name="address" class="form-control" style="height: 100px;">

                        </textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="longitude" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="latitude" class="form-control">
                    </div> --}}

                    <div class="text-right">
                        <input type="submit" value="Simpan" class="btn btn-success">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

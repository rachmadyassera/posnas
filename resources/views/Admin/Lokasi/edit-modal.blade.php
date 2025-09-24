@foreach ($lokasi as $item)
    <div class="modal fade" tabindex="-1" role="dialog" id="modalUpdate{{ $item->id }}" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Pembaharuan Data Lokasi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('location.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Lokasi</label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat Lokasi</label>
                            <input type="text" name="address" class="form-control" required
                                value="{{ $item->address }}">
                        </div>
                        <div class="text-right">
                            <input type="submit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

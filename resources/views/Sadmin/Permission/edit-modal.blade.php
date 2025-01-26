@foreach ($datas as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdate{{$item->id}}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Update Permission</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('permission.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label>Name Permission </label>
                    <input type="text" name="name" class="form-control" value="{{$item->name}}" required>
                </div>

                <div class="text-right">
                <input type="submit" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
        {{-- <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Update changes</button>
        </div> --}}
      </div>
    </div>
</div>
@endforeach


<!-- Modal -->
{{--
<div class="modal fade" id="modalUpdate{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Update Permission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('permission.update', $dt->id)}}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label>Name Permission </label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="text-right">
                <input type="submit" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save update</button>
        </div>
      </div>
    </div>
</div> --}}

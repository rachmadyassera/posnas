
<div class="modal fade" role="dialog" id="fire-modal-2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Create Permission</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('permission.store')}}" method="POST">
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
        </div>
    </div>
</div>

<form action="{{ route('spot.update') }}" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @csrf
                    <input type="hidden" name="id" value="{{ $spot->id }}">
                    <div class="form-group">
                        <label>Storage Spot</label>
                        <input type="text" value="{{ $spot->spot }}" name="spot" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option @if ($spot->status == 1) selected @endif value="1">Active</option>
                            <option @if ($spot->status == 0) selected @endif value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submitButton">Update</button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

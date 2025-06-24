<div class="modal fade" id="verticallyCenteredupdate{{ $priority->id }}" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticallyCenteredModalLabel">Update Priority</h5>
                    <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="{{ route('priority.update', $priority->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="priority_name" class="form-label">Priority Name</label>
                            <input type="text" class="form-control" id="priority_name" name="priority_name" value="{{ $priority->priority_name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="priority_color" class="form-label">Priority Color</label>
                            <input type="color" class="form-control form-control-color" id="color" name="color" title="Choose your color" value="{{ $priority->color }}" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
                </div>
            </div>
    </div>
</div>
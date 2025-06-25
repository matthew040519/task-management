<div class="modal fade" id="verticallyCenteredupdate{{ $task->id }}" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="verticallyCenteredModalLabel">Update Task</h5>
              <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
              {{-- <form action="{{ route('status.store') }}" method="POST">
            @csrf --}}
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" name="file" required>
              </div>
            @if($task->file_name)
                <div class="col-md-12 mb-3">
                    <label class="form-label">Current File:</label>
                    <a href="{{ asset('storage/attachments/' . $task->file_name) }}" target="_blank">{{ basename($task->file_name) }}</a>
                </div>
            @endif
              <div class="col-md-6 mb-3">
                <label for="task_name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="{{ $task->task_name }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="assigned_to" class="form-label">Assign</label>
                <select class="form-select assign" id="assigned_to[]" name="assigned_to[]" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}' required>
                  <option value="">Select User</option>
                  @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ in_array($user->id, $task->assignTasks->pluck('user_id')->toArray()) ? 'selected' : '' }}>{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="priority_id" class="form-label">Priority</label>
                <select class="form-select" id="priority_id" name="priority_id" required>
                  <option value="">Select Priority</option>
                  @foreach($priorities as $priority)
                    <option value="{{ $priority->id }}" {{ $priority->id == $task->priority_id ? 'selected' : '' }}>{{ $priority->priority_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="task_description" class="form-label">Description</label>
                <textarea class="form-control" id="task_description" name="task_description" rows="3">{{ $task->task_description }}</textarea>
              </div>
            </div>
              
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary update-task" type="submit">Save</button>
              <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
          </div>
          {{-- </form> --}}
          </div>
            </div>
        </div>
        <script>
            $('.update-task').on('click', function(e) {
                e.preventDefault();
                var modal = $(this).closest('.modal');
                var formData = new FormData();
                var taskId = modal.attr('id').replace('verticallyCenteredupdate', '');
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('task_name', modal.find('[name="task_name"]').val());
                formData.append('category_id', modal.find('[name="category_id"]').val());
                formData.append('priority_id', modal.find('[name="priority_id"]').val());
                formData.append('due_date', modal.find('[name="due_date"]').val());
                formData.append('task_description', modal.find('[name="task_description"]').val());
                var assignedTo = modal.find('[name="assigned_to[]"]').val();
                if (assignedTo) {
                    assignedTo.forEach(function(val) {
                        formData.append('assigned_to[]', val);
                    });
                }
                var fileInput = modal.find('[name="file"]')[0];
                if (fileInput && fileInput.files.length > 0) {
                    formData.append('file', fileInput.files[0]);
                }

                $.ajax({
                    url: '/tasks/update/' + taskId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { 'X-HTTP-Method-Override': 'PUT' },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error updating tasks: ' + xhr.responseText);
                    }
                });
            });
        </script>
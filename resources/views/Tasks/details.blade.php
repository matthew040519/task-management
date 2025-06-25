<div class="modal fade" id="projectsCardViewModal{{ $task->id }}" tabindex="-1" aria-labelledby="projectsCardViewModal" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content overflow-hidden">
              <div class="modal-header position-relative p-0">
                <input class="d-none" id="projectCoverInput" type="file" />
                <label class="position-absolute top-0 start-0" for="projectCoverInput"><span class="project-modal-btn d-inline-block bg-body-emphasis dark__text-gray-100 rounded-2 py-2 px-3 fs-9 fw-bolder mt-3 ms-3 cursor-pointer"><span class="fa-solid fa-image me-1"></span>Change</span></label>
                <button class="btn btn-circle project-modal-btn position-absolute end-0 top-0 mt-3 me-3 bg-body-emphasis" data-bs-dismiss="modal"><span class="fa-solid fa-xmark text-body dark__text-gray-100"></span></button><img class="w-100" src="../../assets/img/generic/43.png" alt="" style="max-height: 200px;min-height: 150px;" />
              </div>
              <div class="modal-body p-5 px-md-6">
                <div class="row g-5">
                  <div class="col-12 col-md-12">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                      <div>
                        <h3 class="fw-bolder lh-sm mb-1">{{ $task->task_name }}</h3>
                        {{-- <p class="text-body-highlight fw-semibold mb-0">In list<a class="ms-1 fw-bold" href="#!">Review </a></p> --}}
                      </div>
                      <div class="ms-3 text-end">
                        {{-- <label for="status" class="form-label mb-1 text-body-secondary fw-semibold">Status</label> --}}
                        <input type="text" class="d-none" id="status_task_id" value="{{ $task->id }}" />
                        <select class="form-select status-select form-select-sm" data-task="{{ $task->id }}" name="status" id="changestatus">
                          @foreach($status as $status1)
                            <option value="{{ $status1->id }}" {{ $task->status_id == $status1->id ? 'selected' : '' }}>
                              {{ $status1->status_name }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                      <h6 class="text-body-secondary mb-2">Due date</h6>
                      <div class="flatpickr-input-container flatpickr-input-sm w-50 mb-3">
                        <input class="form-control form-control-sm ps-6 datetimepicker" id="datepicker" type="text" value="{{ $task->due_date }}" /><span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary mt-1"></span>
                      </div>
                    
                    <div class="mb-3">
                      <h6 class="text-body-secondary mb-2">Assignees</h6>
                      <div class="d-flex">
                        @foreach ($task->assignTasks as $assignee)
                        <div class="dropdown">
                          <a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <div class="avatar avatar-m  me-1">
                              <img class="rounded-circle " src="../../assets/img/team/34.webp" alt="" />

                            </div>
                          </a>
                          <div class="dropdown-menu avatar-dropdown-menu p-0 overflow-hidden" style="width: 320px;">
                            <div class="position-relative">
                              <div class="bg-holder z-n1" style="background-image:url(../../assets/img/bg/bg-32.png);background-size: auto;">
                              </div>
                              <!--/.bg-holder-->

                              <div class="p-3">
                                <div class="text-end">
                                  <button class="btn p-0 me-2"><span class="fa-solid fa-user-plus text-white"></span></button>
                                  <button class="btn p-0"><span class="fa-solid fa-ellipsis text-white"></span></button>
                                </div>
                                <div class="text-center">
                                  <div class="avatar avatar-xl status-online position-relative me-2 me-sm-0 me-xl-2 mb-2"><img class="rounded-circle border border-light-subtle" src="../../assets/img/team/34.webp" alt="" /></div>
                                  <h6 class="text-white">{{ $assignee->assignto->name }}</h6>
                                  <p class="text-light text-opacity-50 fw-semibold fs-10 mb-2">{{ $assignee->assignto->email }}</p>
                                  {{-- <div class="d-flex flex-center mb-3">
                                    <h6 class="text-white mb-0">224 <span class="fw-normal text-light text-opacity-75">connections</span></h6><span class="fa-solid fa-circle text-body-tertiary mx-1" data-fa-transform="shrink-10 up-2"></span>
                                    <h6 class="text-white mb-0">23 <span class="fw-normal text-light text-opacity-75">mutual</span></h6>
                                  </div> --}}
                                </div>
                              </div>
                            </div>
                            <div class="p-3 d-flex justify-content-between"><a class="btn btn-link p-0 text-decoration-none" href="#!">Details </a><a class="btn btn-link p-0 text-decoration-none text-danger" href="#!">Unassign </a></div>
                          </div>
                        </div>
                        @endforeach
                        <button class="btn btn-sm btn-phoenix-secondary btn-circle"><span class="fa-solid fa-plus"></span></button>
                      </div>
                    </div>
                    <div class="mb-5">
                      <h6 class="text-body-secondary mb-2">Priority Status</h6>
                      <div class="d-flex align-items-center">
                        <span class="badge badge-phoenix badge-phoenix-info fs-10 me-2" style="background-color: {{ $task->priority->color }}; color: white;">{{ $task->priority->priority_name }}</span>
                      </div>
                    </div>
                    <div class="mb-6">
                      <div class="d-flex align-items-center mb-2">
                        <h4 class="me-3">Description</h4>
                        <button class="btn btn-link p-0"><span class="fa-solid fa-pen"></span></button>
                      </div>
                      <p class="text-body-highlight">{{ $task->task_description }}</p>
                    </div>
                    <div class="bg-body-highlight rounded-2 p-4 mb-3">
                      {{-- <div class="row justify-contnet-between border-bottom border-translucent g-0 gy-2 pb-3">
                        <div class="col-12 col-sm">
                          <p class="fs-9 text-body-secondary mb-2"><a class="fw-semibold" href="#!">Anthony Van Dyck </a>uploaded a file </p><img class="rounded-2 mb-2" src="../../assets/img/generic/42.png" alt="" width="220" />
                          <p class="text-body-highlight fw-semibold fs-9 mb-0">Fruit blast</p>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <p class="text-body-secondary fw-semibold fs-10 mb-0">Oct 3 at 4:38 pm</p>
                        </div>
                      </div> --}}
                      <div class="row justify-contnet-between border-bottom border-translucent g-0 gy-1 py-3 align-items-center">
                        <div class="col-12 col-sm">
                          <p class="fs-9 text-body-secondary mb-0"><span class="text-body-highlight fw-semibold me-1">{{ $task->user->name == Auth::user()->name ? 'You' : $task->user->name }}</span>created this task</p>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <p class="text-body-secondary fw-semibold fs-10 mb-0">{{ $task->created_at->format('jS M, g:i A') }}</p>
                        </div>
                      </div>
                      {{-- <div class="row justify-contnet-between border-bottom border-translucent g-0 gy-1 py-3 align-items-center">
                        <div class="col-12 col-sm">
                          <p class="fs-9 text-body-secondary mb-1"><a class="fw-semibold" href="#!">Kazimir Malevich </a>added a subtask</p>
                          <div class="d-flex">
                            <p class="mb-0 fs-9 fw-semibold text-body-highlight"><span class="fa-solid fa-circle text-primary" data-fa-transform="shrink-8"> </span>Doing</p><span class="text-body-secondary fs-9 mx-2">to</span>
                            <p class="mb-0 fs-9 fw-semibold text-body-highlight"><span class="fa-solid fa-circle text-primary" data-fa-transform="shrink-8"> </span>Review</p>
                          </div>
                        </div>
                        <div class="col-12 col-sm-auto">
                          <p class="text-body-secondary fw-semibold fs-10 mb-0">Oct 5 at 9:59 am</p>
                        </div>
                      </div> --}}
                      @foreach($task->comments as $comment)
                      <div class="row justify-contnet-between gx-2 align-items-center pt-3">
                        <div class="col col-auto">
                          <div class="avatar avatar-m status-online ">
                            <img class="rounded-circle " src="../../assets/img//team/34.webp" alt="" />

                          </div>
                        </div>
                        <div class="col col-auto flex-1">
                          <p class="fs-9 text-body-secondary mb-0"><a class="fw-semibold" href="#!">{{ $comment->user->name == Auth::user()->name ? 'You' : $comment->user->name }}</a> commented</p>
                        </div>
                        <div class="col-12 col-sm-auto order-1 order-sm-0">
                          <p class="text-body-secondary fw-semibold fs-10 mb-0">{{ $comment->created_at->format('jS M, g:i A') }}</p>
                        </div>
                        <div class="col-sm-11">
                          <p class="text-body fs-9 mb-0 ms-6">{{ $comment->comment_text }}</p>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <input type="text" value="{{ $task->id }}" class="d-none" id="task_id" />
                    <textarea class="form-control form-control mb-3" rows="3" id="comment" placeholder="Add comment"></textarea>
                    <div class="d-flex flex-between-center pb-3 border-bottom border-translucent mb-6">
                      {{-- <div class="d-flex">
                        <button class="btn btn-sm ps-0 pe-2 py-0"><span class="fa-solid fa-image fs-8"></span></button>
                        <button class="btn btn-sm px-2 py-0"><span class="fa-solid fa-calendar-days fs-8"></span></button>
                        <button class="btn btn-sm px-2 py-0"><span class="fa-solid fa-location-dot fs-8"></span></button>
                        <button class="btn btn-sm px-2 py-0"><span class="fa-solid fa-tag fs-8"></span></button>
                      </div> --}}
                      <button class="btn btn-sm btn-primary px-6" id="add-comment">Comment</button>
                    </div>
                    {{-- <div class="mb-6">
                      <div class="mb-7">
                        <h4 class="mb-4">To do list <span class="text-body-tertiary fw-normal fs-6">(23)</span></h4>
                        <div class="row align-items-center g-0 justify-content-between mb-3">
                          <div class="col-12 col-sm-auto">
                            <div class="search-box w-100 mb-2 mb-sm-0" style="max-width:30rem;">
                              <form class="position-relative">
                                <input class="form-control search-input search" type="search" placeholder="Search tasks" aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>

                              </form>
                            </div>
                          </div>
                          <div class="col-auto d-flex">
                            <p class="mb-0 ms-sm-3 fs-9 text-body-tertiary fw-bold"><span class="fas fa-filter me-1 fw-extra-bold fs-10"></span>23 tasks</p>
                            <button class="btn btn-link p-0 ms-3 fs-9 text-primary fw-bold"><span class="fas fa-sort me-1 fw-extra-bold fs-10"></span>Sorting</button>
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-1">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-0" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-0">Designing the dungeon</label><span class="badge badge-phoenix fs-10 ms-auto badge-phoenix-primary">DRAFT</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>2</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">12:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-2">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-1" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-1">Hiring a motion graphic designer</label><span class="badge badge-phoenix fs-10 ms-auto badge-phoenix-warning">URGENT</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>2</button>
                                <button class="btn p-0 text-warning fs-10 me-2"><span class="fas fa-tasks me-1"></span>3</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">12:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-3">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-2" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-2">Daily Meetings Purpose, participants</label><span class="badge badge-phoenix fs-10 ms-auto badge-phoenix-info">ON PROCESS</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>4</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">12 Dec, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">05:00 AM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-4">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-3" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-3">Finalizing the geometric shapes</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>3</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">12:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-5">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-4" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-4">Daily meeting with team members</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">1 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">12:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-6">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-5" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-5">Daily Standup Meetings</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">13 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">10:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-7">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-6" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-6">Procrastinate for a month</label><span class="badge badge-phoenix fs-10 ms-auto badge-phoenix-info">ON PROCESS</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>3</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">12:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-8">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-7" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-7">warming up</label><span class="badge badge-phoenix fs-10 ms-auto badge-phoenix-info">CLOSE</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>3</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">12 Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">12:00 PM</p>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 border-top border-bottom">
                            <div class="col-12">
                              <div data-todo-offcanvas-toogle="data-todo-offcanvas-toogle" data-todo-offcanvas-target="todoOffcanvas-9">
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                  <input class="form-check-input flex-shrink-0 form-check-line-through mt-0 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-8" />
                                  <label class="form-check-label mb-0 fs-8 me-2 line-clamp-1" for="checkbox-todo-8">Make ready for release</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="d-flex ms-4 lh-1 align-items-center">
                                <button class="btn p-0 text-body-tertiary fs-10 me-2"><span class="fas fa-paperclip me-1"></span>2</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 mb-0">2o Nov, 2021</p>
                                <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0">1:00 AM</p>
                              </div>
                            </div>
                          </div>
                        </div><a class="fw-bold fs-9 mt-4" href="#!"><span class="fas fa-plus me-1"></span>Add new task</a>
                      </div>
                    </div> --}}
                    <h4 class="mb-3">Files</h4>
                    <div class="border-top pt-3 pb-4">
                      <div class="me-n3">
                        <div class="d-flex flex-between-center">
                          <div class="d-flex mb-1"><span class="fa-solid fa-image me-2 text-body-tertiary fs-9"></span>
                            @if ($task->file_name)
                              <a href="{{ asset('storage/attachments/' . $task->file_name) }}" download="{{ $task->file_name }}" class="text-body-highlight mb-0 lh-1 d-inline-block">{{ $task->file_name }}</a>
                            @else
                              <span class="text-danger">No File Attachments.</span>
                            @endif
                          </div>
                          <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                          <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                        </div>
                        <p class="fs-9 text-body-tertiary mb-2"><span class="text-body-quaternary mx-1"></span><a href="#!">{{ $task->user->name }}</a><span class="text-body-quaternary mx-1">| </span><span class="text-nowrap">{{ $task->created_at->format('jS M, g:i A') }}</span></p>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end">
                      <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                          <span class="fa-solid fa-trash me-1"></span>Delete
                        </button>
                      </form>
                    </div>
                    {{-- <label class="btn btn-link p-0" for="customFile"><span class="fas fa-plus me-1"></span>Add file(s)</label>
                    <input class="d-none" id="customFile" type="file" /> --}}
                  </div>
                  {{-- <div class="col-12 col-md-3">
                    <h5 class="text-body-secondary mb-3">Add to card</h5>
                    <div class="mb-6">
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-user-plus"></span>Assignee</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-tag"></span>Labels</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-paperclip"></span>Attachments</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-square-check"></span>Checklist</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-calendar-days"></span>Dates</button>
                    </div>
                    <h5 class="text-body-secondary mb-3">Actions</h5>
                    <div class="mb-6">
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-arrow-right"></span>Move</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-copy"></span>Copy</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-trash"></span>Remove</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-box-archive"></span>Archive</button>
                      <button class="btn btn-sm btn-subtle-secondary rounded-3 mb-2 d-flex align-items-center w-100"><span class="me-2 fa-solid fa-share-nodes"></span>Share</button>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
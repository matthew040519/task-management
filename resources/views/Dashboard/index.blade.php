@extends('layout.layout')
@section('content')
<div class="content">
        <div class="row gy-3 mb-6 justify-content-between">
          <div class="col-md-9 col-auto">
            <h2 class="mb-2 text-body-emphasis">Tasks Dashboard</h2>
            <h5 class="text-body-tertiary fw-semibold">Here’s what’s going on at your tasks right now</h5>
          </div>
          <div class="col-md-3 col-auto">
            <div class="flatpickr-input-container">
              <input class="form-control ps-6 datetimepicker" id="datepicker" type="text" data-options='{"dateFormat":"M j, Y","disableMobile":true,"defaultDate":"Mar 1, 2022"}' /><span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
            </div>
          </div>
        </div>
        <div class="row mb-7 gy-6">
          <div class="col-12 col-xxl-2">
            <div class="row align-items-center g-3 g-xxl-0 h-100 align-content-between">
              <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                <div class="d-flex align-items-center"><span class="fs-4 lh-1 uil uil-books text-primary-dark"></span>
                  <div class="ms-2">
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 me-2">{{ $tasks->count() }}</h2><span class="fs-7 fw-semibold text-body">Total Tasks</span>
                    </div>
                    <p class="text-body-secondary fs-9 mb-0">Awating processing</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                <div class="d-flex align-items-center"><span class="fs-4 lh-1 uil uil-users-alt text-success-dark"></span>
                  <div class="ms-2">
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 me-2">{{ $users->count() }}</h2><span class="fs-7 fw-semibold text-body">Members</span>
                    </div>
                    <p class="text-body-secondary fs-9 mb-0">Working hard</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                <div class="d-flex align-items-center"><span class="fs-4 lh-1 uil uil-invoice text-warning-dark"></span>
                  <div class="ms-2">
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 me-2">{{ $tasks->where('status_id', 3)->count() }}</h2><span class="fs-7 fw-semibold text-body">Ongoing Tasks</span>
                    </div>
                    <p class="text-body-secondary fs-9 mb-0">Soon to be cleared</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12">
                <div class="d-flex align-items-center"><span class="fs-4 lh-1 uil uil-refresh text-danger-dark"></span>
                  <div class="ms-2">
                    <div class="d-flex align-items-end">
                      <h2 class="mb-0 me-2">{{ $tasks->where('status_id', 1)->count() }}</h2><span class="fs-7 fw-semibold text-body">Pending</span>
                    </div>
                    <p class="text-body-secondary fs-9 mb-0">Fresh start</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="col-12 col-xl-6 col-xxl-5">
            <div class="mx-xxl-0">
              <h3>Project: zero Roadmap</h3>
              <p class="text-body-tertiary">Phase 2 is now ongoing</p>
              <div class="gantt-zero-roadmap">
                <div class="row g-2 flex-between-center mb-3">
                  <div class="col-12 col-sm-auto">
                    <div class="d-flex">
                      <div class="d-flex align-items-end me-3">
                        <label class="form-check-label mb-0 me-2 lh-1 text-body" for="progress">Progress</label>
                        <div class="form-check form-switch min-h-auto mb-0">
                          <input class="form-check-input" id="progress" type="checkbox" checked="" data-gantt-progress="data-gantt-progress" />
                        </div>
                      </div>
                      <div class="d-flex align-items-end flex-1">
                        <label class="form-check-label mb-0 me-2 lh-1 text-body" for="links">Links</label>
                        <div class="form-check form-switch min-h-auto flex-1 mb-0">
                          <input class="form-check-input" id="links" type="checkbox" checked="" data-gantt-links="data-gantt-links" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-auto">
                    <div class="btn-group" role="group" data-gantt-scale="data-gantt-scale">
                      <input class="btn-check" id="weekView" type="radio" name="scaleView" value="week" checked="" />
                      <label class="btn btn-phoenix-secondary bg-body-highlight-hover fs-10 py-1 mb-0" for="weekView">Week</label>
                      <input class="btn-check" id="monthView" type="radio" name="scaleView" value="month" />
                      <label class="btn btn-phoenix-secondary bg-body-highlight-hover fs-10 py-1 mb-0" for="monthView">Month</label>
                      <input class="btn-check" id="yearView" type="radio" name="scaleView" value="year" />
                      <label class="btn btn-phoenix-secondary bg-body-highlight-hover fs-10 py-1 mb-0" for="yearView">Year</label>
                    </div>
                  </div>
                </div>
                <div class="gantt-zero-roadmap-chart"></div>
              </div>
            </div>
          </div> --}}
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis mt-3 pt-7 pb-3 border-y">
          <div class="row">
            <div class="col-12 col-xl-7 col-xxl-6">
              <div class="row g-3 mb-3">
                <div class="col-12 col-md-6">
                  <h3 class="text-body-emphasis text-nowrap">Task Discovered</h3>
                  <p class="text-body-tertiary mb-md-7">Newly found and yet to be solved</p>
                  <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 fw-bold">Task Status </p>
                    <p class="mb-0 fs-9">Total count <span class="fw-bold">{{ $tasks->count() }}</span></p>
                  </div>
                  <hr class="bg-body-secondary mb-2 mt-2" />
                  @foreach ($status as $stat)
                    <div class="d-flex align-items-center mb-1">
                      @php
                        // Assign a color based on status id
                        $statusColors = [
                          '1' => '#ffc107',
                          '3' => '#17a2b8',
                          '4' => '#28a745',
                          '2' => '#6c757d',
                          '5' => '#ff0000',
                          '6' => 'maroon',
                        ];
                        $color = $statusColors[$stat->id] ?? '#007bff';
                      @endphp
                      <span class="d-inline-block bullet-item me-2" style="background-color: {{ $color }};"></span>
                      <p class="mb-0 fw-semibold text-body lh-sm flex-1">{{ $stat->status_name }}</p>
                      <h5 class="mb-0 text-body">{{ $tasks->where('status_id', $stat->id)->count() }}</h5>
                    </div>
                  @endforeach
                  {{-- <button class="btn btn-outline-primary mt-5">See Details<span class="fas fa-angle-right ms-2 fs-10 text-center"></span></button> --}}
                </div>
                <div class="col-12 col-md-6">
                  <div class="position-relative mb-sm-4 mb-xl-0">
                    <div class="echart-issue-chart" style="min-height:390px;width:100%"></div>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col-12 col-xl-5 col-xxl-6">
              <h3>Project: eleven Progress</h3>
              <p class="text-body-tertiary mb-0 mb-xl-3">Deadline &amp; progress</p>
              <div class="echart-zero-burnout-chart" style="min-height:320px;width:100%"></div>
            </div> --}}
          </div>
        </div>
        <div class="mx-lg-n4 mt-3">
          <div class="row g-3">
            {{-- <div class="col-12 col-xl-6 col-xxl-7">
              <div class="card todo-list h-100">
                <div class="card-header border-bottom-0 pb-0">
                  <div class="row justify-content-between align-items-center mb-4">
                    <div class="col-auto">
                      <h3 class="text-body-emphasis">To do</h3>
                      <p class="mb-2 mb-md-0 mb-lg-2 text-body-tertiary">Task assigned to me</p>
                    </div>
                    <div class="col-auto w-100 w-md-auto">
                      <div class="row align-items-center g-0 justify-content-between">
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
                    </div>
                  </div>
                </div>
                <div class="card-body py-0 scrollbar to-do-list-body">
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-0" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Designing the dungeon</label><span class="badge badge-phoenix ms-auto fs-10 badge-phoenix-primary">DRAFT</span>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>2</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-1" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Hiring a motion graphic designer</label><span class="badge badge-phoenix ms-auto fs-10 badge-phoenix-warning">URGENT</span>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>2</a><a class="text-warning fw-bold fs-10 me-2" href="#!"><span class="fas fa-tasks me-1"></span>3</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-2" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Daily Meetings Purpose, participants</label><span class="badge badge-phoenix ms-auto fs-10 badge-phoenix-info">ON PROCESS</span>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>4</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Dec, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">05:00 AM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-3" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Finalizing the geometric shapes</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>3</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-4" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Daily meeting with team members</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center">
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">1 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-5" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Daily Standup Meetings</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-warning fw-bold fs-10 me-2" href="#!"><span class="fas fa-tasks me-1"></span>4</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">13 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">10:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-6" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Procrastinate for a month</label><span class="badge badge-phoenix ms-auto fs-10 badge-phoenix-info">ON PROCESS</span>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>3</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-7" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">warming up</label><span class="badge badge-phoenix ms-auto fs-10 badge-phoenix-secondary">CLOSE</span>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>3</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">12 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">12:00 PM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-8" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Make ready for release</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>2</a><a class="text-warning fw-bold fs-10 me-2" href="#!"><span class="fas fa-tasks me-1"></span>2</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">2o Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">1:00 AM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-9" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Modify the component</label>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>4</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">22 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">1:00 AM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex hover-actions-trigger py-3 border-translucent border-top border-bottom">
                    <input class="form-check-input form-check-input-todolist flex-shrink-0 my-1 me-2 form-check-input-undefined" type="checkbox" id="checkbox-todo-10" data-event-propagation-prevent="data-event-propagation-prevent" />
                    <div class="row justify-content-between align-items-md-center btn-reveal-trigger border-translucent gx-0 flex-1 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="mb-1 mb-md-0 d-flex align-items-center lh-1">
                          <label class="form-check-label mb-1 mb-md-0 mb-xl-1 mb-xxl-0 fs-8 me-2 line-clamp-1 text-body cursor-pointer">Delete overlapping tasks and articles</label><span class="badge badge-phoenix ms-auto fs-10 badge-phoenix-secondary">CLOSE</span>
                        </div>
                      </div>
                      <div class="col-12 col-md-auto col-xl-12 col-xxl-auto">
                        <div class="d-flex lh-1 align-items-center"><a class="text-body-tertiary fw-bold fs-10 me-2" href="#!"><span class="fas fa-paperclip me-1"></span>2</a>
                          <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 me-xl-2 me-xxl-3 mb-0">25 Nov, 2021</p>
                          <div class="hover-md-hide hover-xl-show hover-xxl-hide">
                            <p class="text-body-tertiary fs-10 fw-bold mb-md-0 mb-0 ps-md-3 ps-xl-0 ps-xxl-3 border-start-md border-xl-0 border-start-xxl">1:00 AM</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-none d-md-block d-xl-none d-xxl-block end-0 position-absolute" style="top: 23%;" data-event-propagation-prevent="data-event-propagation-prevent">
                      <div class="hover-actions end-0" data-event-propagation-prevent="data-event-propagation-prevent">
                        <button class="btn btn-phoenix-secondary btn-icon me-1 fs-10 text-body px-0 me-1" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-edit"></span></button>
                        <button class="btn btn-phoenix-secondary btn-icon fs-10 text-danger px-0" data-event-propagation-prevent="data-event-propagation-prevent"><span class="fas fa-trash"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content bg-body overflow-hidden">
                        <div class="modal-header justify-content-between px-6 py-5 pe-sm-5 px-md-6 dark__bg-gray-1100">
                          <h3 class="text-body-highlight fw-bolder mb-0">Designing the Dungeon Blueprint</h3>
                          <button class="btn btn-phoenix-secondary btn-icon btn-icon-xl flex-shrink-0" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fa-solid fa-xmark"></span></button>
                        </div>
                        <div class="modal-body bg-body-highlight px-6 py-0">
                          <div class="row gx-14">
                            <div class="col-12 col-lg-7 border-end-lg">
                              <div class="py-6">
                                <div class="mb-7">
                                  <div class="d-flex align-items-center mb-3">
                                    <h4 class="text-body me-3">Description</h4><a class="btn btn-link text-decoration-none p-0" href="#!"><span class="fa-solid fa-pen"></span></a>
                                  </div>
                                  <p class="text-body-highlight mb-0">The female circus horse-rider is a recurring subject in Chagall’s work. In 1926 the art dealer Ambroise Vollard invited Chagall to make a project based on the circus. They visited Paris’s historic Cirque d’Hiver Bouglione together; Vollard lent Chagall his private box seats. Chagall completed 19 gouaches Chagall’s work. In 1926 the art dealer Ambroise Vollard invited Chagall to make a project based on the circus.</p>
                                </div>
                                <div class="mb-7">
                                  <h4 class="mb-3">Subtasks</h4>
                                  <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                      <input class="subtask-checkbox form-check-input form-check-line-through mt-0 me-3" type="checkbox" id="subtaskundefined1" />
                                      <label class="form-check-label mb-0 fs-8" for="subtaskundefined1">Study Dragons</label>
                                    </div>
                                    <div class="hover-actions end-0">
                                      <button class="btn btn-sm me-1 fs-10 text-body-tertiary px-0 me-3"><span class="fa-solid fa-pencil"></span></button>
                                      <button class="btn btn-sm text-body-tertiary px-0"><span class="fa-solid fa-xmark fs-8"></span></button>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                      <input class="subtask-checkbox form-check-input form-check-line-through mt-0 me-3" type="checkbox" id="subtaskundefined2" />
                                      <label class="form-check-label mb-0 fs-8" for="subtaskundefined2">Procrastinate a bit</label>
                                    </div>
                                    <div class="hover-actions end-0">
                                      <button class="btn btn-sm me-1 fs-10 text-body-tertiary px-0 me-3"><span class="fa-solid fa-pencil"></span></button>
                                      <button class="btn btn-sm text-body-tertiary px-0"><span class="fa-solid fa-xmark fs-8"></span></button>
                                    </div>
                                  </div>
                                  <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top border-bottom mb-3">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                      <input class="subtask-checkbox form-check-input form-check-line-through mt-0 me-3" type="checkbox" id="subtaskundefined3" />
                                      <label class="form-check-label mb-0 fs-8" for="subtaskundefined3">Staring at the notebook for 5 mins</label>
                                    </div>
                                    <div class="hover-actions end-0">
                                      <button class="btn btn-sm me-1 fs-10 text-body-tertiary px-0 me-3"><span class="fa-solid fa-pencil"></span></button>
                                      <button class="btn btn-sm text-body-tertiary px-0"><span class="fa-solid fa-xmark fs-8"></span></button>
                                    </div>
                                  </div><a class="fw-bold fs-9" href="#!"><span class="fas fa-plus me-1"></span>Add subtask</a>
                                </div>
                                <div class="mb-3">
                                  <div>
                                    <h4 class="mb-3">Files</h4>
                                  </div>
                                  <div class="border-top px-0 pt-4 pb-3">
                                    <div class="me-n3">
                                      <div class="d-flex flex-between-center">
                                        <div class="d-flex mb-1"><span class="fa-solid fa-image me-2 text-body-tertiary fs-9"></span>
                                          <p class="text-body-highlight mb-0 lh-1">Silly_sight_1.png</p>
                                        </div>
                                        <div class="btn-reveal-trigger">
                                          <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                                          <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                                        </div>
                                      </div>
                                      <div class="d-flex fs-9 text-body-tertiary mb-2 flex-wrap"><span>768 kb</span><span class="text-body-quaternary mx-1">| </span><a href="#!">Shantinan Mekalan </a><span class="text-body-quaternary mx-1">| </span><span class="text-nowrap">21st Dec, 12:56 PM</span></div><img class="rounded-2" src="../assets/img/generic/40.png" alt="" style="width:230px" />
                                    </div>
                                  </div>
                                  <div class="border-top px-0 pt-4 pb-3">
                                    <div class="me-n3">
                                      <div class="d-flex flex-between-center">
                                        <div>
                                          <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-image me-2 fs-9 text-body-tertiary"></span>
                                            <p class="text-body-highlight mb-0 lh-1">All_images.zip</p>
                                          </div>
                                          <div class="d-flex fs-9 text-body-tertiary mb-0 flex-wrap"><span>12.8 mb</span><span class="text-body-quaternary mx-1">| </span><a href="#!">Yves Tanguy </a><span class="text-body-quaternary mx-1">| </span><span class="text-nowrap">19th Dec, 08:56 PM</span></div>
                                        </div>
                                        <div class="btn-reveal-trigger">
                                          <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                                          <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="border-top px-0 pt-4 pb-3 border-bottom">
                                    <div class="me-n3">
                                      <div class="d-flex flex-between-center">
                                        <div>
                                          <div class="d-flex align-items-center mb-1 flex-wrap"><span class="fa-solid fa-file-lines me-2 fs-9 text-body-tertiary"></span>
                                            <p class="text-body-highlight mb-0 lh-1">Project.txt</p>
                                          </div>
                                          <div class="d-flex fs-9 text-body-tertiary mb-0 flex-wrap"><span>123 kb</span><span class="text-body-quaternary mx-1">| </span><a href="#!">Shantinan Mekalan </a><span class="text-body-quaternary mx-1">| </span><span class="text-nowrap">12th Dec, 12:56 PM</span></div>
                                        </div>
                                        <div class="btn-reveal-trigger">
                                          <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>
                                          <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a><a class="dropdown-item" href="#!">Download</a><a class="dropdown-item" href="#!">Report abuse</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mt-3">
                                    <label class="btn btn-link p-0" for="customFile"><span class="fas fa-plus me-1"></span>Add file(s)</label>
                                    <input class="d-none" id="customFile" type="file" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-lg-5">
                              <div class="py-6">
                                <h4 class="mb-4 text-body-emphasis">Others Information</h4>
                                <h5 class="text-body-highlight mb-2">Status</h5>
                                <select class="form-select mb-4" aria-label="Default select example">
                                  <option selected="">Select</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                                <h5 class="text-body-highlight mb-2">Due Date</h5>
                                <div class="flatpickr-input-container mb-4">
                                  <input class="form-control datetimepicker ps-6" type="text" placeholder="Set the due date" data-options='{"disableMobile":true}' /><span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                                </div>
                                <h5 class="text-body-highlight mb-2">Reminder</h5>
                                <div class="flatpickr-input-container mb-4">
                                  <input class="form-control datetimepicker ps-6" type="text" placeholder="Reminder" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true,"static":true}' /><span class="uil uil-bell-school flatpickr-icon text-body-tertiary"></span>
                                </div>
                                <h5 class="text-body-highlight mb-2">Tag</h5>
                                <div class="choices-select-container mb-6">
                                  <select class="form-select" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select organizer...</option>
                                    <option>Massachusetts Institute of Technology</option>
                                    <option>University of Chicago</option>
                                    <option>GSAS Open Labs At Harvard</option>
                                    <option>California Institute of Technology</option>
                                  </select><span class="uil uil-tag-alt choices-icon text-body-tertiary" style="top: 26%;"></span>
                                </div>
                                <div class="text-end mb-9">
                                  <button class="btn btn-phoenix-danger">Delete Task</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer border-0"><a class="fw-bold fs-9 mt-4" href="#!"><span class="fas fa-plus me-1"></span>Add new task</a></div>
              </div>
            </div> --}}
            {{-- <div class="col-12 col-xl-6 col-xxl-5">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title mb-1">
                    <h3 class="text-body-emphasis">Activity</h3>
                  </div>
                  <p class="text-body-tertiary mb-4">Recent activity across all projects</p>
                  <div class="timeline-vertical timeline-with-details">
                    <div class="timeline-item position-relative">
                      <div class="row g-md-3">
                        <div class="col-12 col-md-auto d-flex">
                          <div class="timeline-item-date order-1 order-md-0 me-md-4">
                            <p class="fs-10 fw-semibold text-body-tertiary text-opacity-85 text-end">01 DEC, 2023<br class="d-none d-md-block" /> 10:30 AM</p>
                          </div>
                          <div class="timeline-item-bar position-md-relative me-3 me-md-0">
                            <div class="icon-item icon-item-sm rounded-7 shadow-none bg-primary-subtle"><span class="fa-solid fa-chess text-primary-dark fs-10"></span></div><span class="timeline-bar border-end border-dashed"></span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="timeline-item-content ps-6 ps-md-3">
                            <h5 class="fs-9 lh-sm">Phoenix Template: Unleashing Creative Possibilities</h5>
                            <p class="fs-9">by <a class="fw-semibold" href="#!">Shantinon Mekalan</a></p>
                            <p class="fs-9 text-body-secondary mb-5">Discover limitless creativity with the Phoenix template! Our latest update offers an array of innovative features and design options.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item position-relative">
                      <div class="row g-md-3">
                        <div class="col-12 col-md-auto d-flex">
                          <div class="timeline-item-date order-1 order-md-0 me-md-4">
                            <p class="fs-10 fw-semibold text-body-tertiary text-opacity-85 text-end">05 DEC, 2023<br class="d-none d-md-block" /> 12:30 AM</p>
                          </div>
                          <div class="timeline-item-bar position-md-relative me-3 me-md-0">
                            <div class="icon-item icon-item-sm rounded-7 shadow-none bg-primary-subtle"><span class="fa-solid fa-dove text-primary-dark fs-10"></span></div><span class="timeline-bar border-end border-dashed"></span>
                          </div>
                        </div>
                        <div class="col">
                          <div class="timeline-item-content ps-6 ps-md-3">
                            <h5 class="fs-9 lh-sm">Empower Your Digital Presence: The Phoenix Template Unveiled</h5>
                            <p class="fs-9">by <a class="fw-semibold" href="#!">Bookworm22</a></p>
                            <p class="fs-9 text-body-secondary mb-5">Unveiling the Phoenix template, a game-changer for your digital presence. With its powerful features and sleek design,</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="timeline-item position-relative">
                      <div class="row g-md-3">
                        <div class="col-12 col-md-auto d-flex">
                          <div class="timeline-item-date order-1 order-md-0 me-md-4">
                            <p class="fs-10 fw-semibold text-body-tertiary text-opacity-85 text-end">15 DEC, 2023<br class="d-none d-md-block" /> 2:30 AM</p>
                          </div>
                          <div class="timeline-item-bar position-md-relative me-3 me-md-0">
                            <div class="icon-item icon-item-sm rounded-7 shadow-none bg-primary-subtle"><span class="fa-solid fa-dungeon text-primary-dark fs-10"></span></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="timeline-item-content ps-6 ps-md-3">
                            <h5 class="fs-9 lh-sm">Phoenix Template: Simplified Design, Maximum Impact</h5>
                            <p class="fs-9">by <a class="fw-semibold" href="#!">Sharuka Nijibum</a></p>
                            <p class="fs-9 text-body-secondary mb-0">Introducing the Phoenix template, where simplified design meets maximum impact. Elevate your digital presence with its sleek and intuitive features.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
@endsection

<script>

  

</script>
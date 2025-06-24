@extends('layout.layout')
@section('content')
<div class="content">
        {{-- <nav class="mb-3" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </nav> --}}
        <div class="row gx-6 gy-3 mb-4 align-items-center">
          <div class="col-auto">
            <h2 class="mb-0">Tasks<span class="fw-normal text-body-tertiary ms-3">(32)</span></h2>
          </div>
          <div class="col-auto"><a class="btn btn-primary px-5" href="../../apps/project-management/create-new.html"><i class="fa-solid fa-plus me-2"></i>Add new project</a></div>
        </div>
        <div class="row justify-content-between align-items-end mb-4 g-3">
          {{-- <div class="col-12 col-sm-auto">
            <ul class="nav nav-links mx-n2">
              <li class="nav-item"><a class="nav-link px-2 py-1 active" aria-current="page" href="#"><span>All</span><span class="text-body-tertiary fw-semibold">(32)</span></a></li>
              <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Ongoing</span><span class="text-body-tertiary fw-semibold">(14)</span></a></li>
              <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Cancelled</span><span class="text-body-tertiary fw-semibold">(2)</span></a></li>
              <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Finished</span><span class="text-body-tertiary fw-semibold">(14)</span></a></li>
              <li class="nav-item"><a class="nav-link px-2 py-1" href="#"><span>Postponed</span><span class="text-body-tertiary fw-semibold">(2)</span></a></li>
            </ul>
          </div> --}}
          {{-- <div class="col-12 col-sm-auto">
            <div class="d-flex align-items-center">
              <div class="search-box me-3">
                <form class="position-relative">
                  <input class="form-control search-input search" type="search" placeholder="Search projects" aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>

                </form>
              </div><a class="btn btn-phoenix-primary px-3 me-1" href="../../apps/project-management/project-list-view.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="List view"><span class="fa-solid fa-list fs-10"></span></a><a class="btn btn-phoenix-primary px-3 me-1" href="../../apps/project-management/project-board-view.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Board view">
                <svg width="9" height="9" viewbox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 0.5C0 0.223857 0.223858 0 0.5 0H1.83333C2.10948 0 2.33333 0.223858 2.33333 0.5V1.83333C2.33333 2.10948 2.10948 2.33333 1.83333 2.33333H0.5C0.223857 2.33333 0 2.10948 0 1.83333V0.5Z" fill="currentColor"></path>
                  <path d="M3.33333 0.5C3.33333 0.223857 3.55719 0 3.83333 0H5.16667C5.44281 0 5.66667 0.223858 5.66667 0.5V1.83333C5.66667 2.10948 5.44281 2.33333 5.16667 2.33333H3.83333C3.55719 2.33333 3.33333 2.10948 3.33333 1.83333V0.5Z" fill="currentColor"></path>
                  <path d="M6.66667 0.5C6.66667 0.223857 6.89052 0 7.16667 0H8.5C8.77614 0 9 0.223858 9 0.5V1.83333C9 2.10948 8.77614 2.33333 8.5 2.33333H7.16667C6.89052 2.33333 6.66667 2.10948 6.66667 1.83333V0.5Z" fill="currentColor"></path>
                  <path d="M0 3.83333C0 3.55719 0.223858 3.33333 0.5 3.33333H1.83333C2.10948 3.33333 2.33333 3.55719 2.33333 3.83333V5.16667C2.33333 5.44281 2.10948 5.66667 1.83333 5.66667H0.5C0.223857 5.66667 0 5.44281 0 5.16667V3.83333Z" fill="currentColor"></path>
                  <path d="M3.33333 3.83333C3.33333 3.55719 3.55719 3.33333 3.83333 3.33333H5.16667C5.44281 3.33333 5.66667 3.55719 5.66667 3.83333V5.16667C5.66667 5.44281 5.44281 5.66667 5.16667 5.66667H3.83333C3.55719 5.66667 3.33333 5.44281 3.33333 5.16667V3.83333Z" fill="currentColor"></path>
                  <path d="M6.66667 3.83333C6.66667 3.55719 6.89052 3.33333 7.16667 3.33333H8.5C8.77614 3.33333 9 3.55719 9 3.83333V5.16667C9 5.44281 8.77614 5.66667 8.5 5.66667H7.16667C6.89052 5.66667 6.66667 5.44281 6.66667 5.16667V3.83333Z" fill="currentColor"></path>
                  <path d="M0 7.16667C0 6.89052 0.223858 6.66667 0.5 6.66667H1.83333C2.10948 6.66667 2.33333 6.89052 2.33333 7.16667V8.5C2.33333 8.77614 2.10948 9 1.83333 9H0.5C0.223857 9 0 8.77614 0 8.5V7.16667Z" fill="currentColor"></path>
                  <path d="M3.33333 7.16667C3.33333 6.89052 3.55719 6.66667 3.83333 6.66667H5.16667C5.44281 6.66667 5.66667 6.89052 5.66667 7.16667V8.5C5.66667 8.77614 5.44281 9 5.16667 9H3.83333C3.55719 9 3.33333 8.77614 3.33333 8.5V7.16667Z" fill="currentColor"></path>
                  <path d="M6.66667 7.16667C6.66667 6.89052 6.89052 6.66667 7.16667 6.66667H8.5C8.77614 6.66667 9 6.89052 9 7.16667V8.5C9 8.77614 8.77614 9 8.5 9H7.16667C6.89052 9 6.66667 8.77614 6.66667 8.5V7.16667Z" fill="currentColor"></path>
                </svg></a><a class="btn btn-phoenix-primary px-3 border-0 text-body" href="../../apps/project-management/project-card-view.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Card view">
                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 0.5C0 0.223858 0.223858 0 0.5 0H3.5C3.77614 0 4 0.223858 4 0.5V3.5C4 3.77614 3.77614 4 3.5 4H0.5C0.223858 4 0 3.77614 0 3.5V0.5Z" fill="currentColor"></path>
                  <path d="M0 5.5C0 5.22386 0.223858 5 0.5 5H3.5C3.77614 5 4 5.22386 4 5.5V8.5C4 8.77614 3.77614 9 3.5 9H0.5C0.223858 9 0 8.77614 0 8.5V5.5Z" fill="currentColor"></path>
                  <path d="M5 0.5C5 0.223858 5.22386 0 5.5 0H8.5C8.77614 0 9 0.223858 9 0.5V3.5C9 3.77614 8.77614 4 8.5 4H5.5C5.22386 4 5 3.77614 5 3.5V0.5Z" fill="currentColor"></path>
                  <path d="M5 5.5C5 5.22386 5.22386 5 5.5 5H8.5C8.77614 5 9 5.22386 9 5.5V8.5C9 8.77614 8.77614 9 8.5 9H5.5C5.22386 9 5 8.77614 5 8.5V5.5Z" fill="currentColor"></path>
                </svg></a>
            </div>
          </div> --}}
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 row-cols-xxl-4 g-3 mb-9">
          @foreach ($tasks as $task)
          <div class="col">
            <div class="card h-100 hover-actions-trigger">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <h4 class="mb-2 line-clamp-1 lh-sm flex-1 me-5">{{ $task->task_name }}</h4>
                  <div class="hover-actions top-0 end-0 mt-4 me-4">
                    <button class="btn btn-primary btn-icon flex-shrink-0" data-bs-toggle="modal" data-bs-target="#projectsCardViewModal{{ $task->id }}"><span class="fa-solid fa-chevron-right"></span></button>
                  </div>
                </div><span class="badge badge-phoenix fs-10 mb-4 badge-phoenix-success">{{ $task->status->status_name }}</span>
                {{-- <div class="d-flex align-items-center mb-2"><span class="fa-solid fa-user me-2 text-body-tertiary fs-9 fw-extra-bold"></span>
                  <p class="fw-bold mb-0 text-truncate lh-1">Client : <span class="fw-semibold text-primary ms-1"> Gusteau’s Restaurant</span></p>
                </div>
                <div class="d-flex align-items-center mb-4"><span class="fa-solid fa-credit-card me-2 text-body-tertiary fs-9 fw-extra-bold"></span>
                  <p class="fw-bold mb-0 lh-1">Budget : <span class="ms-1 text-body-emphasis">8,742$</span></p>
                </div> --}}
                <div class="d-flex justify-content-between text-body-tertiary fw-semibold">
                  <p class="mb-2"> Progress</p>
                  <p class="mb-2 text-body-emphasis">0%</p>
                </div>
                <div class="progress bg-success-subtle">
                  <div class="progress-bar rounded bg-success" role="progressbar" aria-label="Success example" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0 fw-bold fs-9">Started :<span class="fw-semibold text-body-tertiary text-opactity-85 ms-1">{{ $task->created_at->format('dS M Y') }}</span></p>
                </div>
                <div class="d-flex align-items-center mt-2">
                  <p class="mb-0 fw-bold fs-9">Deadline : <span class="fw-semibold text-body-tertiary text-opactity-85 ms-1">{{ \Carbon\Carbon::parse($task->due_date)->format('dS M Y') }}</span></p>
                </div>
                <div class="d-flex d-lg-block d-xl-flex justify-content-between align-items-center mt-3">
                  <div class="avatar-group">
                    @foreach ($task->assignTasks as $assignee)
                    <a class="dropdown-toggle dropdown-caret-none d-inline-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                      <div class="avatar avatar-m  rounded-circle">
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
                      
                      <div class="p-3 d-flex justify-content-between">
                        {{-- <a class="btn btn-link p-0 text-decoration-none" href="#!">Details </a> --}}
                        <a class="btn btn-link p-0 text-decoration-none text-danger" href="#!">Unassign </a></div>
                    </div>
                    @include('tasks.details')
                    @endforeach
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        {{ $tasks->links('pagination::bootstrap-5') }}
        
       
      </div>
@endsection
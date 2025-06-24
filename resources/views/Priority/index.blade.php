@extends('layout.layout')
@section('content')
<div class="content">
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Priority</h2>
        </div>
      </div>
      <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
        {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-body-tertiary fw-semibold"></span></a></li> --}}
        {{-- <li class="nav-item"><a class="nav-link" href="#"><span>Published </span><span class="text-body-tertiary fw-semibold">(70348)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>Drafts </span><span class="text-body-tertiary fw-semibold">(17)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><span>On discount </span><span class="text-body-tertiary fw-semibold">(810)</span></a></li> --}}
      </ul>
      
      <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="d-flex flex-wrap gap-3">
            
            <div class="ms-xxl-auto">
              <button type="button" data-bs-toggle="modal" data-bs-target="#verticallyCentered" class="btn btn-primary">
                <span class="fas fa-plus me-2"></span>Add Priority</button>
            </div>
          </div>
        </div>
        @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        <div class="modal fade" id="verticallyCentered" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticallyCenteredModalLabel">Add Priority</h5>
                    <button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="{{ route('priority.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="priority_name" class="form-label">Priority Name</label>
                            <input type="text" class="form-control" id="priority_name" name="priority_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="priority_color" class="form-label">Priority Color</label>
                            <input type="color" class="form-control form-control-color" id="color" name="color" title="Choose your color" required>
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
        {{-- <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1"> --}}
            <div class="card"> 
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Priority List</h5>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-outline-secondary ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                                <span class="fas fa-filter me-1"></span>Filter
                            </button>
                            <div class="collapse mt-2" id="filterCollapse">
                                <form method="GET" action="{{ route('priority.index') }}" class="d-flex align-items-center gap-2">
                                    <input type="text" name="filter_name" class="form-control" placeholder="Priority Name" value="{{ request('filter_name') }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                                    <a href="{{ route('priority.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a>
                                </form>
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table fs-9 mb-0">
                        <thead>
                            <tr>
                            {{-- <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                <div class="form-check mb-0 fs-8">
                                <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                                </div>
                            </th> --}}
                            <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Priority Name</th>
                            <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Priority Color</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">Published by</th>
                            <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="products-table-body">
                            @if(count($priorities) > 0)
                                @foreach($priorities as $priority)
                                <tr class="position-static">
                                <td class="product align-middle ps-4"><a class="fw-semibold line-clamp-3 mb-0" href="#">{{ $priority->priority_name }}</a></td>
                                <td class="price align-middle white-space-nowrap fw-bold text-body-tertiary ps-4">{{ $priority->color }}</td>
                                <td class="price align-middle white-space-nowrap fw-bold text-body-tertiary ps-4">{{ $priority->user->name }}</td>
                                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                    <div class="btn-reveal-trigger position-static">
                                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#verticallyCenteredupdate{{ $priority->id }}">Update</button>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#verticallyCentereddelete{{ $priority->id }}">Delete</button>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @include('Priority.delete')
                                @include('Priority.update')
                                @endforeach
                                @else
                                <td colspan="4" style="text-align: center;">No Data Available!</td>
                                @endif
                        </tbody>
                        </table>
                        {{ $priorities->links('pagination::bootstrap-5') }}
                </div>
            </div>
      </div>
    </div>
  </div>
@endsection()
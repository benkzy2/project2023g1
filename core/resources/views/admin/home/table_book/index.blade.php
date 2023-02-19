@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">
      @if (request()->path()=='admin/table/resevations/all')
        All
      @elseif (request()->path()=='table/resevations/pending')
      Pending
      @elseif (request()->path()=='admin/table/resevations/accepted')
      Accepted
      @elseif (request()->path()=='admin/table/resevations/rejected')
        Rejcted
      @endif
      Table Resevations
    </h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Table Resevations</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
            @if (request()->path()=='admin/table/resevations/all')
        All
      @elseif (request()->path()=='table/resevations/pending')
      Pending
      @elseif (request()->path()=='admin/table/resevations/accepted')
      Accepted
      @elseif (request()->path()=='admin/table/resevations/rejected')
        Rejcted
      @endif
      Table Resevations
        </a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-title">
                        @if (request()->path()=='admin/table/resevations/all')
                            All
                        @elseif (request()->path()=='table/resevations/pending')
                        Pending
                        @elseif (request()->path()=='admin/table/resevations/accepted')
                        Accepted
                        @elseif (request()->path()=='admin/table/resevations/rejected')
                        Rejcted
                        @endif
                        Table Resevations
                    </div>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-danger float-right btn-md ml-4 d-none bulk-delete" data-href="{{route('admin.bulk.delete.table.resevations')}}"><i class="flaticon-interface-5"></i> Delete</button>
                    <form action="{{url()->current()}}" class="d-inline-block float-right">
                  </form>
              </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($tables) == 0)
                <h3 class="text-center">NO ORDER FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                            <input type="checkbox" class="bulk-check" data-val="all">
                        </th>

                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Person</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tables as $key => $table)
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="{{$table->id}}">
                          </td>
                          <td>{{convertUtf8($table->name)}}</td>
                          <td>{{convertUtf8($table->email)}}</td>
                          <td>{{convertUtf8($table->phone)}}</td>
                          <td>{{convertUtf8($table->date)}}</td>
                          <td>{{convertUtf8($table->time)}}</td>
                          <td>{{convertUtf8($table->person)}}</td>
                          <td>
                            <form id="statusForm{{$table->id}}" class="d-inline-block" action="{{route('admin.status.table.resevations')}}" method="post">
                              @csrf
                              <input type="hidden" name="table_id" value="{{$table->id}}">
                              <select class="form-control
                              @if ($table->status == 1)
                                bg-warning
                              @elseif ($table->status == 2)
                                bg-success
                              @elseif ($table->status == 3)
                                bg-danger
                              @endif
                              " name="status" onchange="document.getElementById('statusForm{{$table->id}}').submit();">
                                <option value="1" {{$table->status == 1 ? 'selected' : ''}}>Pending</option>
                                <option value="2" {{$table->status == 2 ? 'selected' : ''}}>Accepted</option>
                                <option value="3" {{$table->status == 3 ? 'selected' : ''}}>Rejected</option>
                              </select>
                            </form>
                          </td>

                          
                          <td>
                            <form class="deleteform d-inline-block" action="{{route('admin.delete.table.resevations')}}" method="post">
                              @csrf
                              <input type="hidden" name="table_id" value="{{$table->id}}">
                              <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                <span class="btn-label">
                                  <i class="fas fa-trash"></i>
                                </span>
                                Delete
                              </button>
                            </form>
                          </td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="d-inline-block mx-auto">
              {{$tables->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

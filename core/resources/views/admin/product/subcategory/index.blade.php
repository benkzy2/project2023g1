@extends('admin.layout')

@php
$selLang = \App\Models\Language::where('code', request()->input('language'))->first();
@endphp
@if (!empty($selLang) && $selLang->rtl == 1)
    @section('styles')
        <style>
            form:not(.modal-form) input,
            form:not(.modal-form) textarea,
            form:not(.modal-form) select,
            select[name='language'] {
                direction: rtl;
            }

            form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }

        </style>
    @endsection
@endif

@section('content')
    <div class="page-header">
        <h4 class="page-title">Item subcategories</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Items Management</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Category</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">subcategories</div>
                        </div>
                        <div class="col-lg-3">
                            @if (!empty($langs))
                                <select name="language" class="form-control"
                                    onchange="window.location='{{ url()->current() . '?language=' }}'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    @foreach ($langs as $lang)
                                        <option value="{{ $lang->code }}"
                                            {{ $lang->code == request()->input('language') ? 'selected' : '' }}>
                                            {{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                data-target="#createModal"><i class="fas fa-plus"></i> Add Sub Category</a>
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                data-href="{{ route('admin.pcategory.bulk.delete') }}"><i
                                    class="flaticon-interface-5"></i>
                                Delete</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($psubcategories) == 0)
                                <h3 class="text-center">NO PRODUCT Sub CATEGORY FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Featured</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($psubcategories as $key => $subcategory)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="{{ $subcategory->id }}">
                                                    </td>
                                                    <td>{{ convertUtf8($subcategory->name) }}</td>
                                                    <td>{{ convertUtf8($subcategory->category->name ?? '') }}</td>
                                                    <td>
                                                        @if ($subcategory->status == 1)
                                                            <h2 class="d-inline-block"><span
                                                                    class="badge badge-success">Active</span></h2>
                                                        @else
                                                            <h2 class="d-inline-block"><span
                                                                    class="badge badge-danger">Deactive</span></h2>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form id="featureForm{{$subcategory->id}}" action="{{route('admin.subcategory.feature')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="subcategory_id" value="{{$subcategory->id}}">
                                                            <select name="feature" id="" class="form-control-sm text-white
                                                              @if($subcategory->is_feature == 1)
                                                              bg-success
                                                              @elseif ($subcategory->is_feature == 0)
                                                              bg-danger
                                                              @endif
                                                            " onchange="document.getElementById('featureForm{{$subcategory->id}}').submit();">
                                                                <option value="1" {{$subcategory->is_feature == 1 ? 'selected' : ''}}>Yes</option>
                                                                <option value="0" {{$subcategory->is_feature == 0 ? 'selected' : ''}}>No</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm editbtn"
                                                            href="{{ route('admin.subcategory.edit', $subcategory->id) . '?language=' . request()->input('language') }}">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            Edit
                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="{{ route('admin.subcategory.delete') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="subcategory_id"
                                                                value="{{ $subcategory->id }}">
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
                            {{ $psubcategories->appends(['language' => request()->input('language')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create Service Category Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajaxForm" class="modal-form" action="{{ route('admin.subcategory.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Language **</label>
                            <select name="language_id" class="form-control">
                                <option value="" selected disabled>Select a language</option>
                                @foreach ($langs as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Categories **</label>
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>Select a Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <p id="errcategory_id" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Name **</label>
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter name">
                            <p id="errname" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Status **</label>
                            <select class="form-control ltr" name="status">
                                <option value="" selected disabled>Select a status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <p id="errstatus" class="mb-0 text-danger em"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

@endsection

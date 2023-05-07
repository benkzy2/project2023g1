@extends('admin.layout')

@if (!empty($data->language) && $data->language->rtl == 1)
    @section('styles')
        <style>
            form input,
            form textarea,
            form select {
                direction: rtl;
            }

            form .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }

        </style>
    @endsection
@endif

@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Item</h4>
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
                <a href="#">Edit Item</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Edit Item</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                        href="{{ route('admin.product.index') . '?language=' . request()->input('language') }}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        Back
                    </a>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">

                            {{-- Slider images upload start --}}
                            <div class="px-2">
                                <label for="" class="mb-2"><strong>Slider Images **</strong></label>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped" id="imgtable">

                                        </table>
                                    </div>
                                </div>
                                <form action="{{ route('admin.product.sliderupdate') }}" id="my-dropzone"
                                    enctype="multipart/formdata" class="dropzone">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <p class="em text-danger mb-0" id="errslider_images"></p>
                            </div>
                            {{-- Slider images upload end --}}


                            <form id="ajaxForm" class="" action="{{ route('admin.product.update') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $data->id }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <label for="image"><strong>Featured Image</strong></label>
                                            </div>
                                            <div class="col-md-12 showImage mb-3">
                                                <img src="{{ $data->feature_image? asset('assets/front/img/product/featured/' . $data->feature_image): asset('assets/admin/img/noimage.jpg') }}"
                                                    alt="..." class="img-thumbnail">
                                            </div>
                                            <input type="file" name="feature_image" id="image" class="form-control image">
                                            <p id="errfeature_image" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="sliders"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Status **</label>
                                            <select class="form-control ltr" name="status">
                                                <option value="" selected disabled>Select a status</option>
                                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Show</option>
                                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Hide</option>
                                            </select>
                                            <p id="errstatus" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Title **</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter title"
                                                value="{{ $data->title }}">
                                            <p id="errtitle" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="category">Category **</label>
                                            <select class="form-control categoryData" name="category_id" id="category">
                                                <option value="" selected disabled>Select a category</option>
                                                @foreach ($categories as $categroy)
                                                    <option value="{{ $categroy->id }}"
                                                        {{ $data->category_id == $categroy->id ? 'selected' : '' }}>
                                                        {{ $categroy->name }}</option>
                                                @endforeach
                                            </select>
                                            <p id="errcategory_id" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="category">Sub Category</label>
                                            <select class="form-control subcategoryData" name="subcategory_id"
                                                id="subcategoryData">
                                                <option value="" selected>Select Subcategory</option>
                                                @foreach ($subCategories as $sub)
                                                    <option value="{{ $sub->id }}"
                                                        <?= $sub->id == $data->subcategory_id ? 'selected' : '' ?>>
                                                        {{ $sub->name }}</option>
                                                @endforeach
                                            </select>
                                            <p id="errsubcategory_id" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for=""> Current Price ({{ $be->base_currency_text }})**</label>
                                            <input type="number" class="form-control ltr" name="current_price"
                                                value="{{ $data->current_price }}" placeholder="Enter Current Price">
                                            <p id="errcurrent_price" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Previous Price ({{ $be->base_currency_text }})</label>
                                            <input type="number" class="form-control ltr" name="previous_price"
                                                value="{{ $data->previous_price }}" placeholder="Enter Previous Price">
                                            <p id="errprevious_price" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="summary">Summary **</label>
                                            <textarea name="summary" id="summary" class="form-control" rows="4"
                                                placeholder="Enter Product Summary">{{ $data->summary }}</textarea>
                                            <p id="errsubmission_date" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Description **</label>
                                            <textarea class="form-control summernote" name="description" placeholder="Enter description"
                                                data-height="300">{{ replaceBaseUrl($data->description) }}</textarea>
                                            <p id="errdescription" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div id="app">
                                    {{-- Variations Start --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="d-block mb-2">Variations</label>
                                                <button class="btn btn-primary" @click="addVariant">Add Variant</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row variant-box" v-for="(variant, index) in variants" :key="variant.uniqid">
                                        <div class="col-lg-11 p-0">
                                            <div class="form-group">
                                                <label for="">Variant Name</label>
                                                <input name="variant_names[]" type="text" class="form-control"
                                                    placeholder="eg. Small, Regular, Big etc..." v-model="variant.name">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-danger text-white btn-sm mt-5" @click="removeVariant(index)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn-success btn-sm" @click="addOption(index)">Add Option</button>
                                        </div>

                                        <div v-for="(option, oindex) in variant.options" :key="option.uniqid">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Option</label>
                                                        <input :name="variant.name + '_names' + '[]'" type="text"
                                                            class="form-control"
                                                            placeholder="eg. Small, Regular, Big etc..."
                                                            v-model="option.name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="">Price ({{ $be->base_currency_text }})</label>
                                                        <input :name="variant.name + '_prices' + '[]'" type="text"
                                                            class="form-control ltr" autocomplete="off"
                                                            v-model="option.price">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <button class="btn btn-danger btn-sm text-white mt-5 rmvbtn"
                                                        @click="removeOption(index, oindex)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Variations End --}}

                                    {{-- Addons Start --}}

                                    <div class="row mt-2">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="d-block mb-2">Add Ons</label>
                                                <button class="btn btn-primary addbtn" @click="addAddOn">Add Add On</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" v-for="(addon, index) in addons" :key="addon.uniqid">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Add On Name</label>
                                                <input name="addon_names[]" type="text" class="form-control"
                                                    placeholder="eg. Cheese, Patty, Sauce etc..." v-model="addon.name">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="">Additional Price ({{ $be->base_currency_text }})</label>
                                                <input name="addon_prices[]" type="text" class="form-control ltr"
                                                    autocomplete="off" v-model="addon.price">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-danger text-white mt-5 rmvbtn"
                                                @click="removeAddOn(index)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    {{-- Addons End --}}
                                </div>
                                {{-- <div id="app">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="d-block mb-2">Variations</label>
                                                <button class="btn btn-primary addbtn" @click="addVariant">Add
                                                    Variant</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" v-for="(variant, index) in variants" :key="variant.uniqid">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Variant Name</label>
                                                <input name="variant_names[]" type="text" class="form-control"
                                                    placeholder="eg. Small, Regular, Big etc..." v-model="variant.name">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="">Additional Price ({{ $be->base_currency_text }})</label>
                                                <input name="variant_prices[]" type="text" class="form-control ltr"
                                                    autocomplete="off" v-model="variant.price">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-danger text-white mt-5 rmvbtn"
                                                @click="removeVariant(index)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="d-block mb-2">Add On's</label>
                                                <button class="btn btn-primary addbtn" @click="addAddOn">Add Add On</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row" v-for="(addon, index) in addons" :key="addon.uniqid">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Add On Name</label>
                                                <input name="addon_names[]" type="text" class="form-control"
                                                    placeholder="eg. Cheese, Patty, Sauce etc..." v-model="addon.name">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="">Additional Price ({{ $be->base_currency_text }})</label>
                                                <input name="addon_prices[]" type="text" class="form-control ltr"
                                                    autocomplete="off" v-model="addon.price">
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="btn btn-danger text-white mt-5 rmvbtn"
                                                @click="removeAddOn(index)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('variables')
    <script>
        "use strict";
        var storeUrl = "{{ route('admin.product.sliderstore') }}";
        var removeUrl = "{{ route('admin.product.sliderrmv') }}";
        var rmvdbUrl = "{{ route('admin.product.sliderrmv') }}";
        var loadImgs = "{{ route('admin.product.images', $data->id) }}";
    </script>
@endsection

@section('vuescripts')
    <script>
        let app = new Vue({
            el: '#app',
            data() {
                return {
                    variants: [],
                    addons: []
                }
            },
            methods: {
                uniqid() {
                    let n = Math.floor(Math.random() * 11);
                    let k = Math.floor(Math.random() * 1000000);
                    let m = String.fromCharCode(n) + k;

                    return m;
                },
                addVariant() {
                    this.variants.push({
                        uniqid: this.uniqid(),
                        name: '',
                        price: 0,
                        options: []
                    });
                },
                addOption(vKey) {
                    let n = Math.floor(Math.random() * 11);
                    let k = Math.floor(Math.random() * 1000000);
                    let m = String.fromCharCode(n) + k;
                    console.log(this.variants[vKey]);
                    this.variants[vKey].options.push({
                        uniqid: m,
                        name: '',
                        price: 0
                    });
                },
                removeVariant(index) {
                    this.variants.splice(index, 1);
                },
                removeOption(vIndex, oIndex) {
                    this.variants[vIndex].options.splice(oIndex, 1);
                },
                addAddOn() {
                    this.addons.push({
                        uniqid: this.uniqid(),
                        name: '',
                        price: 0
                    });
                },
                removeAddOn(index) {
                    this.addons.splice(index, 1);
                }
            },
            created() {
                $.get("{{ route('admin.product.variants', $data->id) }}", (datas) => {

                  console.log(datas)

                    for (let i = 0; i < datas.length; i++) {
                        this.variants.push(datas[i]); 
                    }
                });

                $.get("{{ route('admin.product.addons', $data->id) }}", (datas) => {
                    for (let i = 0; i < datas.length; i++) {
                        this.addons.push(datas[i]);
                    }
                });
            }
        });
    </script>
@endsection

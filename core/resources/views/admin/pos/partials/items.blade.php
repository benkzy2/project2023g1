<div class="row no-gutters">
    <div class="col-lg-12">
        <div class="pos-items">
            <div class="card">
                <div class="card-body px-2 pb-1">
                    <div class="row no-gutters">
                    @foreach ($pcats as $pcat)
                        @if ($pcat->products()->count() > 0)
                            @foreach ($pcat->products as $product)
                            <div class="col-lg-3 px-2 mb-3 pos-item" data-title="{{$product->title}}">
                                <a href="#" class="single-pos-item d-block cart-link" data-product="{{$product}}" data-href="{{route('admin.add.cart',$product->id)}}">
                                    <img class="lazy" src="{{asset('assets/admin/img/placeholde-150.png')}}" data-src="{{asset('assets/front/img/product/featured/' . $product->feature_image)}}" alt="" width="100%">
                                    <h6 class="text-white mt-2 text-center">{{$product->title}}</h6>
                                </a>
                            </div>
                            @endforeach
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

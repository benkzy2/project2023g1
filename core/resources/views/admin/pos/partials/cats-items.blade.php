<div class="row no-gutters">
    <div class="col-lg-4 pr-3">
        <div class="pos-categories">
            <div class="card">
                <div class="card-body">
                    <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                        @foreach ($pcats as $pcat)
                        <a class="nav-link {{$loop->first ? 'active' : ''}}" id="pcat{{$pcat->id}}-tab" data-toggle="pill" href="#pcat{{$pcat->id}}" role="tab" aria-controls="pcat{{$pcat->id}}" aria-selected="false">{{$pcat->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-8">
        <div class="pos-items">
            <div class="card">
                <div class="card-body px-2 pb-1">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($pcats as $pcat)
                        <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="pcat{{$pcat->id}}" role="tabpanel" aria-labelledby="pcat{{$pcat->id}}-tab">
                            @if ($pcat->products()->count() > 0)
                            <div class="row no-gutters">
                                @foreach ($pcat->products as $product)
                                <div class="col-lg-4 px-2 mb-3">
                                    <a href="#" class="single-pos-item d-block cart-link" data-product="{{$product}}" data-href="{{route('admin.add.cart',$product->id)}}">
                                        <img class="lazy" src="{{asset('assets/admin/img/placeholde-150.png')}}" data-src="{{asset('assets/front/img/product/featured/' . $product->feature_image)}}" alt="" width="100%">
                                        <h6 class="text-white mt-2 text-center">{{$product->title}}</h6>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

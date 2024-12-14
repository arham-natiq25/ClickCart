@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Product Details
@endsection

@section('content')
        <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>products</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PRODUCT PAGE START
    ==============================-->
    <section id="wsus__product_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_page_bammer">
                        @if ($productpage_banner_section->banner_one->status == 1)
                        <a href="{{$productpage_banner_section->banner_one->banner_url}}">
                            <img class="img-gluid" src="{{asset($productpage_banner_section->banner_one->banner_image)}}" alt="">
                        </a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="wsus__sidebar_filter ">
                        <p>filter</p>
                        <span class="wsus__filter_icon">
                            <i class="far fa-minus" id="minus"></i>
                            <i class="far fa-plus" id="plus"></i>
                        </span>
                    </div>
                    <div class="wsus__product_sidebar" id="sticky_sidebar">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        All Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($categories as $category)

                                            <li><a href="{{route('products.index', ['category' => $category->slug])}}">{{$category->name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Price
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="price_ranger">
                                            <form action="{{url()->current()}}">
                                                @foreach (request()->query() as $key => $value)
                                                @if($key != 'range')
                                                    <input type="hidden" name="{{$key}}" value="{{$value}}" />
                                                @endif
                                                @endforeach
                                                <input type="hidden" id="slider_range" name="range" class="flat-slider" />
                                                <button type="submit" class="common_btn">filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        brand
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($brands  as $brand)

                                            <li><a href="{{route('products.index', ['brand' => $brand->slug])}}">{{$brand->name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-xl-12 d-none d-md-block mt-md-4 mt-lg-0">
                            <div class="wsus__product_topbar">
                                <div class="wsus__product_topbar_left">
                                    <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link {{session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'active' : ''}} {{!session()->has('product_list_style') ? 'active' : ''}} list-view" data-id="grid" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            <i class="fas fa-th"></i>
                                        </button>
                                        <button class="nav-link list-view {{session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'active' : ''}}" data-id="list" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade {{session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'show active' : ''}} {{!session()->has('product_list_style') ? 'show active' : ''}}" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="wsus__product_item">
                                            <span class="wsus__new">{{productType($product->product_type)}}</span>
                                            @if(checkDiscount($product))
                                                <span class="wsus__minus">-{{calculateDiscountPercent($product->price, $product->offer_price)}}%</span>
                                            @endif
                                            <a class="wsus__pro_link" href="{{route('product-detail', $product->slug)}}">
                                                <img src="{{asset($product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                                                <img src="
                                                @if(isset($product->productImageGalleries[0]->image))
                                                    {{asset($product->productImageGalleries[0]->image)}}
                                                @else
                                                    {{asset($product->thumb_image)}}
                                                @endif
                                                " alt="product" class="img-fluid w-100 img_2" />
                                            </a>
                                            <ul class="wsus__single_pro_icon">
                                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="show_product_modal" data-id="{{ $product->id }}"><i class="far fa-eye"></i></a></li>
                                                <li><a href="#" class="add_to_wishlist" data-id="{{$product->id}}"><i class="far fa-heart"></i></a></li>
                                                {{-- <li><a href="#"><i class="far fa-random"></i></a> --}}
                                            </ul>
                                            <div class="wsus__product_details">
                                                <a class="wsus__category" href="#">{{$product->category->name}} </a>
                                                <p class="wsus__pro_rating">

                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $product->ratings_avg_review)
                                                        <i class="fas fa-star"></i>
                                                        @else
                                                        <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor

                                                    <span>({{$product->reviews_count}} review)</span>
                                                </p>
                                                <a class="wsus__pro_name" href="{{route('product-detail', $product->slug)}}">{{limitText($product->name, 53)}}</a>
                                                @if(checkDiscount($product))
                                                    <p class="wsus__price">{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></p>
                                                @else
                                                    <p class="wsus__price">{{$settings->currency_icon}}{{$product->price}}</p>
                                                @endif
                                                <form class="shopping-cart-form">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    @foreach ($product->variants as $variant)
                                                    @if ($variant->status != 0)
                                                        <select class="d-none" name="variants_items[]">
                                                            @foreach ($variant->productVariantItems as $variantItem)
                                                                @if ($variantItem->status != 0)
                                                                    <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                    @endforeach
                                                    <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                                    <button class="add_cart" type="submit">add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                            <div class="tab-pane fade {{session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'show active' : ''}}" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-xl-12">
                                        <div class="wsus__product_item wsus__list_view">
                                            <span class="wsus__new">{{productType($product->product_type)}}</span>
                                            @if(checkDiscount($product))
                                            <span class="wsus__minus">-{{calculateDiscountPercent($product->price, $product->offer_price)}}%</span>
                                            @endif

                                            <a class="wsus__pro_link" href="{{route('product-detail', $product->slug)}}">
                                                <img src="{{asset($product->thumb_image)}}" alt="product"
                                                    class="img-fluid w-100 img_1" />

                                                <img src="
                                                @if(isset($product->productImageGalleries[0]->image))
                                                    {{asset($product->productImageGalleries[0]->image)}}
                                                @else
                                                    {{asset($product->thumb_image)}}
                                                @endif
                                                " alt="product" class="img-fluid w-100 img_2" />
                                            </a>
                                            <div class="wsus__product_details">
                                                <a class="wsus__category" href="#">{{@$product->category->name}} </a>
                                                <p class="wsus__pro_rating">


                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $product->reviews_avg_rating)
                                                        <i class="fas fa-star"></i>
                                                        @else
                                                        <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor

                                                    <span>({{$product->reviews_count}} review)</span>
                                                </p>
                                                <a class="wsus__pro_name" href="{{route('product-detail', $product->slug)}}">{{$product->name}}</a>

                                                @if(checkDiscount($product))
                                                <p class="wsus__price">{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></p>
                                                @else
                                                    <p class="wsus__price">{{$settings->currency_icon}}{{$product->price}}</p>
                                                @endif

                                                <p class="list_description">{{$product->short_description}}</p>
                                                <ul class="wsus__single_pro_icon">

                                                    <form class="shopping-cart-form">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                        @foreach ($product->variants as $variant)
                                                        @if ($variant->status != 0)
                                                            <select class="d-none" name="variants_items[]">
                                                                @foreach ($variant->productVariantItems as $variantItem)
                                                                    @if ($variantItem->status != 0)
                                                                        <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                        @endforeach
                                                        <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                                        <button class="add_cart_two mr-2" type="submit">add to cart</button>
                                                    </form>
                                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                                    {{-- <li><a href="#"><i class="far fa-random"></i></a> --}}
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($products) === 0)
                    <div class="text-center mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2>Product not found!</h2>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-xl-12 text-center">
                    <div class="mt-5" style="display:flex; justify-content:center">
                        @if ($products->hasPages())
                            {{$products->withQueryString()->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PRODUCT PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.list-view').on('click', function(){
                let style = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{route('change-product-list-view')}}",
                    data: {style: style},
                    success: function(data){

                    }
                })
            })
        })
        @php
            if(request()->has('range') && request()->range !=  ''){
                $price = explode(';', request()->range);
                $from = $price[0];
                $to = $price[1];
            }else {
                $from = 0;
                $to = 8000;
            }
        @endphp
        jQuery(function () {
        jQuery("#slider_range").flatslider({
            min: 0, max: 10000,
            step: 100,
            values: [{{$from}}, {{$to}}],
            range: true,
            einheit: '{{$settings->currency_icon}}'
        });
    });
    </script>
@endpush

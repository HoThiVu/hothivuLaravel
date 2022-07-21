@extends('layout.master')
@section('content')
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer">
                    <div class="banner">

                        <ul>
                            @foreach ($slide as $sl)
                                <!-- THE FIRST SLIDE -->
                                <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                    style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                        data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                        data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                        data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                        data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                        data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                            data-bgposition="center center" data-bgrepeat="no-repeat"
                                            data-lazydone="undefined" src="/source/image/slide/{{ $sl->image }}"
                                            data-src="/source/image/slide/{{ $sl->image }}"
                                            style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/{{ $sl->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">

        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-product-list">
                            <h4>New Product</h4>

                            <div class="beta-product-details">
                                <p class="pull-left">438 styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach ($new_products as $new)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$new ->id)}}"><img src="/source/image/product/{{ $new->image }}"
                                                        alt="" style="widht:15r3m;height:15rem"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $new->name }}</p>
                                                <p class="single-item-price">

                                                    <span>{{ $new->unit_price }}</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{ route('addtocart', $new->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"  href="{{route('chitietsanpham',$new ->id)}}">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-product-list -->
                        <nav aria-label="Page navigation">
                            {{ $new_products->links('pagination::bootstrap-4') }}

                        </nav>
                        <div class="beta-product-list">
                            <h4>Top Product</h4>
                            <div class="beta-product-details">
                                <p class="pull-left">438 styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($top_products as $top)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{route('chitietsanpham',$top ->id)}}"><img src="/source/image/product/{{ $top->image }}"
                                                        alt="" style="widht:15r3m;height:15rem"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $top->name }}</p>
                                                <p class="single-item-price">
                                                    @if ($top->promotion_price == 0)
                                                        <span class="flash-sale">{{ number_format($top->unit_price) }}</span>
                                                    @else 
                                                    <span class="flash-del">{{ number_format($top->unit_price) }}</span>
                                                    <span class="flash-sale">{{ number_format($top->promotion_price) }}</span>
                                                @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{ route('addtocart', $new->id) }}">
                                                    <i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"  href="{{route('chitietsanpham',$top ->id)}}">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation">
                                {{ $top_products->links('pagination::bootstrap-4') }}

                            </nav>

                        </div> <!-- .beta-product-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection

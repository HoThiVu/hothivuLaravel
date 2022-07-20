@extends('layout.master')
@section('content')
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
                                                <a href="product.html"><img src="source/image/product/{{ $new->image }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $new->name }}</p>
                                                <p class="single-item-price">

                                                    <span>{{ $new->unit_price }}</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                    href="{{ route('addtocart',$new->id) }}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="product.html">Details <i
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
                                                <a href="product.html"><img src="source/image/product/{{ $top->image }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $top->name }}</p>
                                                <p class="single-item-price">

                                                    <span>{{ $top->unit_price }}</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{ route('addtocart',$new->id) }}">
                                                    <i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="product.html">Details <i
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

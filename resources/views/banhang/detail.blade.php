@extends('layout.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{ $chitietSP->name }}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{ route('index') }}">Home</a>/<span>Thông tin chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-4">
                            <img src="/source/image/product/{{ $chitietSP->image }}" alt=""
                                style="widht:10rem;height:10rem">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{ $chitietSP->name }}</p>
                                <p class="single-item-price">
                                    @if ($chitietSP->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($chitietSP->unit_price) }}</span>
                                    @else
                                        <span class="flash-del">{{ number_format($chitietSP->unit_price) }}</span>
                                        <span class="flash-sale">{{ number_format($chitietSP->promotion_price) }}</span>
                                    @endif
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{ $chitietSP->discription }}</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Options:</p>
                            <div class="single-item-options">
                                <select class="wc-select" name="size">
                                    <option>Size</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <select class="wc-select" name="color">
                                    <option>Color</option>
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                </select>
                                <select class="wc-select" name="color">
                                    <option>Qty</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Description</a></li>
                            <li><a href="#tab-comment">comment</a></li>
                        </ul>
                        <div class="panel" id="tab-description">
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
                                est, qui dolorem ipsum quia dolor sit amet.</p>
                            <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                dolore magnam aliquam
                                quaerat voluptatem. Ut enim ad
                                minima veniam, quis nostrum
                                exercitationem ullam corporis
                                suscipit laboriosam, nisi ut
                                aliquid ex ea commodi
                                consequaturuis autem vel eum
                                iure reprehenderit qui in ea
                                voluptate velit es quam nihil
                                molestiae consequr, vel illum
                                qui dolorem eum fugiat quo
                                voluptas nulla pariatur?
                            </p>
                        </div>
                        <div class="panel" id="tab-comment">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <form method="post" action="/comment/{{ $chitietSP->id }}">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment" required></textarea>
                                                </div>
                                                <div>
                                                    @if (isset($comments))
                                                        @foreach ($comments as $comment)
                                                            <p class="border-bottom">
                                                            <p><b class="pull-left">{{ $comment->username }}</b></p><br />
                                                            <p>{{ $comment->comment }}</p>
                                                            </p>
                                                        @endforeach
                                                    @else
                                                        <p>Chưa có bình luận nào cả!</p>
                                                    @endif
                                                </div>
                                                <button type="submit" class="beta-btn primary">Bình luận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>


            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection

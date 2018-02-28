@extends('themes.'.$theme->slug.'.index')

@section('title')
    {{ $product->title }} - CIM Italian Style
@endsection

@section('description')
    {{ $settings->desc }}
@endsection

@section('keywords')
    {{ $settings->keywords }}
@endsection

@section('content')

    <section id=hero-img>
        <div class="container-fluid hero-img-container">
            @if($collection->heroImage == null)
                <img class="desktop-image" src="{{ url('uploads/collections/day-collections.jpg') }}" alt="{{ $collection->title }}">
            @else
                <img class="desktop-image" src="{{ url($collection->heroImage) }}" alt="{{ $collection->title }}">
            @endif
            @if(false)
            <div class=collections-header>
                <h5>{{ $collection->title }}</h5>
            </div>
            @endif
        </div>
    </section>
    <section>
        <div class=container>
            <div class="row product">
                <div class="news-open col-md-12">
                    <div class="product-heading col-md-12">
                        <div class=row>
                            <div class=col-md-4>
                                <h5>{{ $collection->title }}</h5>
                            </div>
                            <div class="col-md-8 sakrij">
                                @if(count($products)>0)
                                    <div class="owl-carousel owl-theme">
                                        <div class=owl-carousel2>
                                            @foreach($products as $p)
                                                <div class=item2> <a href="{{ \App\Product::getProductLink($p) }}">{{ $p->title }}</a> </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(count($photos)>0)
                        @php $link = \App\Product::getProductLink($product); @endphp
                        <div class="product-image-wrapper col-md-12">
                            <div class="owl-carousel owl-theme">
                                @foreach($photos as $photo)
                                <div class="item col-md-12">
                                    <div class=img-wrapper>
                                        <a href="">
                                            <img class=img-fluid src="{{ url($photo->file_path) }}" alt="{{ $product->title }}">
                                        </a>
                                    </div>
                                    <div class=text-holder>
                                        <h5>
                                            <a href="">{{ $product->title }}</a>
                                        </h5>
                                        <p class=subtitle2>
                                            @if(isset($parent))
                                                {{ $parent->title }} / {{ $collection->title }}
                                            @else
                                                {{ $collection->title }}
                                            @endif
                                        </p>
                                        <p>{{ $product->short }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class=product-social>
                    @if(false)
                    <div class=news-open-social-heading>
                        <a href="">
                            <h5>share</h5>
                        </a>
                    </div>
                    @endif
                    <div class=news-open-social-icons>
                        <ul>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer_scripts')
    <script>
        $(function() {
            $(".owl-carousel").owlCarousel({
                nav: !0,
                navText: ["<img src='{{ url($theme->slug . "/img/arrow-white-left.png") }}'>", "<img src='{{ url($theme->slug . "/img/arrow-white-right.png") }}'>"],
                margin: 30,
                loop: !0,
                autoplay: !0,
                items: 1
            });
            $(".owl-carousel2").owlCarousel({
                nav: !0,
                navText: ["<img src='{{ url($theme->slug . "/img/arrow-white-left.png") }}' class='na-levo'>", "<img src='{{ url($theme->slug."/img/arrow-white-right.png") }}' class='na-desno'>"],
                margin: 30,
                loop: !0,
                autoplay: !0,
                items: 4
            });
        });
    </script>
@endsection
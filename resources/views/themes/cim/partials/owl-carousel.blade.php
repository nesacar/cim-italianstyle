@if(count($posts)>0)
<div class="owl-carousel owl-theme">
    @foreach($posts as $post)
        @php $link = \App\Post::getPostLink($post); @endphp
        <div class="item col-md-12">
            <div class=img-wrapper>
                <a href="{{ $link }}">
                    {!! HTML::Image($post->image, $post->title, array('class' => 'img-fluid')) !!}
                </a>
            </div>
            <div class=text-holder>
                <h5>
                    <a href="{{ $link }}">{{ $post->title }}</a>
                </h5>
                <p class=date>
                    <span>{{ \Carbon\Carbon::parse($post->publish_at)->format('d M Y') }}</span>
                </p>
                <p>{{ $post->short }}</p>
            </div>
        </div>
    @endforeach
</div>
@endif
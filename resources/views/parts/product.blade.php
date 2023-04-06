<div class="product">
    <div class="thumb">
        <a href="{{route('product.details',$product->slug)}}" class="image">
            <img src="{{asset('upload_photos/product-photos/')}}/{{$product->product_thumbnail_photo}}" alt="Product" />
        </a>
        <span class="badges">
            @if (App\Models\Inventorie::where('product_id',$product->id)->sum('quantity') == 0)
                <span class="sale">stoke out</span>
            @endif
            @if ($product->discounted_price != $product->regular_price)
                <span class="sale">
                    {{100-round(($product->discounted_price / $product->regular_price)*100,2)}}%
                </span>
            @endif
            @if (today()->diffindays($product->created_at) < 6)
                <span class="new">New</span>
            @endif
        </span>
        <div class="actions">
            <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                    class="pe-7s-like"></i></a>
            <a href="#" class="action quickview" data-link-action="quickview"
                title="Quick view" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
            <a href="compare.html" class="action compare" title="Compare"><i
                    class="pe-7s-refresh-2"></i></a>
        </div>
        <a href="{{route('product.details',$product->slug)}}" title="Add To Cart" class=" add-to-cart">Add
            To Cart</a>
    </div>
    <div class="content">
        @php
            $reviwe=App\Models\Review::where('product_id',$product->id)->get();
           if($reviwe->average('rating')){
                $average_rating=$reviwe->average('rating');
           }else {
                $average_rating=0;
           }
           $final_start=((100*$average_rating)/5);
        @endphp
        <span class="ratings">
            <span class="rating-wrap">
                <span class="star" style="width: {{$final_start}}%"></span>
            </span>
            <span class="rating-num">( {{$reviwe->count()}} Review )</span>
        </span>
        <h5 class="title"><a href="single-product.html">{{$product->product_name}}</a>
        </h5>
        <span class="price">
            <span class="new">${{$product->discounted_price}}</span>
            @if ($product->discounted_price != $product->regular_price)
                <span class="old">${{$product->regular_price}}</span>
            @endif
        </span>
    </div>
</div>

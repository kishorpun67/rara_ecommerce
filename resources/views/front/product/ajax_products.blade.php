
@foreach ($products as $item)
<div class="col col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="product" data-product-id="1">
        <div class="entry-media"> <a href="{{route('product',$item->url)}}"><img src="{{asset($item->main_image)}}" alt="" class="lazyOwl thumb" /> </a>
        <div class="hover">
            <ul class="icons unstyled">
            <li> <a href="{{route('product',$item->url)}}">
                <div class="circle ribbon ribbon-sale">Buy !</div>
                </a> </li>
            </ul>
            <span class="shop_detail">
            <div class="entry-price"> <strong class="price">{{$item->product_price}}</strong> </div>
            <h5 class="entry-title"> <a href="{{route('product',$item->url)}}">{{$item->product_name}}</a> </h5>
            <a href="{{route('product',$item->url)}}" class="btn btn-warning">View Detail</a> <a href="{{route('product',$item->url)}}" class="btn btn-warning"><i class="fa-solid fa-basket-shopping"> </i> Items in your Cart</a> </span> </div>
        </div>
        <div class="entry-main">
        <div class="entry-price"> <strong class="price">{{$item->product_price}}</strong> </div>
        <h5 class="entry-title"> <a href="{{route('product',$item->url)}}">{{$item->product_name}}</a> </h5>
        </div>
    </div>
</div>
@endforeach

@extends('front.layout.layout')
@section('content')

<section id="billboard" class="inner-page catalog-page"> 
    <div class="bg-card"> 
      <div class="bg-card-img-overlay"> </div>
          <div class="card-caption text-white">
           <div class="container">
            <div class="pulse animatable">
              <div class="breadCrumbNav">
                <div class="container breadcrumb-container">
                  <h1 class="breadCrumb_title"> catalogue</h1>
                  <div class="breadcumb-inner">
                    <ul>
                      <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i></li>
                        <li><a href="{{route('all.products')}}"><span>Products</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
    </div>
    
  </section>
  <section class="subpage_section cart_section  my-5">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h1 class="section_title">{{$title}}</h1>
      </heading>
      <div class="product-wrapper my-5">
        <div class="container">
          <div class="row">
          <div class="col-md-3 col-sm-4">
            <aside class="filter_category_sidebar">
                <div class="filter_category_wrapper">
                    <div class="toggle_content">
                      <h2 class="filter-title">All categories</h2>
                      <?php $i=1; ?>
                      @foreach ($categories as $item)
                        @if ($i<=6)
                            @if ($i<=5)
                                <p><a href="{{route('products', $item->url)}}">{{$item->category_name}}</a></p>
                            @else                                
                                <div id="show-more" ><a href="javascript:void(0)">Show more <i class="fa-solid fa-angle-down"></i></a></div>
                            @endif
                        @else
                        @endif
                        <?php $i++; ?>
                      @endforeach
                        <div id="show-more-content"> 
                            <?php $i=1; ?>
                            @foreach ($categories as $item)
                                @if ($i>=6)
                                    <p><a href="{{route('products', $item->url)}}">{{$item->category_name}}</a></p>
                                @endif
                                <?php $i++; ?>

                            @endforeach
                            <div id="show-less"> <a href="javascript:void(0)">Show less <i class="fa-solid fa-angle-up"></i></a></div>
                        </div>
                  </div>
                <div class="filter_category_wrapper">
                  <input type="hidden" name="url" id="url" value="{{$url}}">
                <h2 class="filter-title">Filter</h2>
                <form role="form" class="filter_form" action="#">
                <label class="label_title" for="price-range">Price range:</label>
                <div class="filter_item form-group price_filter">
                  <input type="text" class="form-control" id="min_price" placeholder="Min(Rs.)" size="1" value=""  maxlength="" minlength="1" >
                  <span class="mx-2 separator">to</span>
                  <input type="text" class="form-control" id="max_price" placeholder="Max(Rs.)" size="1" value=""  maxlength="" minlength="1" >
                  <!--  <button type="button" role="button" class="btn btn-go"> Go </button>-->
                  <input type="button" id="price_range" class="btn btn-go" value=" Go">
                </div>
                <div class="filter_item form-group location_filter">
                    <label class="label_title" for="location">Brand:</label>
                    @foreach ($brands as $brand)
                        @if(!empty($brand->brand_name))
                            <input type="checkbox" class="brand" name="brand[]" id="{{$brand->id}}" value="{{$brand->id}}"/><span style="margin-left:4px;"></span>{{$brand->brand_name}} <br>
                        @endif
                    @endforeach
                </div>
                <div class="filter_item form-group negotiable_filter">
                    <label class="label_title" for="price">Pattern:</label>
                    @foreach ($patternArray as $pattern)
                        @if(!empty($pattern->pattern))
                            <input type="checkbox" class="pattern" name="pattern[]" id="{{$pattern->pattern}}" value="{{$pattern->pattern}}"/><span style="margin-left:4px;"></span>{{$pattern->pattern}} <br>
                        @endif
                    @endforeach
                </div>
                <div class="filter_item form-group date_filter">
                    <label class="label_title" for="date">Fabric:</label>
                    @foreach ($fabricArray as $fabric)
                        @if(!empty($fabric->fabric))
                            <input type="checkbox" class="fabric" name="fabric[]" id="{{$fabric->fabric}}" value="{{$fabric->fabric}}"/><span style="margin-left:4px;"></span>{{$fabric->fabric}} <br>
                        @endif
                    @endforeach                
                </div>
                <div class="filter_item form-group type_filter">
                    <label class="label_title" for="room">Sleeve:</label>
                    @foreach ($sleeveArray as $sleeve)
                        @if(!empty($sleeve->sleeve))
                            <input type="checkbox" class="sleeve" name="sleeve[]" id="{{$sleeve->sleeve}}" value="{{$sleeve->sleeve}}"/><span style="margin-left:4px;"></span>{{$sleeve->sleeve}} <br>
                        @endif
                    @endforeach
                </div>
                </form>
                </div>
            </aside>
        </div>
        <div class="col-md-9 col-sm-8">
            <div class="filter_item form-group filter_sort">
              <label class="label_title" for="sort_by">Sort by</label>
              <div class="select_dropdown">
                <select class="form-control" name="sort-type" id="sort">
                    <option value="product_lastest"> Latest Products </option>
                    <option value="product_name_price_low_high">Price: Low to High</option>
                    <option value="product_name_price_high_low">Price: High to Low</option>
                    <option value="product_name_a_z"> Name: Ascending</option>
                    <option value="product_name_z_a"> Name: Descending</option>
                </select>
              </div>
            </div>
            <div class="row" id="ajax_products">
                    @include('front.product.ajax_products')
            </div>
        </div>
    </div>
    </div>
    </div>
  </section>
@endsection
@if(count($product_four) > 0)
    @foreach ($product_four as $product)
    <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="rounded position-relative fruite-item">
            <div class="fruite-img">
                <img src="{{$product->image}}" class="img-fluid w-100 rounded-top" alt="" style="height: 300px;">
            </div>
            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->subCategory?->name ?? 'N/A' }}</div>
            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                <h4>{{$product->title}}</h4>
                <p class="short-text">
                    {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                    <span class="full-text d-none">
                        {{ $product->description }}
                    </span>
                    @if(strlen($product->description) > 100)
                    <a href="javascript:void(0)" class="show-more">Show more</a>
                    @endif
                </p>
                <div class="d-flex justify-content-between flex-lg-wrap">
                    <p class="text-dark fs-5 fw-bold mb-0">
                        ₹{{ number_format($product->discount_price) }}
                    </p>
                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="col-12 text-center">
        <p class="text-muted">No product found in this category.</p>
    </div>
@endif


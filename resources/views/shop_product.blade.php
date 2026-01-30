   @if ($products->count() > 0)
    @foreach ($products as $product)
    <div class="col-md-6 col-lg-6 col-xl-4">
        <div class="rounded position-relative fruite-item">
            <div class="fruite-img">
                <img src="{{asset($product->image)}}" class="img-fluid w-100 rounded-top" alt="" style="height: 350px; width: 306px;">
            </div>
            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->subCategory->name}}</div>
            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
            {{ \Illuminate\Support\Str::limit($product->title, 5)}}
            <h4>{{$product->title}}</h4>
            <p class="short-text">
            {{ \Illuminate\Support\Str::limit($product->description, 10) }}
            <span class="full-text d-none">
                {{ $product->description }}
            </span>
                <div class="d-flex justify-content-between flex-lg-wrap">
                    <p class="text-dark fs-5 fw-bold mb-0">₹{{ number_format($product->discount_price) }}</p>
                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                </div>
            </div>
        </div>
        </div>
    @endforeach
    @else
        <div class="col-md-6 col-lg-6 col-xl-4">
            <img src="{{asset('no_product_found.png')}}" alt="">
        </div>
    @endif
@php
    // $perpage = 9;
    $currentPage = request()->get('page', 1);
    $offset = ($currentPage - 1) * $perpage;
    $productsOnPage = array_slice($products -> toArray(), $offset, $perpage);
@endphp
<div class="col-12">
    <div class="pagination d-flex justify-content-center mt-5">
        @if($currentPage > 1)
            <a href="?page={{ $currentPage - 1 }}" class="rounded">&laquo;</a>
        @else
            <a href="#" class="rounded">&laquo;</a>
        @endif

        @for ($i = 1; $i <= ceil(count($products) / $perpage); $i++)
                <a href="?page={{ $i }}" class="rounded {{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
        @endfor

        @if($currentPage < ceil(count($products) / $perpage))
            <a href="?page={{ $currentPage + 1 }}" class="rounded">&raquo;</a>
        @else
            <a href="#" class="rounded">&raquo;</a>
        @endif
    </div>
</div>
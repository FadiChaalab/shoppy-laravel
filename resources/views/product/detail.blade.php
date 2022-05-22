<x-layout>
    <div id="layout-wrapper">
        @include('layouts.navbar')
        <section class="page-title"
            style="background-image: url({{asset('storage/images/products/'.$product->image)}}); padding: 120px; background-size: cover; background-position: center;">
            <div class="auto-container">
                <div class="content-box">
                    <div class="content-wrapper text-center">
                        <div class="title text-white">
                            <h1>{{$product->name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-information pt-5 bg-white" style="padding-bottom: 150px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="my-3">Product Information</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>{{$product->description}}</p>
                        @if($product->quantity > 0)
                            <p>
                                <span class="badge badge-success py-2 px-3">In Stock</span>
                            </p>
                        @else
                            <p>
                                <span class="badge badge-danger py-2 px-3">Out of Stock</span>
                            </p>
                        @endif
                        <small class="text-muted mt-3">
                            Last updated {{$product->updated_at->diffForHumans()}}
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="my-3">Product Category</h4>
                        <p class="text-muted">{{$product->category}}</p>
                        <h4 class="my-3">Product Price</h4>
                        <p class="text-muted">${{$product->price}}</p>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{asset('storage/images/products/'.$product->image)}}" alt="" class="img-fluid float-md-right mb-3" style="height: 328px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <form action="{{route('user.product.cart', $product->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{$product->quantity}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.footer')
    </div>
</x-layout>
<x-layout>
    <!-- navbar -->
    <div id="layout-wrapper">
        @include('layouts.navbar')
        @include('layouts.banner')
        <section class="products-section mt-5" id="products">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="my-3">Products</h4>
                    </div>
                </div>
                <div class="row">
                    @if(count($products) == 0)
                    <tr>
                        <td colspan="7" class="text-center">
                            <img src="{{asset('images/no_data.svg')}}" height="124" class="mt-3">
                            <p class="text-muted py-3">No products was found, try later.</p>
                            <a href="{{url('/home/users')}}" class="btn btn-primary">Refresh</a>
                        </td>
                    </tr>
                    @else
                    @foreach ($products as $product)
                    <div class="col-lg-3">
                        <div class="card">
                            <a href="{{route('user.product', $product->id)}}"><img class="card-img-top img-fluid"
                                    src="{{asset('storage/images/products/'.$product->image)}}" alt="Card image cap"
                                    style="height: 225px;"></a>
                            <div class="card-body">
                                <h4 class="card-title mt-0">{{$product->name}}</h4>
                                <p class="card-text">{{$product->description}}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Last updated {{$product->updated_at->diffForHumans()}}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                {{ $products->links() }}
            </div>
        </section>

        <section class="cart-section mt-5 bg-white" id="cart" style="padding: 120px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="my-3">Cart</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Last added</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($carts) == 0)
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <img src="{{asset('images/no_data.svg')}}" height="124" class="mt-3">
                                        <p class="text-muted py-3">No products was found in your cart.</p>
                                    </td>
                                </tr>
                                @else
                                @foreach ($carts as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>${{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>${{$item->total}}</td>
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form action="{{route('user.product.remove', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $carts->links() }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{route('user.cart.checkout')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{Auth::user()->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{Auth::user()->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{Auth::user()->address}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{Auth::user()->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="method">Payment</label>
                                <select name="method" id="method" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="stripe">Stripe</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-section mt-5" id="about" style="padding: 120px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{asset('images/gallery/work-4.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-6">
                        <h4 class="my-3">About Us</h4>
                        <h5 >Welcome To <span id="W_Name1">shoppy.com</span></h5>
                        <p><span id="W_Name2">shoppy.com</span> is a Professional <span id="W_Type1">ecommerce</span>
                            Platform. Here we will provide you only interesting content, which you will like very much.
                            We're dedicated to providing you the best of <span id="W_Type2">ecommerce</span>, with a
                            focus on dependability and <span id="W_Spec">online products</span>. We're working to turn
                            our passion for <span id="W_Type3">ecommerce</span> into a booming <a
                                href="#"
                                style="color:inherit; text-decoration: none;">online website</a>. We hope you enjoy our
                            <span id="W_Type4">ecommerce</span> as much as we enjoy offering them to you.</p>
                        <p>I will keep posting more important posts on my Website for all of you. Please give your
                            support and love.</p>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-section bg-white" id="contact" style="padding: 120px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="my-3">Contact Us</h4>
                        <form action="{{route('user.contact')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" value="{{Auth::user()->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{Auth::user()->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3"
                                    placeholder="Enter your message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send message</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{asset('images/gallery/work-10.jpg')}}" class="img-fluid my-3" alt="">
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.footer')
    </div>
</x-layout>
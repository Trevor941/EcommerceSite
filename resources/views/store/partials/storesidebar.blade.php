          
                    <!-- Side Bar Start -->
                    
                    <div class="col-lg-4 sidebar">
                        @if($categories->count() > 0)
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    @foreach($categories as $category)
                                    <li class="nav-item">
                                        <form class="form-inline" action="{{route('store.products')}}" method="GET" id="searchcategory{{$category->id}}" style="display: inline-block;">
                                            <input type="text" name="category"  value="{{$category->name}}" hidden>
                                            {{-- <input type="text" name="id"  value="{{$category->id}}" hidden> --}}
                                        <a class="nav-link" id="{{$category->id}}" href="javascript:{}" onclick="document.getElementById('searchcategory{{$category->id}}').submit();"><i class="{{$category->fontawesome}}"></i>{{$category->name}}</a>
                                    </form>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        @endif
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                              @foreach ($sliderproducts as $product)
                              <div class="product-item">
                                <div class="product-title">
                                    <a href="#">{{$product->name}}</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="{{route('store.productdetail', $product->id)}}">
                                        <img src="{{asset('images/featuredimg/'.$product->featuredimage)}}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>{{$product->regularprice}}</h3>
                                    <a class="btn" href="{{route('store.productdetail', $product->id)}}"><i class="fa fa-shopping-cart"></i>Buy</a>
                                </div>
                            </div>
                              @endforeach
                            </div>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            @foreach ($alltags as $tag)
                            <a href="#">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Side Bar End -->
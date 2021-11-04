<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Fruits & Vegetables</h1>
                    <p>We provide you all pure products.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">All</button>
                        <button data-filter=".top-featured">Top featured</button>
                        <button data-filter=".best-seller">Best seller</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">

                    </div>
                    <div class="why-text">
                        <h4>Carrot</h4>
                        <h5> ৳7.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="new">New</p>
                        </div>
                        <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">

                    </div>
                    <div class="why-text">
                        <h4>Tomato</h4>
                        <h5> ৳9.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">

                    </div>
                    <div class="why-text">
                        <h4>Grape</h4>
                        <h5> ৳10.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">

                    </div>
                    <div class="why-text">
                        <h4>Papaya</h4>
                        <h5> ৳15.79</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="latest-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <div class="title-all text-left">
                    <h1>Latest products</h1>

                    <p>All you need is here...</p>

                    <form action="{{ url('search') }}" method="get" class="form-inline"
                        style="float:right;padding:10px;">
                        @csrf
                        <input type="search" class="form-center" placeholder="search" name="search">
                        <input type="submit" value="Search" class="btn btn-success">
                    </form>

                </div>

            </div>


            <div class="row">

                @foreach ($data as $product)





                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="blog-box">
                            <div class="blog-img">
                                <img height="600" width="800" class="img-fluid"
                                    src="/productimage/{{ $product->image }}" alt="" />
                            </div>
                            <div class="blog-content">
                                <div class="title-blog">
                                    <a href="">
                                        <h4>{{ $product->title }}</h4>
                                    </a>
                                    <h6>৳{{ $product->price }}</h6>
                                    <p>{{ $product->description }}</p>


                                    <form action="{{url('addcart',$product->id)}}" method="POST" >

                                        @csrf

                                        <input type="number" min="1" value="1" class="form-control" style="width: 100px" name=""><br>


                                        <input style="width: 100px" class="btn btn-primary"  type="submit" value="Add Cart">



                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                @if (method_exists($data, 'links'))

                    <div class="d-flex justify-content-center">

                        {!! $data->links() !!}


                    </div>
                @endif




            </div>
        </div>
    </div>

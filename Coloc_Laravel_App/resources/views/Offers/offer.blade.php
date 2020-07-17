@extends('template')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-6  align-items-stretch" style="margin: 10px;">
                <div class="consultation consul w-100 px-4 px-md-5">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="text-center">
                        <h3 class="mb-4">Add new Offer</h3>
                    </div>
                    <form action="/addOffer" method="POST" class="appointment-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="text" required class="form-control" placeholder="Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="number" required class="form-control" placeholder="Area M²" name="area">
                                </div>
                            </div>
                        </div>
                        <div class ="row">
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="number" required class="form-control" placeholder="Capacity" name="capacity">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="number" required class="form-control" placeholder="price" name="price">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="description" required placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                <input type="file" required name="imgPath"/> 
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <input type="submit" value="Add Offer" class="btn btn-white py-2 px-4">
                                </div>
                            </div>
                        
                    </form>

                   
                </div>

            </div>
            <div class="col-md-5">
            @foreach ($offers as $offer)
                    <div class="story-wrap d-md-flex align-items-center" style="margin-top: 10px;">
                    <img src="{{asset('storage/'.$offer->imgPath)}}" class="img" alt="">
                        <div class="text pl-md-5">
                            <h4>Price : <span>{{$offer->price}} DH</span></h4>
                            <h4>Address : <span>{{$offer->address}} </span></h4>
                            <p>{{$offer->description}}</p>
                            <p><a href="/offer/{{$offer->id}}" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        

    </div>
</section>
@endsection
@extends('template')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb" style="margin-left: 20%;">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">

            <div class="col-md-10">
            @foreach ($offers as $offer)
                    <div class="story-wrap d-md-flex align-items-center" style="margin-top: 10px;">
                    <img src="{{asset('storage/'.$offer->imgPath)}}" class="img" alt="">
                        <div class="text pl-md-5">
                            <h4>Price : <span>{{$offer->price}} DH</span></h4>
                            <h4>Address : <span>{{$offer->address}} </span></h4>
                            <p>{{$offer->description}}</p>
                            <form action="/offer/delete/{{$offer->id}}" method="POST">
                            @csrf
                            <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        

    </div>
</section>
@endsection
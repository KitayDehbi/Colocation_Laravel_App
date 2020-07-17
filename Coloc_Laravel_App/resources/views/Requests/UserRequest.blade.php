@extends('template')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb" style="margin-left: 20%;">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-10">
                @foreach ($requests as $request)
                <div class="story-wrap d-md-flex align-items-center" style="margin-top: 10px;">
                    <div class="text pl-md-5">
                        <h4>Max Budget : <span>{{$request->maxBudget}} DH</span></h4>
                        <p>{{$request->description}}</p>
                        <form action="/request/delete/{{$request->id}}" method="POST">
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
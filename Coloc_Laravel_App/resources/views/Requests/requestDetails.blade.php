@extends('template')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-10" style="margin-left: 10%;">
                <div class="blog-entry align-self-stretch">
                    <div class="story-wrap d-md-flex align-items-center" style="margin-top: 20px;">
                        <div class="text pl-md-5">
                            <h4>MaxBudget  : <span> {{$request->maxBudget}} DH</span></h4>
                            <h4>name : <span> {{$user->name}} </span></h4>
                            <h4>Phone : <span> {{$user->phone}} </span></h4>
                            <h4>Email  : <span> {{$user->email}} </span></h4>
                        </div>
                    </div>
                    <div class="text mt-3">
                        <h3 class="heading">
                            <p>{{$request->description}}</p></h3>
                            @if(Auth::user()->id == $request->user_id)
                            <form action="/request/delete/{{$request->id}}" method="POST">
                            @csrf
                            <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection
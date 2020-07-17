@extends('template')
@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-4  align-items-stretch" style="margin: 10px;">
                <div class="consultation consul w-100 px-4 px-md-5">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="text-center">
                        <h3 class="mb-4">Add new request</h3>
                    </div>
                    <form action="/addRequest" method="POST" class="appointment-form">
                        @csrf

                        <div >
                            <div class="form-group">
                                <input type="number" required class="form-control" placeholder="MaxBudget" name="maxBudget">
                            </div>
                        </div>
                        <div >
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="description" required placeholder="Description"></textarea>
                            </div>
                            
                        </div>
                        <div >
                            <div class="form-group">
                                <input type="submit" value="Add request" class="btn btn-white py-2 px-4">
                            </div>
                        </div>

                    </form>


                </div>

            </div>
            <div class="col-md-5">
                @foreach ($requests as $request)
                <div class="story-wrap d-md-flex align-items-center" style="margin-top: 10px;">
                    <div class="text pl-md-5">
                        <h4>Max Budget : <span>{{$request->maxBudget}} DH</span></h4>
                        <p>{{$request->description}}</p>
                        <p><a href="/request/{{$request->id}}" class="btn btn-primary">Read more</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</section>
@endsection
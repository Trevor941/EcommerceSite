@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 header">
        <h3 class="preview-h">Google Analytics Tracking Code</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{route('google.analytics.store')}}" method="POST">
            @csrf
          <div class="form-group">
              <textarea name="name" id="" cols="30" rows="10" class="form-control">@isset($analytics) {{$analytics->name}} @endisset</textarea>
          </div>
          <div class="form-group text-right">
              <button class="btn btn-primary" type="submit">@isset($analytics) Save Changes @endisset @empty($analytics) Add @endempty</button>
          </div>
        </form>
    </div>
   
</div>
@endsection
@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12 header">
        <h3 class="preview-h">Google Search Console</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{route('google.searchconsole.store')}}" method="POST">
            @csrf
          <div class="form-group">
              <textarea name="name" id="" cols="30" rows="2" class="form-control">@isset($googlesearchconsole) {{$googlesearchconsole->name}} @endisset</textarea>
          </div>
          <div class="form-group text-right">
              <button class="btn btn-primary" type="submit">@isset($googlesearchconsole) Save Changes @endisset @empty($googlesearchconsole) Add @endempty</button>
          </div>
        </form>
    </div>
   
</div>
<style>
    #addproduct{
      padding: 20px;
    background: #fff;
    margin-bottom: 20px;
    }
    .darkerlightbg{
  background: #f8f9fc;
    padding: 10px;
    border-radius: 5px; 
    }
    
</style>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

})
</script>
@endsection
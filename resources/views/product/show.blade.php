@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
    <a class="btn btn-primary" href="{{route('products.index')}}">all product</a>
    <br>

<div class="mb-3">
    <div class="mb-3">
        <label class="form-label">name</label>
        <br>
        <p>{{$product->name}}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">description</label>
        <br>
        <p>{{$product->description}}</p>
    </div>
    <div class="mb-3">
        <label class="form-label">image</label>
        <br>
        <img src="/images/{{$product->image}}">
    </div>

</div>
</div>
</div>
</div>

  @endsection
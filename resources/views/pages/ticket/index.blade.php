@extends('template/base')
@section('content')
<!--page title section-->
<section class="inner_cover parallax-window" data-parallax="scroll" data-image-src="template/img/IMG_9740.JPG">
  <div class="overlay_dark"></div>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12">
        <div class="inner_cover_content">
          <h3>
            registration
          </h3>
        </div>
      </div>
    </div>

    <div class="breadcrumbs">
      <ul>
        <li><a href="/">Home</a> | </li>
        <li><span>Registration</span></li>
      </ul>
    </div>
  </div>
</section>
<!--page title section end-->

<div class="container-fluid">
  <div class="row justify-content-center">
    <h1>Ticket<b>List</b></h1>
  </div>
  <div class="row justify-content-center">

    @foreach ($tickets as $item)
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$item->jenis}} {{$item->kategori}} Run (Sisa : {{$item->kuota}} Slot)</h5>
          <h6 class="card-subtitle mb-2 text-muted">IDR {{$item->harga}}</h6>
          <p class="card-text">{{$item->deskripsi}}</p>
          <form action="{{url('/ticket/'.$item->id)}}" method="get">
            <label for="jumlah">Masukkan Jumlah Tiket</label>
            <input type="number" name="jumlah" max="5" required>
            <button type="submit" class="btn btn-primary">Beli</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
@endsection
@extends('layouts.main')
@section('content')
<style>
.gallery-container{
    padding: 12em;
}
.gallery-title p{
    text-align: center;
    width: 20em;
    margin:0 auto;
    border: 1px solid green;
    font-size: 17px;
    border-radius: 15px;
    padding: 1em;
}
</style>
@php
    $lang = App::getLocale();
@endphp
<section class="feature-area">
        <div class="container-fluid gallery-container">
            <div class="gallery-title">
                <p>Галерея/Gallery</p>
            </div>
            <section class="event-details-area section-gap">
                    <div class="container">
                        <div class="row">
                            @foreach($albums as $album)
                                <div class="col-md-4 event-details-left">
                                    <a style="height: 10em" href="{{ route('gallery.items', [ 'album' => $album]) }}" class="container-img">
                                    <div class="card">
                                        <div class="card-header">
                                                <img src="{{ asset('storage') .'/'. $album->filename}}" alt=""  class="image" style="width: 100%">
                                            </div>
                                            <div class="card-body text-secondary">
                                                {{ $album->{'album_name_'.$lang} }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
        </div>
</section>
@endsection
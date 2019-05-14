@extends('voyager::master')
@section('content')
<div class="container-fluid">
    <div class="side-body padding-top">
        <h1 class="page-title">
            <span class="voyager voyager-build"></span>
            Add Site Menu
        </h1>
        <form action="{{ route('voyager.posts.store') }}" method="post">
            @csrf
            <div class="row form-group">
                <label for=""></label>
                <input type="text" class="form-control" name="title">
            </div>
        </form>
    </div>
</div>

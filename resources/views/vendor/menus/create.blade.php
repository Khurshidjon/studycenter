@extends('voyager::master')
@section('content')
    <div class="container-fluid">
        <div class="side-body padding-top">
            <h1 class="page-title">
                <span class="voyager voyager-build"></span>
                Add Site Menu
            </h1>
            <form action="{{ route('voyager.site-menus.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="menu_name_uz">Menu name uz</label>
                                <input id="menu_name_uz" type="text" name="menu_name_uz" class="form-control" placeholder="Menu name uzb">
                            </div>
                            <div class="col-md-4">
                                <label for="menu_name_ru">Menu name ru</label>
                                <input id="menu_name_ru" type="text" name="menu_name_ru" class="form-control" placeholder="Menu name rus">
                            </div>
                            <div class="col-md-4">
                                <label for="menu_name_en">Menu name en</label>
                                <input id="menu_name_en" type="text" name="menu_name_en" class="form-control" placeholder="Menu name english">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="site_url">Menu url</label>
                        <input id="site_url" type="text" name="site_url" class="form-control" placeholder="Menu url">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="parent_id">Parent menu</label>
                        <select name="parent_id" id="parent_id" class="form-control select2">
                            <option selected disabled>-- select once --</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">
                                    @if(App::getLocale() == 'uz')
                                        {{ $menu->menu_name_uz }}
                                    @elseif(App::getLocale() == 'ru')
                                        {{ $menu->menu_name_ru }}
                                    @elseif(App::getLocale() == 'en')
                                        {{ $menu->menu_name_en }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="position">Position</label>
                        <select name="position" id="position" class="form-control select2">
                            <option selected disabled>-- select once --</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-secondary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection

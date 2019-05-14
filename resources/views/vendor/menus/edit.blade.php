@extends('voyager::master')
@section('content')
    <div class="container-fluid">
        <div class="side-body padding-top">
            <h1 class="page-title">
                <span class="voyager voyager-build"></span>
                Add Site Menu
            </h1>
            <form action="{{ route('voyager.site-menus.update', ['site_menu' => $menu]) }}" method="post" class="bg-white">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="col-md-4">
                            <label for="menu_name_uz">Menu name</label>
                            <input id="menu_name_uz" type="text" name="menu_name_uz" class="form-control" value="{{ old('menu_name_uz',  $menu->menu_name_uz) }}" placeholder="Menu name uzb">
                        </div>
                        <div class="col-md-4">
                            <label for="menu_name_ru">Menu name</label>
                            <input id="menu_name_ru" type="text" name="menu_name_ru" class="form-control" value="{{ old('menu_name_ru',  $menu->menu_name_ru) }}"  placeholder="Menu name rus">
                        </div>
                        <div class="col-md-4">
                            <label for="menu_name_en">Menu name</label>
                            <input id="menu_name_en" type="text" name="menu_name_en" class="form-control" value="{{ old('menu_name_en', $menu->menu_name_en) }}"  placeholder="Menu name english">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="site_url">Menu url</label>
                        <input id="site_url" type="text" name="site_url" class="form-control" value="{{ old('menu_url', $menu->site_url ) }}" placeholder="Menu url">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="parent_id">Parent menu</label>
                        <select name="parent_id" id="parent_id" class="form-control select2">
                            <option selected disabled>-- select once --</option>
                            @foreach($menus as $menucha)
                                <option value="{{ $menucha->id }}" {{ $menucha->id == $menu->parent_id ?'selected':'' }}>
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
                            <option value="1" {{ $menu->position==1?'selected':'' }}>Header</option>
                            <option value="2" {{ $menu->position==2?'selected':'' }}>Footer</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection

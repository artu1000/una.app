@extends('templates.back.full_layout')

@section('content')

    <div id="content" class="schedules">

        <div class="text-content">

            <div class="col-sm-12">

                {{-- Title--}}
                <h2><i class="fa fa-clock-o"></i> {{ trans('schedules.page.title.management') }}</h2>

                <hr>

                <form role="form" method="POST" action="{{ route('schedules.data.update') }}" enctype="multipart/form-data">

                    {{-- crsf token --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    {{-- schedules settings --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('schedules.page.title.data') }}</h3>
                        </div>
                        <div class="panel-body">

                            <label for="input_title">{{ trans('home.page.label.title') }}</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_title"><i class="fa fa-tag"></i></span>
                                    <input id="input_title" class="form-control capitalize-first-letter" name="title" placeholder="{{ trans('home.page.label.title') }}" value="{{ old('title') ? old('title') : $title }}">
                                </div>
                            </div>

                            {{-- background image --}}
                            <label for="input_background_image">{{ trans('schedules.page.label.background_image') }}</label>
                            @if($background_image)
                                <div class="form-group image">
                                    <div class="form-group">
                                        <a class="img-thumbnail" href="{{ ImageManager::imagePath(config('image.schedules.public_path'), $background_image, 'background_image', '767') }}" data-lity>
                                            <img src="{{ ImageManager::imagePath(config('image.schedules.public_path'), $background_image, 'background_image', 'admin') }}">
                                        </a>
                                    </div>
                                </div>
                                <input type="checkbox" id="input_remove_background_image" name="remove_background_image"> <label for="input_remove_background_image" class="quote small_font">{{ trans('schedules.page.label.remove_background_image') }}</label>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <i class="fa fa-picture-o"></i> {{ trans('global.action.browse') }} <input type="file" name="background_image">
                                        </span>
                                    </span>
                                    <input id="input_background_image" type="text" class="form-control" readonly="">
                                </div>
                                <p class="help-block quote">{!! config('settings.info_icon') !!} {{ trans('schedules.page.info.background_image') }}</p>
                            </div>

                            {{-- description --}}
                            <label for="input_description">{{ trans('home.page.label.description') }}</label>
                            <div class="form-group textarea">
                                <textarea id="input_description" class="form-control markdown" name="description" placeholder="{{ trans('home.page.label.description') }}">{{ old('description') ? old('description') : $description }}</textarea>
                                <p class="help-block quote">{!! config('settings.info_icon') !!} {{ trans('schedules.page.info.description') }}</p>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary spin-on-click" type="submit">
                                    <i class="fa fa-floppy-o"></i> {{ trans('global.action.save') }}
                                </button>
                            </div>

                        </div>
                    </div>

                </form>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('schedules.page.title.list') }}</h3>
                    </div>
                    <div class="panel-body table-responsive">

                        @include('templates.back.partials.table-list')

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
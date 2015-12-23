@extends('templates.back.full_layout')

@section('content')

    <div id="content" class="user edit">

        <div class="text-content">

            <div class="col-sm-12">

                {{-- Title--}}
                <h2>
                    <i class="fa fa-user"></i>
                    @if(isset($news))
                        {{ trans('news.page.title.edit') }}
                    @else
                        {{ trans('news.page.title.create') }}
                    @endif
                </h2>

                <hr>

                <form role="form" method="POST" action="@if(isset($news)){{ route('news.update') }} @else{{ route('news.store') }} @endif" enctype="multipart/form-data">

                    {{-- crsf token --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{-- add update inputs if we are in update mode --}}
                    @if(isset($news))
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_id" value="{{ $news->id }}">
                    @endif

                    {{-- personal data --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('news.page.title.data') }}</h3>
                        </div>
                        <div class="panel-body">

                            {{-- image --}}
                            <label for="input_image">{{ trans('news.page.label.image') }}</label>
                            @if(isset($news) && $news->image)
                                <div class="form-group image">
                                    <div class="form-group">
                                        <a class="img-thumbnail" href="{{ $news->imagePath($news->image, 'image', '767') }}" data-lity>
                                            <img src="{{ $news->imagePath($news->image, 'image', 'admin') }}" alt="{{ $news->title }}">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <i class="fa fa-picture-o"></i> {{ trans('global.action.browse') }} <input type="file" name="logo">
                                        </span>
                                    </span>
                                    <input id="input_image" type="text" class="form-control" readonly="">
                                </div>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('news.page.info.image') }}</p>
                            </div>

                            {{-- name --}}
                            <label for="input_title" class="required">{{ trans('news.page.label.title') }}</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_name"><i class="fa fa-font"></i></span>
                                    <input id="input_title" class="form-control capitalize-first-letter" type="text" name="title" value="{{ old('title') ? old('title') : (isset($news) && $news->title ? $news->title : null) }}" placeholder="{{ trans('news.page.label.title') }}">
                                </div>
                            </div>

                            {{-- content --}}
                            <label for="input_content">{{ trans('news.page.label.content') }}</label>
                            <div class="form-group textarea">
                                <textarea id="input_content" class="form-control markdown" name="content" placeholder="{{ trans('news.page.label.content') }}">{{ old('content') ? old('content') : (isset($news) && $news->content ? $news->content : null) }}</textarea>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('news.page.info.content') }}</p>
                            </div>

                        </div>
                    </div>

                    {{-- security data --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('news.page.title.seo') }}</h3>
                        </div>
                        <div class="panel-body">

                            {{-- meta title --}}
                            <label for="input_meta_title">{{ trans('news.page.label.meta_title') }}</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_meta_title"><i class="fa fa-link"></i></span>
                                    <input id="input_meta_title" class="form-control" type="text" name="meta_title" value="{{ old('meta_title') ? old('meta_title') : (isset($news) && $news->meta_title ? $news->meta_title : null) }}" placeholder="{{ trans('news.page.label.meta_title') }}">
                                </div>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('news.page.info.meta_title') }}</p>
                            </div>

                            {{-- meta description --}}
                            <label for="input_meta_description">{{ trans('news.page.label.meta_description') }}</label>
                            <div class="form-group textarea">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_meta_description"><i class="fa fa-code"></i></span>
                                    <textarea id="input_meta_description" class="form-control" name="meta_description" placeholder="{{ trans('news.page.label.meta_description') }}">{{ old('meta_description') ? old('meta_description') : (isset($news) && $news->meta_description ? $news->meta_description : null) }}</textarea>
                                </div>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('news.page.info.meta_description') }}</p>
                            </div>

                            {{-- meta keywords --}}
                            <label for="input_meta_keywords">{{ trans('news.page.label.meta_keywords') }}</label>
                            <div class="form-group textarea">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_meta_keywords"><i class="fa fa-code"></i></span>
                                    <textarea id="input_meta_keywords" class="form-control" name="meta_keywords" placeholder="{{ trans('news.page.label.meta_keywords') }}">{{ old('meta_keywords') ? old('meta_keywords') : (isset($news) && $news->meta_keywords ? $news->meta_keywords : null) }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- release data --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('news.page.title.release') }}</h3>
                        </div>
                        <div class="panel-body">

                            {{-- release date --}}
                            <label for="input_released_at">{{ trans('news.page.label.released_at') }}</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_released_at"><i class="fa fa-birthday-cake"></i></span>
                                    <input id="input_released_at" type='text' class="form-control datetimepicker" name="released_at" value="{{ old('released_at') ? old('released_at') : (isset($news) && $news->released_at ? $news->released_at : \Carbon\Carbon::now()->format('d/m/Y H:i')) }}" placeholder="{{ trans('news.page.label.released_at') }}">
                                </div>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('global.info.datetime.format') }}</p>
                            </div>

                            {{-- activation --}}
                            <label for="input_active">{{ trans('news.page.label.activation') }}</label>
                            <div class="form-group">
                                <div class="input-group swipe-group">
                                    <span class="input-group-addon" for="input_active"><i class="fa fa-power-off"></i></span>
                                <span class="form-control swipe-label" readonly="">
                                    {{ trans('news.page.label.activation_placeholder') }}
                                </span>
                                    <input class="swipe" id="input_active" type="checkbox" name="active"
                                           @if(old('active'))checked @elseif(isset($news) && $news->active)checked @endif>
                                    <label class="swipe-btn" for="input_active"></label>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- submit login --}}
                    @if(isset($news))
                        <button class="btn btn-primary spin-on-click" type="submit">
                            <i class="fa fa-pencil-square"></i> {{ trans('news.page.action.update') }}
                        </button>
                        <a href="{{ route('news.list') }}" class="btn btn-default spin-on-click" title="{{ trans('global.action.back') }}">
                            <i class="fa fa-undo"></i> {{ trans('global.action.back') }}
                        </a>
                    @else
                        <button class="btn btn-success spin-on-click" type="submit">
                            <i class="fa fa-plus-circle"></i> {{ trans('news.page.action.create') }}
                        </button>
                        <a href="{{ route('news.list') }}" class="btn btn-default spin-on-click" title="{{ trans('global.action.cancel') }}">
                            <i class="fa fa-ban"></i> {{ trans('global.action.cancel') }}
                        </a>
                    @endif
                </form>

            </div>
        </div>
    </div>

@endsection
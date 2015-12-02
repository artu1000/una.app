<?php

if (config('settings.breadcrumbs')) {

    // home
    \Breadcrumbs::register('home', function ($breadcrumbs) {
        $breadcrumbs->push('<i class="fa fa-home"></i>', route('dashboard.index'));
    });

    // dashboard
    \Breadcrumbs::register('dashboard.index', function ($breadcrumbs) {
        $breadcrumbs->push('<i class="fa fa-home"></i> ' . trans('breadcrumbs.dashboard.index'), route('dashboard.index'));
    });

    // settings
    \Breadcrumbs::register('settings.index', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push(trans('breadcrumbs.settings.index'), route('settings.index'));
    });

    // permissions
    \Breadcrumbs::register('permissions.index', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push(trans('breadcrumbs.permissions.index'), route('permissions.index'));
    });
    \Breadcrumbs::register('permissions.create', function ($breadcrumbs) {
        $breadcrumbs->parent('permissions.index');
        $breadcrumbs->push(trans('breadcrumbs.permissions.create'), route('permissions.create'));
    });
    \Breadcrumbs::register('permissions.edit', function ($breadcrumbs) {
        $breadcrumbs->parent('permissions.index');
        $breadcrumbs->push(trans('breadcrumbs.permissions.edit'), route('permissions.edit'));
    });

    // users
    \Breadcrumbs::register('users.index', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push(trans('breadcrumbs.users.index'), route('users.index'));
    });
    \Breadcrumbs::register('users.create', function ($breadcrumbs) {
        $breadcrumbs->parent('users.index');
        $breadcrumbs->push(trans('breadcrumbs.users.create'), route('users.create'));
    });
    \Breadcrumbs::register('users.edit', function ($breadcrumbs) {
        $breadcrumbs->parent('users.index');
        $breadcrumbs->push(trans('breadcrumbs.users.edit'), route('users.edit'));
    });

}
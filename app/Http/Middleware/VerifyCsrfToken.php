<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'preview/datasets',
        'table/edit',
        'preview/maps',
        'dataset/sortlist',
        'get/tags',
        'maps/category',
        'maps/file_upload/dataset'
    ];
}

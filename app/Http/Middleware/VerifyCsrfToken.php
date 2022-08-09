<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        '/admin/update-banner-status',
        '/admin/update-brand-status',
        '/admin/update-category-status',
        '/admin/update-product-status',
        '/ajax-upate-cart-quantity',
        '/admin/update-testimonial-status',
        '/admin/update-coupen-status',

    ];
}

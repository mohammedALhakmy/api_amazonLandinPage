<?php

namespace App\Http\Middleware;

use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{

    protected $rootView = 'app';


    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => auth()->check() ? auth()->user() : null,
                'address' => auth()->check() ? Address::where('user_id',auth()->user()->id)->first() : null,
            ],
            'categories' => \App\Models\Category::all(),
            'random_products' => \App\Models\Product::inRandomOrder()->limit(8)->get(),
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
        ];
    }
}

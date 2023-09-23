<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LicenseKey;  
class LicenseKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $licenseKey = $request->input('license_key');

        // Check if the license key exists in the database
        $validLicense = LicenseKey::where('key', $licenseKey)->exists();

        if (!$validLicense) {
            // Redirect or return an error response if the license key is invalid
            return redirect()->route('license.key')->with('error', 'Invalid license key');
        }
        return $next($request);
    }
}

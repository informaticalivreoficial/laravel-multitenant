<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManangerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantFilesystems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check())
            $this->setFileSystemsRoot();
        return $next($request);
    }

    public function setFileSystemsRoot()
    {
        $tenant = app(ManangerTenant::class)->getTenant();
        
        config()->set([
            'filesystems.disks.public.root' => config('filesystems.disks.s3.root') . "/{$tenant->uuid}",
            'filesystems.disks.public.url' => config('filesystems.disks.s3.url') . "/{$tenant->uuid}",
        ]);
    }
}

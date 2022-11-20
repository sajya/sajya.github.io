---
title: Security
description: Token brute force protection.
extends: _layouts.documentation
section: content
---

# Rate Limiting

Laravel includes an easy-to-use rate-limiting abstraction information about it can be found in their [documentation](https://laravel.com/docs/rate-limiting).

----

## Bruteforce

Most likely when using api-token you will want to block them from overshooting. But leave enough limits for real users.
To do this, we can add the following content to the middleware `Http/Middleware/Authenticate.php`:


```php
class Authenticate extends Middleware
{
    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param \Illuminate\Http\Request $request
     * @param array                    $guards
     *
     * @throws \Illuminate\Auth\AuthenticationException
     *
     * @return void
     */
    protected function authenticate($request, array $guards)
    {
        $guardedByApi = in_array('api', $guards, true);
        
        abort_if(
            $guardedByApi && RateLimiter::tooManyAttempts('api', 10),
            429,
            'Too many requests. Retry in '.RateLimiter::availableIn('api').' seconds'
        );

        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        // User is unauthenticated. If the request is guarded by api...
        if ($guardedByApi) {
            RateLimiter::hit('api');
        }

        $this->unauthenticated($request, $guards);
    }
    
    // ...

}
```

This will allow you to set a limit on login attempts and significantly limit token brute-forcing capabilities.
The rate limit will not be affected for authorized users.  

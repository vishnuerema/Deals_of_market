<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next)
   {
           $allowedOrigins = ['http://myroute.xyz', 'http://clarkconcepts.net','http://localhost:8000', 'http://localhost', 'http://localhost:4200','http://localhost:3000','192.168.100.15','http://localhost:8080'];
       $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
       if (in_array($origin, $allowedOrigins)) {
           return $next($request)
               ->header('Access-Control-Allow-Origin', $origin)
               ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
               ->header('Access-Control-Allow-Headers',' Origin, Content-Type, Accept, Authorization, X-Request-With, cache-control,postman-token, token')
               ->header('Access-Control-Allow-Credentials',' true');
       }
       return $next($request);
   }
}

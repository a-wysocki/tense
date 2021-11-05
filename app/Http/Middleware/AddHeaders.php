<?php 
namespace App\Http\Middleware;
use Closure;

class AddHeaders 
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('api_token', env('API_KEY'));

            if(isset($request->token) && $request->token!=env('API_KEY')) {
                
                return response()->json(['error' => 'Błędny token']);
            }
            else {
                return $response;
            }
        }
}
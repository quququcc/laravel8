<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Auth;
use TheSeer\Tokenizer\TokenCollectionException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class ApiAuth extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws ApiException
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!$this->auth->parser()->setRequest($request)->hasToken()) {
                throw new ApiException('无此用户', '400');
            }
            //检查token是否正确
            //$guard = $this->auth->getDefaultDriver();  // 获取当前守护名
            //$token = $this->auth->getToken();  // 获取token
            //$this->auth->parseToken()->authenticate();
            return $next($request);
        } catch (TokenExpiredException $exception) {
            throw new ApiException($exception->getMessage(), '401');
        } catch (TokenInvalidException $exception) {
            throw new ApiException($exception->getMessage(), '402');
        } catch (TokenCollectionException $exception) {
            throw new ApiException($exception->getMessage(), '405');
        } catch (TokenMismatchException $exception) {
            throw new ApiException($exception->getMessage(), '406');
        } catch (JWTException $exception) {
            throw new ApiException($exception->getMessage(), '407');
        }
    }
}

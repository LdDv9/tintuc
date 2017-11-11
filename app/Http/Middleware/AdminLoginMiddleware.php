<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (Auth::check()) {            
            $user = Auth::user();
            if ($user->quyen==1) {
                return $next($request);         
            }else{
                return redirect('admin/dangnhap')->with('error','Tài Khoản Của Bạn Không Phải Quyền Admin');    
            }
            
        }else{
            return redirect('admin/dangnhap')->with('error','Vui Lòng Đăng Nhập');
        }
    }
}

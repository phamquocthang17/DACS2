<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoLogout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            $currentTime = now()->timestamp;

            if ($lastActivity && ($currentTime - $lastActivity > 10)) {
                Auth::logout(); // Đăng xuất người dùng
                session()->forget('lastActivityTime'); // Xóa thời gian đăng nhập
                return redirect('admin/users/login')->with('message', 'Bạn đã bị đăng xuất do không hoạt động.');
            }

            // Cập nhật lại thời gian hoạt động
            session(['lastActivityTime' => $currentTime]);
        }

        return $next($request);
    }
}

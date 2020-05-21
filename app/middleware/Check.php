<?php
declare (strict_types = 1);

namespace app\middleware;

class Check
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        if(!empty(session(config("session.admin_username")))){
             redirect("anns")->send();
        }
        return $next($request);
    }
}

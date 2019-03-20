<?php
/**
 * User: GabrielCHEN
 * Date: 2019/3/20
 * Time: 14:12
 */

namespace App\HttpController\Api;

use EasySwoole\Http\Message\Status;

class User extends AbstractBase
{
    protected $authTime;

    protected function onRequest(?string $action): ?bool
    {
        return parent::onRequest($action); // TODO: Change the autogenerated stub
        $token = $this->request()->getRequestParam('token');
        if ($token == '123') {
            $this->authTime = time();
            return true;
        } else {
            $this->writeJson(Status::CODE_UNAUTHORIZED, null, '权限验证失败');
            return false;
        }
    }

    function info()
    {
        $this->response()->write('auth time is ' . $this->authTime);
    }
}
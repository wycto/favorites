<?php
namespace app\controller;

use app\model\Navigation;
use app\model\User;
use support\Request;
use support\Response;

class NavigationController
{
    /**
    * 首页/列表页只支持get访问 /foo
    * @param Request $request
    * @return \support\Response
    */
    public function index(Request $request)
    {
        return response('hello index');
    }

    function dataList(Request $request){
        $token = $request->header('token');
        if(empty($token)){
            return json(array(
                'code'=>201,
                'msg'=>'token不能为空'.$token
            ));
        }

        $user = User::firstWhere('token',$token);
        if(empty($user)){
            return json(array(
                'code'=>201,
                'msg'=>'token失效或者不存在用户'.$token
            ));
        }

        $list = Navigation::where(["status"=>1,'create_uid'=>0])->get()->toArray();
        $data = array(
            'code'=>200,
            'msg'=>'OK',
            'list'=> arrayToTree($list)
        );
        return json($data);
    }

    function getChildren($pid=0){
        return Navigation::where(['pid'=>$pid])->get();
    }

    function options(Request $request){
        $token = $request->header('token');
        if(empty($token)){
            return json(array(
                'code'=>201,
                'msg'=>'token不能为空'.$token
            ));
        }

        $user = User::firstWhere('token',$token);
        if(empty($user)){
            return json(array(
                'code'=>201,
                'msg'=>'token失效或者不存在用户'.$token
            ));
        }

        $list = Navigation::where(["status"=>1,'create_uid'=>0,'url'=>''])->get(['id AS value','name AS label','pid'])->toArray();
        $data = array(
            'code'=>200,
            'msg'=>'OK',
            'list'=> arrayToTree($list,'value','pid')
        );

        return json($data);
    }

    /**
     * 新增只支持get访问 /foo/create
     * @param Request $request
     * @return \support\Response
     */
    public function create(Request $request)
    {
        return view('navigation/create');
    }
    /**
     * 新增提交只支持post提交 /foo
     * @param Request $request
     * @return \support\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        return response('hello webman');
    }
    /**
     * 获取详情只支持get访问 /foo/{id}
     * @param Request $request
     * @return \support\Response
     */
    public function show(Request $request,$id)
    {
        return response('hello webman');
    }
    /**
     * 编辑获取数据只支持get访问 /foo/{id}/edit
     * @param Request $request
     * @return \support\Response
     */
    public function edit(Request $request,$id)
    {
        return response('hello webman');
    }
    /**
     * 编辑提交只支持PUT提交 /foo/{id}
     * @param Request $request
     * @return \support\Response
     */
    public function update(Request $request,$id)
    {
        $params = $request->all();
        return response('hello webman');
    }
    /**
     * 删除只支持DELETE /foo/{id}
     * @param Request $request
     * @return \support\Response
     */
    public function destroy(Request $request,$id)
    {
        //获取id数组
        $ids = is_array($id) ? $id : (is_string($id) ? explode(',', $id) : func_get_args());
        return response('hello webman');
    }
    /**
     * 恢复软删除只支持PUT /foo/{id}/recovery
     * @param Request $request
     * @return \support\Response
     */
    public function recovery(Request $request,$id)
    {
        //获取id数组
        $ids = is_array($id) ? $id : (is_string($id) ? explode(',', $id) : func_get_args());
        $params = $request->all();
        return response('hello webman');
    }
}
<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    //
    protected $breadcrumb = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->breadcrumb[] = ['url' => \URL::route('admin.user.index'), 'title' => trans('user.list')];
    }

    public function index()
    {
        if (!$this->adminGate('user_show')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        return view('admin.user.index', [
            'page_title' => trans('user.list'),
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if (!$this->adminGate('user_edit')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $this->breadcrumb[] = ['url' => 'javascript:void(0)', 'title' => trans('user.edit')];
        $user = User::find($id);
        return view('admin.user.edit', [
            'page_title' => trans('user.edit'),
            'breadcrumb' => $this->breadcrumb,
            'user' => $user
        ]);
    }

    public function create()
    {
        if (!$this->adminGate('user_new')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $this->breadcrumb[] = ['url' => 'javascript:void(0)', 'title' => trans('user.create')];
        $user = new User();
        return view('admin.user.edit', [
            'page_title' => trans('user.create'),
            'breadcrumb' => $this->breadcrumb,
            'user' => $user
        ]);
    }

    public function del($id)
    {
        if (!$this->adminGate('user_del')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return $this->Msg(trans('user.del_success'), \URL::route('admin.user.index'));
        } else
            return $this->Msg(trans('user.del_fail'), \URL::route('admin.user.index'), 'error');
    }

    public function save(Request $request)
    {
        if (!$this->adminGate(['user_new', 'user_edit'])) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name,' . $request->id . ',user_id',
            'fullname' => 'required',
            'password' => 'alpha_dash|size:6',
        ], [
            'name.required' => '请输入管理员名称',
            'name.unique' => '登陆名已存在，请输入其他用户名',
            'fullname.required' => '请输入其他用户名称',
            'password.alpha_dash' => '只能包含字母和数字，以及破折号和下划线，6个字符以上',
            'password.size' => '6个字符以上',
        ]);

        if ($validator->fails()) {
            return $this->Msg('', null, 'error')->withErrors($validator);
        }
        if ($request->has('id')) {
            $user = User::find($request->id);
        } else {
            $user = new User();
            $user->name = $request->name;
        }

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        if ($request->has('password'))
            $user->password = \Hash::make($request->password);
        $user->save();

        return $this->Msg(trans('user.save_success'), \URL::route('admin.user.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = User::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = User::count();
        $recordsFiltered = User::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}

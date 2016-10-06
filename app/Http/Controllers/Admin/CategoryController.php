<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Leibie;
use Validator;


class CategoryController extends Controller
{

    protected $breadcrumb=[];

    protected $rules = [
        'id' => 'required|between:4,4',
        'leibie' => 'required',
        'ywleibie' => 'required',
    ];

    protected $messages = [
        'id.required' => '请输入4位类别代码',
        'id.between' => '请输入4位类别代码',
        'leibie.required' => '请输入管理员名称',
        'ywleibie.required' => '请输入电子邮件',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->breadcrumb[]=['url'=>\URL::route('admin.cat.index'),'title'=>trans('cat.list')];
    }

    public function index()
    {
        if(!$this->adminGate('category_show')){
            return $this->Msg(trans('basic.no_permission'),'','error');
        }
        return view('admin.cat.index',[
            'page_title'=>trans('cat.list'),
            'breadcrumb'=>$this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate('category_edit')){
            return $this->Msg(trans('basic.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('cat.edit')];
        $cat = Leibie::find($id);
        return view('admin.cat.edit', [
            'page_title'=>trans('cat.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'Leibie' => $cat,
            'cat' => $cat
        ]);
    }

    public function create()
    {
        if(!$this->adminGate('category_new')){
            return $this->Msg(trans('basic.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('cat.create')];
        $cat = new Leibie();
        return view('admin.cat.edit', [
            'page_title'=>trans('cat.create'),
            'breadcrumb'=>$this->breadcrumb,
            'cat' => $cat
        ]);
    }

    public function del($id)
    {
        if(!$this->adminGate('category_del')){
            return $this->Msg(trans('basic.no_permission'),'','error');
        }
        $cat = Leibie::find($id);
        if($cat) {
            $cat->delete();
            return $this->Msg(trans('cat.del_success'),\URL::route('admin.cat.index'));
        }else
            return $this->Msg(trans('cat.del_fail'),\URL::route('admin.cat.index'),'error');
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['category_new','category_edit'])){
            return $this->Msg(trans('basic.no_permission'),'','error');
        }
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('id')) {
            $cat=Leibie::find($request->id);
        } else {
            $cat = new Leibie();
        }

        $cat->leibie = $request->leibie;
        $cat->ywleibie = $request->ywleibie;
        $cat->save();

        return $this->Msg(trans('cat.save_success'),\URL::route('admin.cat.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = Leibie::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Leibie::count();
        $recordsFiltered = Leibie::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}

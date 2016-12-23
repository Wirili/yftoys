<?php

namespace App\Http\Controllers\admin;

use App\models\Baozhuangfs;
use App\models\Leibie;
use App\models\Yangpindw;
use App\models\Yangpinzl;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class GoodsController extends Controller
{
    //R
    protected $breadcrumb = [];

    protected $rules = [
        'id' => 'required',
        'dashu_w' => 'required|numeric',
        'neiheshu_w' => 'required|integer',
        'meijianshu_w' => 'required|integer',
        'ypchang' => 'required|numeric',
        'ypkuan' => 'required|numeric',
        'ypgao' => 'required|numeric',
        'ggchang_w' => 'required|numeric',
        'ggkuan_w' => 'required|numeric',
        'gggao_w' => 'required|numeric',
        'maozhong_w' => 'required|numeric',
        'jingzhong_w' => 'required|numeric',
    ];

    protected $messages = [
        'id.required' => '产品编号未能为空',
        'dashu_w.numeric' => '打数请输入数字',
        'dashu_w.required' => '请输入打数',
        'neiheshu_w.integer' => '内盒请输入整数',
        'neiheshu_w.required' => '请输入内盒',
        'meijianshu_w.integer' => '每件数量请输入整数',
        'meijianshu_w.required' => '请输入每件数量',
        'ypchang.numeric' => '样品长请输入数字',
        'ypchang.required' => '请输入样品长',
        'ypkuan.numeric' => '样品宽请输入数字',
        'ypkuan.required' => '请输入样品宽',
        'ypgao.numeric' => '样品高请输入数字',
        'ypgao.required' => '请输入样品高',
        'ggchang_w.numeric' => '规格长请输入数字',
        'ggchang_w.required' => '请输入规格长',
        'ggkuan_w.numeric' => '规格宽请输入数字',
        'ggkuan_w.required' => '请输入规格宽',
        'gggao_w.numeric' => '规格高请输入数字',
        'gggao_w.required' => '请输入规格高',
        'maozhong_w.numeric' => '毛重请输入数字',
        'maozhong_w.required' => '请输入毛重',
        'jingzhong_w.numeric' => '净重请输入数字',
        'jingzhong_w.required' => '请输入净重',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->breadcrumb[] = ['url' => \URL::route('admin.goods.index'), 'title' => trans('goods.list')];
    }

    public function index()
    {
        if (!$this->adminGate('goods_show')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $list = Yangpinzl::with('category')->paginate(20);
        return view('admin.goods.index', [
            'page_title' => trans('goods.list'),
            'breadcrumb' => $this->breadcrumb,
            'list' => $list
        ]);
    }

    public function edit($id)
    {
        if (!$this->adminGate('goods_edit')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $this->breadcrumb[] = ['url' => 'javascript:void(0)', 'title' => trans('goods.edit')];
        $goods = Yangpinzl::find($id);
        $cat = Leibie::all();
        $bz = Baozhuangfs::all();
        $dw = Yangpindw::all();
        return view('admin.goods.edit', [
            'page_title' => trans('goods.edit'),
            'breadcrumb' => $this->breadcrumb,
            'goods' => $goods,
            'cat' => $cat,
            'bz' => $bz,
            'dw' => $dw
        ]);
    }

    public function create()
    {
        if (!$this->adminGate('goods_new')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $this->breadcrumb[] = ['url' => 'javascript:void(0)', 'title' => trans('goods.create')];
        $goods = new Yangpinzl();
        $cat = Leibie::all();
        $bz = Baozhuangfs::all();
        $dw = Yangpindw::all();
        return view('admin.goods.edit', [
            'page_title' => trans('goods.create'),
            'breadcrumb' => $this->breadcrumb,
            'goods' => $goods,
            'cat' => $cat,
            'bz' => $bz,
            'dw' => $dw
        ]);
    }

    public function del($id)
    {
        if (!$this->adminGate('goods_del')) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $goods = Yangpinzl::find($id);
        if ($goods) {
            $goods->delete();
            return $this->Msg(trans('goods.del_success'), \URL::route('admin.goods.index'));
        } else
            return $this->Msg(trans('goods.del_fail'), \URL::route('admin.goods.index'), 'error');
    }

    public function save(Request $request)
    {
        if (!$this->adminGate(['goods_new', 'goods_edit'])) {
            return $this->Msg(trans('sys.no_permission'), '', 'error');
        }
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('id')) {
            $goods = Yangpinzl::find($request->id);
            if (!$goods) {
                $goods = new Yangpinzl();
                $goods->bianhao = $request->id;
                $goods->lururq_w = date('Y-m-d H:i:s');
            }
        } else {
            return $this->Msg(trans('goods.not_exist'), \URL::route('admin.goods.index'));
        }

        $goods->pinming = $request->pinming;
        $goods->epinming = $request->epinming;
        $goods->changjiahh = $request->changjiahh;
        $goods->leibieid = $request->leibieid;
        $goods->baozhuangfs = $request->baozhuangfs;
        $goods->danwei = $request->danwei;
        $goods->ypchang = $request->ypchang;
        $goods->ypkuan = $request->ypkuan;
        $goods->ypgao = $request->ypgao;
        $goods->ggchang_w = $request->ggchang_w;
        $goods->ggkuan_w = $request->ggkuan_w;
        $goods->gggao_w = $request->gggao_w;
        $goods->maozhong_w = $request->maozhong_w;
        $goods->jingzhong_w = $request->jingzhong_w;
        $goods->dashu_w = $request->dashu_w;
        $goods->neiheshu_w = $request->neiheshu_w;
        $goods->meijianshu_w = $request->meijianshu_w;
        $goods->tuyang = $request->id.'.jpg';
        if($request->hasFile('upload')){
            if(\Storage::disk('picture')->exists('picture/'. $goods->tuyang))
                \Storage::disk('picture')->delete('picture/'. $goods->tuyang);
            $request->file('upload')->storeAs('picture',$goods->tuyang,'picture');
        }
        $goods->save();

        return $this->Msg(trans('goods.save_success'), \URL::route('admin.goods.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = Yangpinzl::with('category')->orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Yangpinzl::count();
        $recordsFiltered = Yangpinzl::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }

    public function toggle_best(Request $request){
        $id=$request->id;
        $msg=[
            'error'=>0,
            'msg'=>''
        ];
        if(!$this->adminGate('goods_edit')){
            $msg['error']=1;
            $msg['msg']=trans('admin/sys.no_permission');
            return \Response::json($msg);
        }
        $goods=Yangpinzl::find($id);
        if($goods){
            $goods->is_best=!$goods->is_best;
            $goods->update();
            return \Response::json($msg);
        }else{
            $msg['error']=1;
            $msg['msg']=trans('admin/goods.not_exist');
            return \Response::json($msg);
        }
    }

    public function toggle_hot(Request $request){
        $id=$request->id;
        $msg=[
            'error'=>0,
            'msg'=>''
        ];
        if(!$this->adminGate('goods_edit')){
            $msg['error']=1;
            $msg['msg']=trans('admin/sys.no_permission');
            return \Response::json($msg);
        }
        $goods=Yangpinzl::find($id);
        if($goods){
            $goods->is_hot=!$goods->is_hot;
            $goods->update();
            return \Response::json($msg);
        }else{
            $msg['error']=1;
            $msg['msg']=trans('admin/goods.not_exist');
            return \Response::json($msg);
        }
    }
}

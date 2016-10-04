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
        'dashu_w' => 'numeric',
        'neiheshu_w' => 'integer',
        'meijianshu_w' => 'integer',
        'ypchang' => 'numeric',
        'ypkuan' => 'numeric',
        'ypgao' => 'numeric',
        'ggchang_w' => 'numeric',
        'ggkuan_w' => 'numeric',
        'gggao_w' => 'numeric',
        'maozhong_w' => 'numeric',
        'jingzhong_w' => 'numeric',
    ];

    protected $messages = [
        'id.required' => '产品编号未能为空',
        'dashu_w.numeric' => '打数请输入数字',
        'neiheshu_w.integer' => '内盒请输入整数',
        'meijianshu_w.integer' => '每件数量请输入整数',
        'ypchang.numeric' => '样品长请输入数字',
        'ypkuan.numeric' => '样品宽请输入数字',
        'ypgao.numeric' => '样品高请输入数字',
        'ggchang_w.numeric' => '规格长请输入数字',
        'ggkuan_w.numeric' => '规格宽请输入数字',
        'gggao_w.numeric' => '规格高请输入数字',
        'maozhong_w.numeric' => '毛重请输入数字',
        'jingzhong_w.numeric' => '净重请输入数字',
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
        return view('admin.goods.index', [
            'page_title' => trans('goods.list'),
            'breadcrumb' => $this->breadcrumb
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
        $data = Yangpinzl::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Yangpinzl::count();
        $recordsFiltered = Yangpinzl::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}

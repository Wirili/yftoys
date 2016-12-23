<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\models\ArticleCat;
use Validator;

class ArticleCatController extends Controller
{
    //
    protected $breadcrumb=[];

    protected $rules = [
        'title' => 'required',
        'title_en' => 'required',
    ];

    protected $messages = [
        'title.required' => '请输入文章类别',
        'title_en.required' => '请输入英文类别',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->breadcrumb[]=['url'=>\URL::route('admin.article_cat.index'),'title'=>trans('article_cat.list')];
    }

    public function index()
    {
        if(!$this->adminGate('article_cat_show')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $list=ArticleCat::paginate(20);
        return view('admin.article_cat.index',[
            'page_title'=>trans('article_cat.list'),
            'breadcrumb'=>$this->breadcrumb,
            'list'=>$list
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate('article_cat_edit')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('article_cat.edit')];
        $article_cat = ArticleCat::find($id);
        return view('admin.article_cat.edit', [
            'page_title'=>trans('article_cat.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'article_cat' => $article_cat
        ]);
    }

    public function create()
    {
        if(!$this->adminGate('article_cat_new')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('article_cat.create')];
        $article_cat = new ArticleCat([
            'sort_order'=>100
        ]);
        return view('admin.article_cat.edit', [
            'page_title'=>trans('article_cat.create'),
            'breadcrumb'=>$this->breadcrumb,
            'article_cat' => $article_cat
        ]);
    }

    public function del($id)
    {
        if(!$this->adminGate('article_cat_del')){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $article_cat = ArticleCat::find($id);
        if($article_cat) {
            $article_cat->delete();
            return $this->Msg(trans('article_cat.del_success'),\URL::route('admin.article_cat.index'));
        }else
            return $this->Msg(trans('article_cat.del_fail'),\URL::route('admin.article_cat.index'),'error');
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['article_cat_new','article_cat_edit'])){
            return $this->Msg(trans('sys.no_permission'),'','error');
        }
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('id')) {
            $article_cat=ArticleCat::find($request->id);
        } else {
            $article_cat = new ArticleCat();
            $article_cat->add_time=date('Y-m-d H:i:s');
        }

        $article_cat->title = $request->title;
        $article_cat->title_en = $request->title_en;
        $article_cat->alias = $request->alias;
        $article_cat->sort_order = $request->input('sort_order',0);
        $article_cat->save();

        return $this->Msg(trans('article_cat.save_success'),\URL::route('admin.article_cat.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = ArticleCat::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = ArticleCat::count();
        $recordsFiltered = ArticleCat::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}

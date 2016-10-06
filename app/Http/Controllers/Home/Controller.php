<?php

namespace App\Http\Controllers\Home;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Config;
use App\Models\Leibie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $config;
    public function __construct()
    {
        $this->config=Config::getConfig();
        view()->share('C',$this->config);
        view()->share('leibies',Leibie::getLeibie());
//        view()->share('leibies',Leibie::orderBy('id','asc')->get());
    }
}

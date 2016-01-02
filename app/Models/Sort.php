<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cache;

class Sort extends Model
{

    public function __construct()
    {

    }

    protected $table = 'm_sort';

    /**
     * 获取所有栏目
     * @param array $input
     * @return mixed
     */
    function GetAllSort($input = array())
    {
        $res['data'] = $this
            ->orderBy('created_at', 'desc')
            ->skip($input['start'])->take($input['limit'])->get();
        $res['total'] = $this->count();
        return $res;
    }

    function get_sort_combobox($input = array()){
        $res['data'] = $this
            ->orderBy('created_at', 'desc')
            ->get()->toArray();
        return $res;
    }

    /*
     * 更新或者添加文章没有ID是为新增，有ID时为更新
     * */
    function update_sort($data = array())
    {
        if(!isset($data['id']))
        {
            $result['msg'] = '缺少ID';
            $result['success'] = false;
            return $result;
        }
        if ($data['id'] == '') {
            $data['created_at'] = date('Y-m-d H:i:s');
            return $this->insert($data);
        } else {
            if ($this->where('id', $data['id'])->update($data)) {
                return Cache::forget('sort' . $data['id']);
            }
            return false;
        }
    }

    function del_sort($input = array())
    {
        if(!isset($input['id']))
        {
            $result['msg'] = '缺少参数：id';
            $result['success'] = false;
            return $result;
        }
        $res = $this->where('id',$input['id'])->delete();
        $result['success'] = $res?true:false;
        $result['msg'] = $res?'删除成功！':'删除失败';
        return $result;
    }

    function get_sort_name($alias)
    {
        $res = $this->where('alias',$alias)->get()->toArray();
        return isset($res[0])?$res[0]['name']:'';
    }

    function get_sort()
    {
        $res = $this->select('id','name','alias')
            ->get()->toArray();
        return $res;
    }
}

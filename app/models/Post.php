<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cache;

class Post extends Model{
	
	public function __construct()
	{
		
	}
	
	protected $table = 'm_posts';
	
	function getpost($id)
	{
		$post = $this
		->select('post_title','id','post_content','created_at')
		->find($id);
		//Cache::put('post'.$id, $post,10);
		return $post;
	}
	
	function GetListPost($input = array())
	{
		$res=$this;
		if(isset($input['s']))
		{
			$res = $this->where('post_title', 'like', '%'.$input['s'].'%' )
				->orWhere('post_content', 'like', '%'.$input['s'].'%');
		}
		$res = $res->whereRaw('post_status = 1 AND post_type = "post"')
		->select('id','post_title','created_at')
		->orderBy('created_at','desc')
		->paginate(5);//分页
		return $res;
	}

	/**
	 * 获取所有文章，后台调用
	 * @param array $input
	 * @return mixed
	 */
	function GetAllPost($input = array())
	{
		$res['data'] = $this
			->select('id','post_title','post_status','created_at')
			->orderBy('created_at','desc')
			->skip($input['start'])->take($input['limit'])->get();
		$res['total']=$this->count();
		return $res;
	}

	/*
	 * 更新或者添加文章没有ID是为新增，有ID时为更新
	 * */
	function update_post($data=array())
	{
		if($data['id']=='')
		{
			return $this->insert($data);
		}
		else
		{
			return $this->where('id',$data['id'])->update($data);
		}
	}
}
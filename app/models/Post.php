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
		->select('post_title','id','post_content')
		->find($id);
		Cache::forever('post'.$id, $post);
		return $post;
	}
	
	function GetListPost()
	{
		$res = $this->whereRaw('post_status = 1 AND post_type = "post"')
		->select('post_title','id','post_content','created_at')
		->orderBy('created_at','desc')
		->paginate(5);//分页
		return $res;
	}
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
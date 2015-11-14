<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cache;

class Photo extends Model{
	
	public function __construct()
	{
		
	}
	
	protected $table = 'm_photos';

	/**
	 * 获取图片列表
	 * @return Album
	 */
	function GetPhoList($id)
	{
		$res=$this;
		$res = $res->where('album_id',$id)
			->orderBy('created_at','desc')
			->paginate(15);//分页
		return $res;
	}
}
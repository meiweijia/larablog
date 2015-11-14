<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Cache;

class Album extends Model{
	
	public function __construct()
	{
		
	}
	
	protected $table = 'm_albums';

	/**
	 * 获取相册列表
	 * @return Album
	 */
	function GetAlbumList()
	{
		$res = $this
			->orderBy('created_at','asc')
			->paginate(15);//分页
		return $res;
	}

	function GetAlbumInfo($id)
	{
		$res = $this->where('id',$id)
			->select('id','name')
			->first();
		return $res;
	}
}
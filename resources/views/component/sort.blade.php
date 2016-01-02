<?php
use App\Models\Sort;$sortSrv = new Sort();$data['sorts'] = $sortSrv->get_sort();
?>
@foreach ($data['sorts'] as $sort)
        <div class="category">
                <a href="/category/{{$sort['alias']}}">{{$sort['name']}}</a>
        </div>
@endforeach
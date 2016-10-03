<div class="col-md-3">
    @foreach($leibies as $item)
        <div><a href="{{URL::route('category',['id'=>$item->id])}}">{{$item->leibie}}</a></div>
    @endforeach
</div>
<nav>
    <ul class="pagination btn-xs" style="margin: 5px 0px;">
        <li @if($page==1) class="disabled" @endif><a href="{!! url($url.'?page='.($page-1)) !!}"><span>&laquo;</span></a></li>
        @if($count < 15)
            @for($i=1; $i<=$count; $i++)
                @if($i == $page) <li class="active bg-red">
                @else <li>
                    @endif
                    <a href="{!! url($url.'?page='.$i) !!}"> {{$i}} </a></li>
                @endfor
                @elseif($page < 7)
                    @for($i=1; $i<=7; $i++)
                        @if($i == $page) <li class="active">
                        @else <li>
                            @endif
                            <a href="{!! url($url.'?page='.$i) !!}"> {{$i}} </a></li>
                        @endfor
                        <li class="disabled"><a href="#">...</a></li>
                        <li><a href="{!! url($url.'?page='.$count-1) !!}">{{$count-1}}</a></li>
                        <li><a href="{!! url($url.'?page='.$count) !!}">{{$count}}</a></li>
                        @elseif($page > $count-7)
                            <li><a href="{!! url($url.'?page=1') !!}">1</a></li>
                            <li><a href="{!! url($url.'?page=2') !!}">2</a></li>
                            <li class="disabled"><a href="#">...</a></li>
                            @for($i=$count-7; $i<=$count; $i++)
                                @if($i == $page) <li class="active">
                                @else <li>
                                    @endif
                                    <a href="{!! url($url.'?page='.$i) !!}"> {{$i}} </a></li>
                                @endfor
                                @else
                                    <li><a href="{!! url($url.'?page=1') !!}">1</a></li>
                                    <li><a href="{!! url($url.'?page=2') !!}">2</a></li>
                                    <li class="disabled"><a href="#">...</a></li>
                                    @for($i=$page-3; $i<=$page+3; $i++)
                                        @if($i == $page) <li class="active">
                                        @else <li>
                                            @endif
                                            <a href="{!! url($url.'?page='.$i) !!}"> {{$i}} </a></li>
                                        @endfor
                                        <li class="disabled"><a href="#">...</a></li>
                                        <li><a href="{!! url($url.'?page='.$count-1) !!}">{{$count-1}}</a></li>
                                        <li><a href="{!! url($url.'?page='.$count) !!}">{{$count}}</a></li>
                                        @endif
                                        <li @if($page==floor($count)) class="disabled" @endif><a href="{!! url($url.'?page='.($page+1)) !!}">&raquo;</a></li>
    </ul>
</nav>
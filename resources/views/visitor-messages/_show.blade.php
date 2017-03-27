
    <div class="row" style="overflow: scroll; height: 290px; background-color: white;">
        @foreach($messages as $message)
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img width="60" height="60" class="media-object" src="{{ asset($message->sender->avatar) }}">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <small><a href="{{ url('/users/' . $message->sender->username) }}">{{ $message->sender->username }}</a></small>
                        <small style="font-size: 12px;"> <span class="glyphicon glyphicon-time"></span> {{ $message->created_at }} </small>
                    </h4>
                    {{ $message->text }} <br/>
                    <a href="{{ url('/users/' . $message->receiver->username . '/visitor-messages/' . $message->sender->username) }}">View conversation</a>
                </div>
            </div>
        @endforeach
    </div>
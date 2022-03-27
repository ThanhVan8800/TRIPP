@extends("main")
@section("content")

<div id="data">
    <h3>hello</h3>
    @foreach($chats as $ch)
    <p><strong>{{$ch->author}}: </strong>{{$ch->content}}</p>



    @endforeach
</div>

<form action="{{route('chat.store')}}" method="post" id="">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">{{__('Content')}}</label>
                        <span class="text-danger">(*)</span>
                        <input type="text" id="content" name="content" placeholder=""
                        class="form-control" value="{{old('content')}}" required/>
                        @error('content')
                        <span class="error invalid-feedback-message" style="display:block" role="alert">
                                <strong>{{$message}}</strong>
                        </span>                      
                        @enderror
                    </div>
                </div>
            </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                    </div>
                </div>
        </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.4.1/socket.io.js" integrity="sha512-MgkNs0gNdrnOM7k+0L+wgiRc5aLgl74sJQKbIWegVIMvVGPc1+gc1L2oK9Wf/D9pq58eqIJAxOonYPVE5UwUFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var socket = io('http://localhost:6001')
    socket.on('demo_database_chat:message', function(data) {
        console.log(data)
        if($('#' + data.id).length == 0){
            $('#data').append('<p><strong>' + data.author + '</strong>: ' + data.content + '</p>')
        }
        else{
            console.log('Đã có tin nhắn')
        }
    })
</script>
@endsection


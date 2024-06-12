@extends('layouts.app')

@section('style')
    <style>
       .item img{
        height: 50px;
        width: 50px;
        border-radius: 50%;
        margin-right: 5px;
       }
       .item{
        display: flex;
        align-items: center;
        background: thistle;
        padding: 10px;
        border-bottom: 1px solid #ccc;
        position: relative;
        
       }
       .item:hover{
        opacity: 0.8;
       }
       .status{
        position: absolute;
        width: 10px;
        height: 10px;
        background: green;
        border-radius: 50%;
        top: 5px;
       }
       .block-chat{
        width: 100%;
        height: 450px;
        border: 1px solid rgb(226, 226, 226);
        overflow-y:scroll; 
       }
       button{
        margin-left: 10px;
       }
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-12">
                            <a href="" class="item">
                                <div class="status"></div>
                                <img src="{{ $user -> image }}" alt="Erorr">
                                <p>{{ $user -> name}}</p>
                            </a>
                        </div>  
                    @endforeach
                    
                </div>
            </div>

            <div class="col-md-9">
                <ul class="block-chat">
                    <li>

                    </li>
                </ul>
                <form action="">
                    <div class="d-flex">
                        <input type="text"  class="form-control">
                        <button class="btn btn-success">Send</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        Echo.join('chat')
        .here(users => {
            console.log(users, 'here');
        })
        .joining(user => {
            console.log(user, 'joining');
        })
        .leaving(user => {
            console.log(user , 'leaving');
        })
    </script>
@endsection



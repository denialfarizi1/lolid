@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
            <h2 class="text-center">Please Type Your Email Address</h2>
            <h5 class="text-center">Send Email with Gmail</h5>

            <!--Code to show success Messade -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dissmiss="alert" aria-label=Close></button>
                <span aria-hidden="true">&times;</span>
                
            </div>
            @endif

            <!-- code show error message -->
            @if(count($errors)>0)
              @foreach($erors->all() as $error)
                   <div class="alert alert-dager alert-dismissible fade show" role="alert">{{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>   
                   </div>
              @endforeach
            @endif   
            
            <!-- form to input email address-->
            <form action="hello/send-welcome-email" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <input type="email" class="form-control text-center" required placeholder="Provide an email" name="email"><br>
                    <button type="submit" class="btn btn-primary btn-mid" style="margin-left: 0px;margin: auto; display: block;">
                        SEND
                    </button>   
                </div>
            </form>       
       
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="https://cdnjs.cloudflare/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>    
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

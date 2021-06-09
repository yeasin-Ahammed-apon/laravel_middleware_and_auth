@include('pages.login.links')

<div class="card-body m-5" >
    <h1 class="p-5 text-center text-primary">
        Login
    </h1>
    @if (session()->has('massage'))
        <p class="alert alert-success">
            {{session()->get('massage')}}
        </p>
    @endif
    @if (session()->has('faild_massage'))
        <p class="alert alert-danger">
            {{session()->get('faild_massage')}}
        </p>
    @endif
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="text-center">
        <a href="{{url('register_page')}}" class="text-dark w-50 text-center "  >
            if you dont have any account
            <span class=" text-success">
                    Register
            </span>
        </a>
    </div>
    
    
</div>
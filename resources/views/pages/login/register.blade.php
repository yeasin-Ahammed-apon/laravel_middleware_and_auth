@include('pages.login.links')

<div class="card-body m-5">
    <h1 class="p-5 text-center text-success">
        Register
    </h1>
    <form action="/register" method="POST">
        @csrf
        {{-- name  --}}
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="name" name="name" class="form-control">   
          {{-- unvalidate name --}}
          @error('name')
            <span class="text-danger">{{$message}}</span>       
          @enderror
        </div>
        {{-- email --}}
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" >
            {{-- unvaildate email --}}
            @error('email')
              <span class="text-danger">{{$message}}</span>       
            @enderror
        </div>
        {{-- password --}}
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
            {{-- unvalidate password --}}
            @error('password')
              <span class="text-danger">{{$message}}</span>       
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
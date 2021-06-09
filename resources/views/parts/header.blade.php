
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Middleware_&_Auth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/add_page')}}">Add</a>
          </li>                    
        </ul>
        <div class="d-flex"> 
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
            @if (session()->has('name'))                                            
                <li class="nav-item nav-link text-success fs-5 fw-bold">                                        
                    {{ucwords(session()->get('name'))}}                                            
                </li>     
            @endif      
                <li class="nav-item text-primary">                                        
                    <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                 </li> 
            </ul> 
        </div>        
      </div>
    </div>
  </nav>
 
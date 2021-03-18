<nav class="col-md-2 d-none d-md-block sidebar bg-light">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link " id="dashboard" href="{{route('admindashboard')}}">
                <span data-feather="home" ></span>
                Dashboard <span class="sr-only"></span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link " id="evaluation" href="{{route('select-evaluation')}}">
                <span data-feather="check-square" ></span>
                Evaluations
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#" onClick="$('.evaluee-group').toggle(300)">
                <span data-feather="user" ></span>
                Evaluees
              </a>
              <ul class="list-group  evaluee-group" style="display:none">
                <li class="list-group-item pl-5"><a href="{{route('admins.index')}}" class="text-dark">Administrator</a></li>
                <li class="list-group-item pl-5"><a href="{{route('supervisors.index')}}" class="text-dark">Supervisor</a></li>
                <li class="list-group-item pl-5"><a href="{{route('BEDevaluees.index')}}" class="text-dark">BED Teacher</a></li>
                <li class="list-group-item pl-5"><a href="{{route('evaluees.index')}}" class="text-dark">College Teacher</a></li>
                <li class="list-group-item pl-5"><a href="#" class="text-dark">NTP</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link " href="{{route("pick-tool")}}">
                <span data-feather="check-circle" ></span>
                Evaluation Tools
              </a>
            </li>
          </ul>
  
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>------------------------------</span>
            <a class="d-flex align-items-center" href="#" >
              <span data-feather="plus-circle" ></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="file-text" ></span>
                Archive
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">
                <span data-feather="file-text" ></span>
                Privacy Statement
              </a>
            </li>
          </ul>
        </div>
      </nav>

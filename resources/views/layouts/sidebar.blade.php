<nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link" id="dashboard" href="{{route('admindashboard')}}">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only"></span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="evaluation" href="{{route('pick-evaluation')}}">
                <span data-feather="check-square"></span>
                Evaluation Setup
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('evaluees.index')}}">
                <span data-feather="user"></span>
                Evaluees
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Evaluators
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route("pick-tool")}}">
                <span data-feather="check-circle"></span>
                Evaluation Tools
              </a>
            </li>
          </ul>
  
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Privacy Statement
              </a>
            </li>
          </ul>
        </div>
      </nav>

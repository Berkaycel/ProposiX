<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.index')}}">
              <i class="icon-grid bi bi-box-seam"></i>
              <span class="menu-title" style="margin-left: 12%;">Ürünlerim</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('proposals.outbound.index')}}">
              <i class="bi bi-send"></i>
              <span class="menu-title" style="margin-left: 12%;">Tekliflerim</span>
            </a>
          </li>
        </ul>
      </nav>
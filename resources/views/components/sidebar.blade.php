<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @guest
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}"> List </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('user.create') }}"> New User </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#transaction" aria-controls="transaction">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Transactions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaction" style="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('transaction.index') }}">All Transaction</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('transaction.deposit.index') }}">All Deposit</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('transaction.deposit.create') }}">Make Deposit</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('transaction.withdraw.index') }}">All Withdraw</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('transaction.withdraw.create') }}">Make Withdraw</a></li>
              </ul>
            </div>
          </li>
        @endguest

    </ul>
</nav>

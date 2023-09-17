@if (auth()->user()->level == 'Staff')
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            {{-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>KASIR APP</h3> --}}
            
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                {{-- <h6 class="mb-0">{{ auth()->user()->name }}</h6> --}}
                {{-- <span>Admin</span> --}}
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item">
                <a href="/karyawan" class="nav-item nav-link {{ Request::is('karyawan') ? 'active' : ' ' }}"><i class="far fa-file-alt me-2"></i>Data Karyawan</a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link {{ Request::is('absensi*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Absensi</a>
                <div class="dropdown-menu bg-transparent border-0"> 
                    <a href="/absensi" class="dropdown-item">Data Absen</a>
                    <a href="/absensi/lembur" class="dropdown-item">Lembur</a>
                    <a href="/absensi/cuti" class="dropdown-item">Cuti</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link {{ Request::is('gaji*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Gaji</a>
                <div class="dropdown-menu bg-transparent border-0"> 
                    <a href="/gaji" class="dropdown-item">Data Gaji</a>
                    <a href="/gaji/kalkulasi" class="dropdown-item">Kalkulasi Gaji</a>
                    <a href="/gaji/detail_gaji" class="dropdown-item">Detail Gaji</a>
                </div>
            </div>
          
    
    
           
            
        </div>
    </nav>
</div>
@elseif(auth()->user()->level == 'SPV')
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            {{-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>KASIR APP</h3> --}}
            
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                {{-- <h6 class="mb-0">{{ auth()->user()->name }}</h6> --}}
                {{-- <span>Admin</span> --}}
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            {{-- <div class="nav-item">
                <a href="/karyawan" class="nav-item nav-link {{ Request::is('karyawan') ? 'active' : ' ' }}"><i class="far fa-file-alt me-2"></i>Data Karyawan</a>
            </div> --}}
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link {{ Request::is('absensi*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Absensi</a>
                <div class="dropdown-menu bg-transparent border-0"> 
                    <a href="/absensi" class="dropdown-item">Data Absen</a>
                    <a href="/absensi/lembur" class="dropdown-item">Lembur</a>
                    <a href="/absensi/cuti" class="dropdown-item">Cuti</a>
                </div>
            </div> --}}
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link {{ Request::is('gaji*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Gaji</a>
                <div class="dropdown-menu bg-transparent border-0"> 
                    <a href="/gaji" class="dropdown-item">Data Gaji</a>
                    <a href="/gaji/kalkulasi" class="dropdown-item">Kalkulasi Gaji</a>
                    <a href="/gaji/detail_gaji" class="dropdown-item">Detail Gaji</a>
                </div>
            </div> --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link {{ Request::is('spv*') ? 'active' : '' }} dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>SPV</a>
                <div class="dropdown-menu bg-transparent border-0"> 
                    <a href="/spv/pengesahan" class="dropdown-item">Pengesahan Gaji</a>
                    <a href="/spv/batalkan_pengesahan" class="dropdown-item">Batalkan Pengesahan Gaji</a>
                    <a href="/spv/pdf" class="dropdown-item">Eksport Gaji</a>
                </div>
            </div>
            {{-- <a href="/logout" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Logout</a> --}}
           
            
        </div>
    </nav>
</div>
@endif
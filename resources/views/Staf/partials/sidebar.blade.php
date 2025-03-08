<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="/staf" class="brand-link"> <!--begin::Brand Image--> <img src="{{asset('Admilte/dist/assets/img/elohim.png')}}" alt="Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> 
            <span class="brand-text fw-light"><spa> Papua</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item menu-open"> <a href="#" class="nav-link active">
                             <i class="nav-icon bi bi-speedometer"></i>
                                <p>
                                    Dashboard
                                    <!-- <i class="nav-arrow bi bi-chevron-right"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link">
                            <i class="fas fa-hotel"></i>
                                <p>
                                     Laporan Kerusakan
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="{{url('lapor')}}" class="nav-link"> 
                                    <!-- <i class="nav-icon bi bi-circle"></i> -->
                                    <i class="fas fa-file"></i>
                                    <i class="fas fa-person"></i>
                                        <p>Ajukan Laporan</p>
                                    </a> </li>
                            </ul>
                        </li>
                       
                        <li class="nav-item"> <a href="#" class="nav-link"> 
                            <!-- <i class="nav-icon bi bi-tree-fill"></i> -->
                            <i class="fas fa-house-medical"></i>

                                <p>
                                   Manajemen Fasilitas
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="./UI/general.html" class="nav-link"> 
                                    <!-- <i class="nav-icon bi bi-circle"></i> -->
                                    <i class="fas fa-house-medical"></i>
                                        <p>Fasilitas</p>
                                    </a> </li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                                <p>
                                    Laporan dan Statistik
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="./forms/general.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                        <p>General Elements</p>
                                    </a> </li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-table"></i>
                                <p>
                                    Notivikasi
                                </p>
                            </a>
                        </li>                       
                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> 
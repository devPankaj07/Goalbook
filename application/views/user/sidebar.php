<nav class="flex-none navbar navbar-vertical navbar-expand-lg navbar-light bg-transparent show vh-lg-100 px-0 py-2"
            id="sidebar">
            <div class="container-fluid px-3 px-md-4 px-lg-6"><button class="navbar-toggler ms-n2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button> <a
                    class="navbar-brand d-inline-block py-lg-1 mb-lg-5" href="dashboard.php"> <img
                        src="https://goldbook1.soonx.co.in/assets/newui/img/logos/logo.png" class=" h-rem-8 h-rem-md-10" alt="Logo"></a>
                <div class="navbar-user d-lg-none">
                    <div class="dropdown"><a class="d-flex align-items-center" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            <div>
                                <div class="avatar avatar-sm text-bg-secondary rounded-circle"></div>
                            </div>
                            <div class="d-none d-sm-block ms-3"><span class="h6">Alexis</span></div>
                            <div class="d-none d-md-block ms-md-2"><i class="bi bi-chevron-down text-muted text-xs"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Signed in
                                    as</span> <span class="d-block text-heading fw-semibold"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?></span></div>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                    class="bi bi-house me-3"></i>Home </a><a class="dropdown-item" href="<?= base_url() ?>Main/dashboard"><i
                                    class="bi bi-pencil me-3"></i>Edit profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                    class="bi bi-gear me-3"></i>Settings </a><a class="dropdown-item" href="#"><i
                                    class="bi bi-image me-3"></i>Media </a><a class="dropdown-item" href="#"><i
                                    class="bi bi-box-arrow-up me-3"></i>Share</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                    class="bi bi-person me-3"></i>Login</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse overflow-x-hidden" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill active"
                                href="<?= base_url() ?>Main/dashboard" role="button" aria-expanded="true"
                                aria-controls="sidebar-dashboards"><i class="bi bi-house-fill"></i>
                                <span>Dashboards</span> <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                        
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>profile" role="button" aria-expanded="false"
                                aria-controls="sidebar-pages"><i class="fa-solid fa-user"></i> <span>My Profile</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>
                        </li>
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>guide" role="button" aria-expanded="false"
                                aria-controls="sidebar-account"><i class="fa-solid fa-book-open"></i> <span>My
                                    Guide</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>rewards" role="button" aria-expanded="false"
                                aria-controls="sidebar-other"><i class="fa-solid fa-trophy"></i> <span>My Rewards</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>goals" role="button" aria-expanded="false"
                                aria-controls="sidebar-other"><i class="fa-solid fa-bullseye"></i> <span>My Goals</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>download" role="button" aria-expanded="false"
                                aria-controls="sidebar-other"><i class="fa-solid fa-download"></i> <span>My
                                    Download</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>myactivity" role="button" aria-expanded="false"
                                aria-controls="sidebar-other"><i class="fa-solid fa-chart-line"></i> <span>My
                                    Activity</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                        <li class="nav-item my-1"><a class="nav-link d-flex align-items-center rounded-pill"
                                href="<?= base_url() ?>logout" role="button" aria-expanded="false"
                                aria-controls="sidebar-other"><i
                                    class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                                <span
                                    class="badge badge-sm rounded-pill me-n2 bg-success-subtle text-success ms-auto"></span></a>

                        </li>
                    </ul>
                    <hr class="navbar-divider my-5 opacity-70">

                    <div class="mt-auto"></div>

                </div>
            </div>
        </nav>
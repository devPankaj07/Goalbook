<div class="d-none d-lg-flex py-4">
                <div class="hstack flex-fill justify-content-end flex-nowrap gap-6 ms-auto px-6 px-xxl-8">
                    <div class="dropdown"><a class="avatar avatar-sm text-bg-dark rounded-circle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><img
                                src="https://goldbook1.soonx.co.in/assets/newui/img/memoji/memoji-2.svg"></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Signed in
                                    as</span> <span class="d-block text-heading fw-semibold"><?= $user_data['first_name'] . ' ' . $user_data['last_name'] ?></span></div>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url() ?>Main/dashboard"><i
                                    class="bi bi-house me-3"></i>Home </a><a class="dropdown-item" href="<?= base_url() ?>editprofile"><i
                                    class="bi bi-pencil me-3"></i>Edit profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url() ?>settings"><i
                                    class="bi bi-gear me-3"></i>Settings </a><a class="dropdown-item" href="<?= base_url() ?>Mediapage"><i
                                    class="bi bi-image me-3"></i>Media </a><a class="dropdown-item" href="<?= base_url() ?>sharepage"><i
                                    class="bi bi-box-arrow-up me-3"></i>Share</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url() ?>logout"><i
                                    class="bi bi-person me-3"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            
            <div class="mt-3">
                <?php Flasher::flash(); ?>
            </div>

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Login Perfeelus</h4>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/login/proses" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
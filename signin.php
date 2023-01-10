<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Sign In</title>
</head>
<body>
    <?php 
        require_once('partials/class/allClass.php'); 
        $info = $class->getUserInfo();
    ?>
    <?php require_once('assets/components/header.php'); ?>

    <section id="main-content">
        <main>
            <div class="container">
                <div class="row g-1">
                    <div class="col-md-12 col-lg-6 bg-dark p-3">
                        <h2 class="text-center text-white mb-3"><?php echo $info['userUniqueId']; ?>Anti COVID-19 Measures</h2>
                        <p class="text-justify text-white">The PHMC-B has the safety of its patiesnts, employees, and visitors as its top priority. .</p>
                    </div>
                    <div class="col-md-12 col-lg-6 bg-success p-3">
                        <h2 class="text-center text-white mb-3">Sign In<hr></h2>
                        <form action="" method="post" class="signup-form">
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="userUserName" name="userUserName" placeholder="Username">
                                            <label for="userUserName">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">       
                                        <span class="input-group-text bg-success text-light"><i class="fa-solid fa-lock p-2"></i></span>
                                        <div class="form-floating userPassword">
                                            <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password">
                                            <i class="fa-solid fa-eye"></i>
                                            <label for="userPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>

    <!-- Signin Function JS -->
    <script src="partials/js/signin.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('assets/components/head.php'); ?>
    <title>Home</title>
</head>
<body>
    <?php require_once('assets/components/header.php'); ?>
    <section id="main-content">
        <main>
            <div class="container">
                <div class="bg-white p-3">
                    <h2 class="text-center text-black text-uppercase mb-3">Contact Us<hr></h2>
                    <form action="" method="post" class="contact-us-form">
                        <div class="row g-2 pe-5 px-5">
                            <div class="alert alert-danger alert-messages"></div>
                            <div class="col-md-6">
                                <div class="input-group">       
                                    <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="First Name" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                        <label for="userFirstName">First Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">       
                                    <span class="input-group-text bg-success text-light"><i class="fa-solid fa-user-pen p-2"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userLastName" name="userLastName" placeholder="Last Name" pattern="[a-zA-Z0-9-ñ\s]+" title="Must contain letters and numbers" required>
                                        <label for="userLastName">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">       
                                    <span class="input-group-text bg-success text-light"><i class="fa-solid fa-phone p-2"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userContact" name="userContact" placeholder="Contact" pattern="[0-9-_.()]+" title="Must contain numbers and symbols (e.g. -_.())" required>
                                        <label for="userContact">Contact</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">       
                                    <span class="input-group-text bg-success text-light"><i class="fa-solid fa-envelope-circle-check p-2"></i></span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="(e.g. example@email.com)" required>
                                        <label for="userEmail">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-3">       
                                    <span class="input-group-text bg-success text-light"><i class="fa-solid fa-envelope fa-fw fs-4"></i></span>
                                    <div class="form-floating">
                                        <textarea name="userMessage" id="userMessage" class="form-control" placeholder="Your Message" style="height: 7rem;" required></textarea>
                                        <label for="userMessage">Your Message</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-primary btn-flat btn-lg w-100 contactUsBtn" name="contactUsBtn"><strong><i class="fa-solid fa-paper-plane me-2"></i>Submit</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>

    <?php require_once('assets/components/footer.php'); ?>

    <!-- Contact Us Function JS -->
    <script src="partials/js/submit-contact-us.js"></script>
</body>
</html>
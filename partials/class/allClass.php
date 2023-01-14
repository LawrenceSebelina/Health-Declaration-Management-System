<?php 
    class allClass {
        // private $host = "mysql:host=sql107.epizy.com;dbname=epiz_32788080_hdms";
        // private $username = "epiz_32788080";
        // private $password = "I3YDgOZw7J28JrQ";
        // protected $conn;

        private $host = "mysql:host=localhost;dbname=hdms";
        private $username = "root";
        private $password = "";
        protected $conn;

        protected function connect() {
            try {
                $this->conn = new PDO($this->host, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $this->conn;  
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            } 
        }

        protected function disconnect() {
            $this->conn = null;
        }

        public function checkUserUsername($userUsername) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT userUsername FROM users WHERE userUsername = ?");
            $stmt->execute([$userUsername]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function checkUserEmail($userEmail) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT userEmail FROM users WHERE userEmail = ?");
            $stmt->execute([$userEmail]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function updatePCheckE($updateUserEmail, $userUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT userEmail FROM users WHERE userEmail = ? AND userUniqueId != ?");
            $stmt->execute([$updateUserEmail, $userUniqueId]);
            $datacount = $stmt->rowCount();
            return $datacount;
        }

        public function signUp($userUniqueId, $userFirstName, $userLastName, $userMiddle, $userAddress, $userBirthday, $userAge, $userGender, $userContactNo, $userEmail, $userUsername, $userPassword, $userCPassword, $userType, $userDateCreated) {

            if (!empty($userFirstName) && !empty($userLastName) && !empty($userMiddle) && !empty($userAddress) && !empty($userBirthday) && !empty($userAge) && !empty($userGender) && !empty($userContactNo) && !empty($userEmail) && !empty($userUsername) && !empty($userPassword) && !empty($userCPassword)) {
                if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                    if ($userPassword == $userCPassword) {
                        if ($this->checkUserUsername($userUsername) == 0) {
                            if ($this->checkUserEmail($userEmail) == 0) {

                                    $connection = $this->connect();
                                    $stmt = $connection->prepare("INSERT INTO users (userUniqueId, userType, userFName, userMI, userLName, userAddress, userBDay, userAge, userGender, userContact, userEmail, userUsername, userPassword, userCPassword, userDateCreated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                    $stmt->execute([$userUniqueId, $userType, $userFirstName, $userMiddle, $userLastName, $userAddress, $userBirthday, $userAge, $userGender, $userContactNo, $userEmail, $userUsername, $userPassword, $userCPassword, $userDateCreated]);

                                    if ($stmt) {

                                        // Not done
                                        // include_once ('../assets/components/head.php');
                                        // include_once ('../assets/vendor/PHPMailer/src/Exception.php');
                                        // include_once ('../assets/vendor/PHPMailer/src/PHPMailer.php');
                                        // include_once ('../assets/vendor/PHPMailer/src/SMTP.php');
                                        
                                        $mail = new PHPMailer\PHPMailer\PHPMailer();

                                        try {
                                            $mail->isSMTP();
                                            $mail->Host = 'smtp.gmail.com';
                                            // $mail->SMTPDebug = 3;
                                            $mail->SMTPAuth = true;
                                            $mail->Username = 'uphmcb@gmail.com';
                                            $mail->Password = 'ofxuazekfhjfifuu';
                                            $mail->SMTPSecure = 'tls';
                                            $mail->Port = 587;
                                            $mail->setFrom('uphmcb@gmail.com');
                                            $mail->addAddress($userEmail);
                                            $mail->isHTML(true);
                                            $mail->Subject = 'Account Verification for University of Perpertual Help Medical Center - Binan (Health Declaration Website)';

                                            $mail->Body = 
                                                '<div>
                                                    <div style="display: flex; justify-content: center; align-items: center; gap: 20px; margin-block-end: 35px;">
                                                        <h2 style="letter-spacing: 2px; text-transform: uppercase; font-weight: 600; color: blue;">University of Perpertual Help Medical Center - Binan</h2>
                                                    </div>
                                            
                                                    <div style="margin-inline-start: 20px; margin-block-end: 20px;">
                                                        <h1>Hi <strong>'.$userFirstName.',</strong></h1>
                                                    </div>
                                                    
                                                    <div style="margin-inline-start: 50px; margin-block-end: 30px;">
                                                        <p>You registered an account on University of Perpertual Help Medical Center - Binan (Health Declaration Website), before being able to use your account you need to verify that this is your email address by clicking "Verify" button.</p>
                                                    </div>
                                            
                                                    <div style="display: flex; justify-content: center; margin-block-end: 50px;">
                                                        <a href="http://localhost/MyPHPProject/HDMS/index?route=verification&uuid='.$userUniqueId.'" style="text-decoration: none; background-color: blue; padding: 12px 20px; width: 100px; text-align: center; font-weight: 700; border-radius: 5px; color: #fff;">Verify</a>
                                                    </div>

                                                    <div style="margin-inline-start: 20px;">
                                                        <p>
                                                            <strong>Address:</strong> National Hwy, Binan, Laguna 4024, Philippines <br>
                                                            <strong>Tel No.:</strong> (632) 8779-5310 & (6349) 544-5150 <br>
                                                            <strong>Offical Email:</strong> hospital@phmcb.com <br>
                                                        </p>
                                                    </div>
                                                </div>';
                                            
                                            $mail->send();

                                            return "success";

                                        } catch (Exception $e) {

                                            return "error";

                                        }

                                    }

                            } else {
                                return "Email is already exists!";
                            }
                        } else {
                            return "Username is already exists!";
                        }
                    } else {
                        return "Password does not match!";
                    }
                } else {
                    return $userEmail . " is invalid email format!";
                }
            } else {
                return "Please filled up all fields!";
            }

            $this->disconnect(); 
    
        }

        public function verifyUserAccount($verifyUserUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
            $stmt->execute([$verifyUserUniqueId]);
            $verifiedAccount = $stmt->fetch(); 

            if ($verifiedAccount > 0) {
                if ($verifiedAccount['userVerify'] == 0) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE users SET userVerify = ? WHERE userUniqueId = ?");
                    $stmt->execute([1, $verifyUserUniqueId]);
    
                    if ($stmt) {
                        return "success";
                    } else {
                        return "failed";
                    }
                } else {
                    return "already";
                }
            }

        }

        public function forgotPassword($userUsernameFP, $userEmailFP) {

            if (!empty($userUsernameFP) && !empty($userEmailFP)){
                if (!empty($userUsernameFP)) {
                    if (!empty($userEmailFP)) {
                        if (filter_var($userEmailFP, FILTER_VALIDATE_EMAIL)) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE userUsername = ? AND userEmail = ?");
                            $stmt->execute([$userUsernameFP, $userEmailFP]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();

                            if ($datacount > 0) {
                                if ($data['userUsername'] == $userUsernameFP) {
                                    if ($data['userEmail'] == $userEmailFP) {

                                        $mail = new PHPMailer\PHPMailer\PHPMailer();

                                        try {
                                            $mail->isSMTP();
                                            $mail->Host = 'smtp.gmail.com';
                                            // $mail->SMTPDebug = 3;
                                            $mail->SMTPAuth = true;
                                            $mail->Username = 'uphmcb@gmail.com';
                                            $mail->Password = 'ofxuazekfhjfifuu';
                                            $mail->SMTPSecure = 'tls';
                                            $mail->Port = 587;
                                            $mail->setFrom('uphmcb@gmail.com');
                                            $mail->addAddress($data['userEmail']);
                                            $mail->isHTML(true);
                                            $mail->Subject = 'Account (Forget Password) Verification for University of Perpertual Help Medical Center - Binan (Health Declaration Website)';

                                            $mail->Body = 
                                                '<div>
                                                    <div style="display: flex; justify-content: center; align-items: center; gap: 20px; margin-block-end: 35px;">
                                                        <h2 style="letter-spacing: 2px; text-transform: uppercase; font-weight: 600; color: blue;">University of Perpertual Help Medical Center - Binan</h2>
                                                    </div>
                                            
                                                    <div style="margin-inline-start: 20px; margin-block-end: 20px;">
                                                        <h1>Hi <strong>'.$data['userFName'].',</strong></h1>
                                                    </div>
                                                    
                                                    <div style="margin-inline-start: 50px; margin-block-end: 30px;">
                                                        <p>It looks like you forgot your password to your account ('.$data['userUsername'].') on University of Perpertual Help Medical Center - Binan (Health Declaration Website). To be able to recover your account click the "Reset Password" button to reset or create a new password for your account.</p>
                                                    </div>
                                            
                                                    <div style="display: flex; justify-content: center; margin-block-end: 50px;">
                                                        <a href="http://localhost/MyPHPProject/HDMS/index?route=home&uuid='.$data['userUniqueId'].'" style="text-decoration: none; background-color: blue; padding: 12px 20px; width: 100px; text-align: center; font-weight: 700; border-radius: 5px; color: #fff;">Reset Password</a>
                                                    </div>

                                                    <div style="margin-inline-start: 20px;">
                                                        <p>
                                                            <strong>Address:</strong> National Hwy, Binan, Laguna 4024, Philippines <br>
                                                            <strong>Tel No.:</strong> (632) 8779-5310 & (6349) 544-5150 <br>
                                                            <strong>Offical Email:</strong> hospital@phmcb.com <br>
                                                        </p>
                                                    </div>
                                                </div>';
                                            
                                            $mail->send();

                                            return "success";

                                        } catch (Exception $e) {

                                            return "error";

                                        }
                                    } else {
                                        return "There is no " . $userUsernameFP . " username found!";
                                    } 
                                } else {
                                    return "There is no " . $userEmailFP . " email found!";
                                } 
                            } else {
                                return "There is no account for username: " . $userUsernameFP . " and email: " . $userEmailFP . " found!";
                            } 
                        } else {
                            return $userEmailFP . " is invalid email format!";
                        }     
                    } else {
                        return "Please Insert Email!";
                    }
                } else {
                    return "Please Insert Username!";
                }
            } else {
                return "Please Insert Username and Email!";
            }

        }

        public function changePasswordFP($userUniqueIdFP, $newPasswordFP, $cNewPasswordFP) {
            if ($newPasswordFP == $cNewPasswordFP) {

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userPassword = ?, userCPassword = ? WHERE userUniqueId = ?");
                $stmt->execute([$newPasswordFP, $cNewPasswordFP, $userUniqueIdFP]);

                if ($stmt) {
                    return "success";
                }

            } else {
                return "New password did not match!";
            }

        }

        public function unholdUserAccount($usersAccountsHold, $dateNow) {

            $connection = $this->connect();
            $stmt = $connection->prepare("UPDATE users SET userAccountHold = ? WHERE userAccountHold = ? AND userAccountUnholdDate = ?");
            $stmt->execute([0, $usersAccountsHold, $dateNow]);

            if ($stmt) {
                return "success";
            }

        }

        public function addAdminAccount($adminUniqueId, $adminFirstName, $adminLastName, $adminMiddle, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail, $adminUsername, $adminPassword, $adminCPassword, $userType, $adminDateCreated) {

            if (!empty($adminFirstName) && !empty($adminLastName) && !empty($adminMiddle) && !empty($adminAddress) && !empty($adminBirthday) && !empty($adminAge) && !empty($adminGender) && !empty($adminContactNo) && !empty($adminEmail) && !empty($adminUsername) && !empty($adminPassword) && !empty($adminCPassword)) {
                if (filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                    if ($adminPassword == $adminCPassword) {
                        if ($this->checkUserUsername($adminUsername) == 0) {
                            if ($this->checkUserEmail($adminEmail) == 0) {

                                    $connection = $this->connect();
                                    $stmt = $connection->prepare("INSERT INTO users (userUniqueId, userType, userFName, userMI, userLName, userAddress, userBDay, userAge, userGender, userContact, userEmail, userUsername, userPassword, userCPassword, userDateCreated) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                    $stmt->execute([$adminUniqueId, $userType, $adminFirstName, $adminMiddle, $adminLastName, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail, $adminUsername, $adminPassword, $adminCPassword, $adminDateCreated]);

                                    if ($stmt) {
                                        return "success";
                                    }

                            } else {
                                return "Email is already exists!";
                            }
                        } else {
                            return "Username is already exists!";
                        }
                    } else {
                        return "Password does not match!";
                    }
                } else {
                    return $adminEmail . " is invalid email format!";
                }
            } else {
                return "Please filled up all fields!";
            }

            $this->disconnect(); 
    
        }

        public function signIn($userUsername, $userPassword, $myMab) {

            if (!empty($userUsername) || !empty($userPassword)){
                if (!empty($userUsername)) {
                    if (!empty($userPassword)) {

                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));

                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT * FROM users WHERE userUsername = ? AND userPassword = ?");
                        $stmt->execute([$userUsername, $userPassword]);
                        $data = $stmt->fetch(); 
                        $datacount = $stmt->rowCount();

                        if ($datacount > 0) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("UPDATE users SET userMab = ? WHERE userUniqueId = ?");
                            $stmt->execute([$myMab, $data['userUniqueId']]);

                            if ($stmt) {
                                $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
                                $stmt->execute([$data['userUniqueId']]);
                                $data = $stmt->fetch(); 
                                $datacount = $stmt->rowCount();

                                if ($datacount > 0) {
                                    if ($data['userVerify'] == 1) {
                                        if ($data['userAccountHold'] == 0) {
                                            $userUniqueId = $data['userUniqueId'];
                                            $activityDone = "Sign In";
                                            date_default_timezone_set('Asia/Manila');
                                            $activityDateCreated = date('Y-m-d H:i:s');
                                            $connection = $this->connect();
                                            $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                                            $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);
                                            
                                            if ($data['userType'] == "Patient") {
                                                // $returnMsg = "patient";
                                                // $returnUserUniqueId = $data['userUniqueId'];
                                                // $returnData = ["returnMsg" => $returnMsg, "returnUserUniqueId" => $returnUserUniqueId];
                                                // return $returnData;
                                                $this->setUserInfo($data);
                                                return "patient";
                                            } else if ($data['userType'] == "Guest") {
                                                $this->setUserInfo($data);
                                                return "guest";
                                            } else if ($data['userType'] == "Admin") {
                                                $this->setUserInfo($data);
                                                return "admin";
                                            } else {
                                                return "No account";
                                                // return "Not patient";
                                            }
                                        } else {
                                            return "Your account was temperorarily disabled for 15 days due to COVID-19 symptoms found on your last Health Declaration Form.";
                                        } 
                                    } else {
                                        return "Your account is not yet verified. Please check your email address to verify your account.";
                                    } 
                                } else {
                                    return "No Account Found!";
                                }
                            }  
                        } else {
                           return "Incorrect Username or Password!";
                        }
                    } else {
                        return "Please Insert Password!";
                    }
                } else {
                    return "Please Insert Username!";
                }
            } else {
                return "Please Insert Username and Password!";
            }

            $this->disconnect(); 
        }

        public function setUserInfo($data) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['userInfo'] = array(
                "userId" => $data['userId'], 
                "userUniqueId" => $data['userUniqueId'], 
                "userType" => $data['userType'], 
                "userFName" => $data['userFName'], 
                "userMI" => $data['userMI'], 
                "userLName" => $data['userLName'],
                "userAddress" => $data['userAddress'], 
                "userBDay" => $data['userBDay'], 
                "userAge" => $data['userAge'], 
                "userGender" => $data['userGender'],
                "userContact" => $data['userContact'],
                "userEmail" => $data['userEmail'],
                "userUsername" => $data['userUsername'],
                "userPassword" => $data['userPassword'],
                "userMab" => $data['userMab'],
                "userDateCreated" => $data['userDateCreated']
            );
    
            return $_SESSION['userInfo'];
        }
    
        public function getUserInfo() {
            if (!isset($_SESSION)) {
                session_start();
            }
    
            if (isset($_SESSION['userInfo'])) {
                return $_SESSION['userInfo'];
            } 
            
            // elseif (!isset($_SESSION['userInfo'])) {
            //     header('location: index.php');
            // }
            

            else {
                return null;
            }
            
        }

        public function signOut($userUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("UPDATE users SET userMab = ? WHERE userUniqueId = ?");
            $stmt->execute(["", $userUniqueId]);

            if ($stmt) {
                if(!isset($_SESSION)) {
                    session_start();
                    session_destroy();
                }
                
                $_SESSION['userInfo'] = null;
                unset($_SESSION['userInfo']);
            }
            
        }

        public function userChangePass($userUniqueId, $userCurrentPass, $userCurPassword, $userPassword, $userCPassword) {

            if ($userCurrentPass == $userCurPassword) {
                if ($userPassword == $userCPassword) {

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE users SET userPassword = ?, userCPassword = ? WHERE userUniqueId = ?");
                    $stmt->execute([$userPassword, $userCPassword, $userUniqueId]);

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Change Password";
                        // $connection = $this->connect();
                        // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                        // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                        date_default_timezone_set('Asia/Manila');
                        $activityDateCreated = date('Y-m-d H:i:s');
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                        if ($stmt) { 
                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
                            $stmt->execute([$userUniqueId]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();
    
                            if($datacount > 0) {
                                $this->setUserInfo($data);
                                return "success";
                            } else {
                                return false;
                            }
                        }
                        
                    }
                } else {
                    return "New password did not match!";
                }
            } else {
                return "Your current password did not match!";
            }

            $this->disconnect();

        }

        public function adminChangePass($adminUniqueId, $adminCurrentPass, $adminCurPassword, $adminPassword, $adminCPassword) {

            if ($adminCurrentPass == $adminCurPassword) {
                if ($adminPassword == $adminCPassword) {

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE users SET userPassword = ?, userCPassword = ? WHERE userUniqueId = ?");
                    $stmt->execute([$adminPassword, $adminCPassword, $adminUniqueId]);

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Change Password";
                        // $connection = $this->connect();
                        // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                        // $stmt->execute([$activityUniqueId, $adminUniqueId, $activityDone]);
                        date_default_timezone_set('Asia/Manila');
                        $activityDateCreated = date('Y-m-d H:i:s');
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $adminUniqueId, $activityDone, $activityDateCreated]);

                        if ($stmt) {
                            $connection = $this->connect();
                            $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
                            $stmt->execute([$adminUniqueId]);
                            $data = $stmt->fetch(); 
                            $datacount = $stmt->rowCount();

                            if($datacount > 0) {
                                $this->setUserInfo($data);
                                return "success";
                            } else {
                                return false;
                            }
                        }
                    }
                } else {
                    return "New password did not match!";
                }
            } else {
                return "Your current password did not match!";
            }

            $this->disconnect();

        }

        public function userUpdateProfile($userUniqueId, $updateUserFName, $updateUserLName, $updateUserMI, $updateUserAddress, $updateUserBDay, $updateUserAge, $updateUserGender, $updateContactNo, $updateUserEmail) {

            if ($this->updatePCheckE($updateUserEmail, $userUniqueId) == 0) {

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userFName = ?, userMI = ?, userLName = ?, userAddress = ?, userBDay = ?, userAge = ?, userGender = ?, userContact = ?, userEmail = ? WHERE userUniqueId = ?");
                $stmt->execute([$updateUserFName, $updateUserMI, $updateUserLName, $updateUserAddress, $updateUserBDay, $updateUserAge, $updateUserGender, $updateContactNo, $updateUserEmail, $userUniqueId]);

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update Profile";
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {
                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
                        $stmt->execute([$userUniqueId]);
                        $data = $stmt->fetch(); 
                        $datacount = $stmt->rowCount();
    
                        if($datacount > 0) {
                            $this->setUserInfo($data);
                            return "success";
                        } else {
                            return false;
                        }
                    }
                    
                }
            } else {
                return "New email already exists!";
            }
            
            $this->disconnect();

        }

        public function adminUpdateProfile($adminUniqueId, $adminFirstName, $adminLastName, $adminMiddle, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail) {
            
            if ($this->updatePCheckE($adminEmail, $adminUniqueId) == 0) {

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userFName = ?, userMI = ?, userLName = ?, userAddress = ?, userBDay = ?, userAge = ?, userGender = ?, userContact = ?, userEmail = ? WHERE userUniqueId = ?");
                $stmt->execute([$adminFirstName, $adminMiddle, $adminLastName, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail, $adminUniqueId]);

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update Profile";
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $adminUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $adminUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {   
                        $connection = $this->connect();
                        $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
                        $stmt->execute([$adminUniqueId]);
                        $data = $stmt->fetch(); 
                        $datacount = $stmt->rowCount();

                        if($datacount > 0) {
                            $this->setUserInfo($data);
                            return "success";
                        } else {
                            return false;
                        }
                    }
                }
            } else {
                return "New email already exists!";
            }

            $this->disconnect();

        }

        public function updateAdminProfile($userUniqueId, $adminUniqueId, $adminFirstName, $adminLastName, $adminMiddle, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail) {
            
            if ($this->updatePCheckE($adminEmail, $adminUniqueId) == 0) {

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userFName = ?, userMI = ?, userLName = ?, userAddress = ?, userBDay = ?, userAge = ?, userGender = ?, userContact = ?, userEmail = ? WHERE userUniqueId = ?");
                $stmt->execute([$adminFirstName, $adminMiddle, $adminLastName, $adminAddress, $adminBirthday, $adminAge, $adminGender, $adminContactNo, $adminEmail, $adminUniqueId]);

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Update Profile of " . $adminFirstName . " " . $adminLastName;
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {
                        return "success";
                    }
                    
                }
            } else {
                return "New email already exists!";
            }
            
            $this->disconnect();

        }

        public function updateAdminPass($userUniqueId, $adminFullName, $adminUniqueId, $adminPassword, $adminCPassword) {

            if ($adminPassword == $adminCPassword) {

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userPassword = ?, userCPassword = ? WHERE userUniqueId = ?");
                $stmt->execute([$adminPassword, $adminCPassword, $adminUniqueId]);

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Set New Password for " . $adminFullName;
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {
                        return "success";
                    }
                    
                }
            } else {
                return "New password did not match!";
            }
           
            $this->disconnect();

        }

        public function getAdminAccounts($userUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userDel = ? AND userType = ? AND userUniqueId != ? ORDER BY userId DESC");
            $stmt->execute([0, "Admin", $userUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
            $questionCounter = $datacount;
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-primary btn-flat fs-5" href="index.php?route=manage-accounts&action=edit-account&uid='.$data['userUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update User Profile" onmouseover="mouseOver()">
                            <i class="fa-solid fa-user-pen p-1"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-flat fs-5 deleteAABtn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete User Profile" onmouseover="mouseOver()">
                            <i class="fa-solid fa-user-xmark p-1"></i>
                        </button>
                    </div>';

                    $arrayDatas[] = array(
                        "userId" => $questionCounter,
                        "userUniqueId" => $data['userUniqueId'],
                        "userFullName" => $data['userFName'] . " " .  $data['userLName'],
                        "action" => $actions
                    );
                    $questionCounter--;
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            $this->disconnect(); 
        }

        public function getAdminAccountInfos($adminUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
            $stmt->execute([$adminUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
            
            $this->disconnect(); 
    
        }

        public function deleteAdminAccount() {

            if (isset($_POST['deleteAABtn'])) {
                $deleteUserUniqueId = $_POST['deleteUserUniqueId'];
                $userUniqueId = $_POST['userUniqueId'];
                $adminFullName = $_POST['adminFullName'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE users SET userDel = ? WHERE userUniqueId = ?");
                $stmt->execute([1, $deleteUserUniqueId]);

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete Account of " . $adminFullName;
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {
                        echo "<script>
                            swal('Success!', 'Deleted successfully!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                }
            }

            $this->disconnect(); 
    
        }

        public function getHealthDec() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM questions");
            // questions.*, choices.* FROM questions LEFT JOIN choices ON questions.questionUniqueId = choices.questionUniqueId
            $stmt->execute();
            $questionsDatas = $stmt->fetchAll(); 
            $questionDatacount = $stmt->rowCount();
            $output = "";
            $questionCounter = 1;
            if($questionDatacount > 0) {
                foreach ($questionsDatas as $questionData) {
                    $output .= 
                    '<div class="p-3">
                        <input type="text" name="" value="'.$questionData['questionUniqueId'].'">
                        <h6 class="text-white mb-3">'.$questionCounter.". ".$questionData['questionText'].'</h6>
                    </div>';

                    $question = $questionData['questionText'];
                    $stmt = $connection->prepare("SELECT * FROM choices WHERE questionUniqueId = ?");
                    $stmt->execute([$questionData['questionUniqueId']]);
                    $choiceDatas = $stmt->fetchAll(); 
                    $choicesDatacount = $stmt->rowCount();

                    if($choicesDatacount > 0) {
                        foreach ($choiceDatas as $choiceData) {

                            if ($questionData['questionType'] == 1) {
                                $output .= 
                                '<div class="vstack gap-1 px-5 text-white">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="answersQT1" name="answersQT1[]" value="1">
                                        <label class="form-check-label" for="answersQT1">
                                            '.$choiceData['choiceText'].'
                                        </label>
                                    </div>
                                </div>';
                            } else if ($questionData['questionType'] == 2) {
                                $output .= 
                                '<div class="text-white d-inline-block">
                                    <div class="form-check mx-5">
                                        <input class="form-check-input" type="checkbox" id="question2Choice1" name="answersQT2[]" value="21">
                                        <label class="form-check-label" for="question2Choice1">'.$choiceData['choiceText'].'</label>
                                    </div>
                                </div>';
                            }
                        
                        }
                    }
                    $questionCounter++;
                }
                return $output;
            } 
            
            // else {
            //     return false;
            // }

            $this->disconnect(); 
    
        }

        public function getHealthDecQuestions() {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM questions WHERE questionDel = ?");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();

            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        
        public function getHealthDecChoices($questionUniqueId) {
            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM choices WHERE questionUniqueId = ?");
            $stmt->execute([$questionUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();

            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        public function submitHealthDec($declarationUniqueId, $userUniqueId, $userType, $questionsUniqueIds, $questionsType, $answersQT1, $answersQT2, $userComorbidity, $otherUserComorbidity, $userTemperature, $declarationDateCreated) {
            
            foreach ($questionsUniqueIds as $index => $questionsUniqueId) {
                $saveQuestion = $questionsUniqueId;
                // $questionUniqueId = $questionsUniqueId[$index];
                $questionType = $questionsType[$index];
               
                
                if ($questionType == 1) {  $answersCounter = 0;
                    foreach ($answersQT1 as $answerQT1) {
                        $saveAnswerQT1 = $answerQT1;

                        // if (substr($saveAnswerQT1,-4) == "None") {
                        //     $answersCounter = 0;
                        // } else {
                        //     $answersCounter++;
                        // }
                        
                        if (substr($saveAnswerQT1,0,21) == $saveQuestion) {

                            if (substr($saveAnswerQT1,-4) == "None") {
                                $answersCounter = 0;
                                $saveAnswerQT1 = substr($saveAnswerQT1,21,-4);
                            } else {
                                $answersCounter++;
                                $saveAnswerQT1 = substr($saveAnswerQT1,21);
                            }
    
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO answers (declarationUniqueId, questionUniqueId, choiceUniqueId, answerDateCreated) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$declarationUniqueId, $saveQuestion, $saveAnswerQT1, $declarationDateCreated]);
                        }
                    }
                } else {
                    foreach ($answersQT2 as $answerQT2) {
                        $saveAnswerQT2 = $answerQT2;
                        
                        // if (substr($saveAnswerQT2,-3) == "Yes") {
                        //     $answersCounter++;
                        // } 

                        if (substr($saveAnswerQT2,0,21) == $saveQuestion) {
                            // $saveAnswerQT2 = substr($saveAnswerQT2, 21,-3);

                            if (substr($saveAnswerQT2,-3) == "Yes") {
                                $answersCounter++;
                                $saveAnswerQT2 = substr($saveAnswerQT2,21,-3);
                            } else {
                                $saveAnswerQT2 = substr($saveAnswerQT2,21);
                            }

                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO answers (declarationUniqueId, questionUniqueId, choiceUniqueId, answerDateCreated) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$declarationUniqueId, $saveQuestion, $saveAnswerQT2, $declarationDateCreated]);
                        }
                        
                    }
                }
                
            }

            if ($userComorbidity == "Other") {
                $userComorbidity = $otherUserComorbidity;
            }

            if ($userComorbidity !== "None") {
                $answersCounter++;
            }

            if ($userTemperature >= 38) {
                $answersCounter++;
            }

            if ($answersCounter > 0) {
                $declarationResult = "Positive";
            } else {
                $declarationResult = "Negative";
            }

            $connection = $this->connect();
            $stmt = $connection->prepare("INSERT INTO declarations (declarationUniqueId, userUniqueId, userComorbidity, userTemperature, declarationPoints, declarationResult, declarationDateCreated) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$declarationUniqueId, $userUniqueId, $userComorbidity, $userTemperature, $answersCounter, $declarationResult, $declarationDateCreated]);

            if ($stmt) {
                $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                $activityDone = "Submit Health Declaration Form";
                // $connection = $this->connect();
                // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                date_default_timezone_set('Asia/Manila');
                $activityDateCreated = date('Y-m-d H:i:s');
                $connection = $this->connect();
                $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                if ($answersCounter > 0) {

                    date_default_timezone_set('Asia/Manila');
                    $dateNow = date('Y-m-d');
                    $dateNowPlusFifteenDays = date_create($dateNow);
                    date_add($dateNowPlusFifteenDays, date_interval_create_from_date_string("15 days"));
                    $userAccountUnholdDate = date_format($dateNowPlusFifteenDays, "Y-m-d");

                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE users SET userAccountHold = ?, userAccountUnholdDate = ?  WHERE userUniqueId = ?");
                    $stmt->execute([1, $userAccountUnholdDate, $userUniqueId]);

                    if ($stmt) {
                        return "failed";
                    }
                } else {
                    if ($userType == "Patient") {
                        $data = array(
                            'returnMessage' => "success_patient",
                            'declarationUniqueId' => $declarationUniqueId
                        );
                        return $data;
                    } else if ($userType == "Guest") {
                        return "success_guest";
                    } else {
                        return "success";
                    }
                }
            }

            $this->disconnect(); 
    
        }

        public function generateQueueNo($queueUniqueId, $declarationUniqueId, $userBuildingUID, $userBuilding, $dataAgreement, $queueDateCreated) {

            if (!empty($declarationUniqueId)) {
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE declarations SET declarationAgreement = ? WHERE declarationUniqueId = ?");
                $stmt->execute([$dataAgreement, $declarationUniqueId]);
    
                if ($stmt) {
    
                    $connection = $this->connect();
                    $stmt = $connection->prepare("SELECT * FROM queueing WHERE queueBuilding = ? ORDER BY queueNo DESC LIMIT 1");
                    $stmt->execute([$userBuilding]);
                    $datas = $stmt->fetchAll(); 
                    $datacount = $stmt->rowCount();
    
                    if($datacount > 0) {
                        foreach ($datas as $data) { 
                            $queueNo = $data['queueNo'] + 1;
                        }
                    } else {
                        $queueNo = 1;
                    }
    
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO queueing (queueUniqueId, declarationUniqueId, buildingUniqueId, queueBuilding, queueNo, queueDate) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$queueUniqueId, $declarationUniqueId, $userBuildingUID, $userBuilding, $queueNo, $queueDateCreated]);
    
                    if ($stmt) {
                        // $data = array()
                        // return "success".$userBuilding.$queueNo;

                        $data = array(
                            'returnMessage' => "success",
                            'buildingNo' => $userBuilding,
                            'queueNo' => $queueNo,
                            'declarationUniqueId' => $declarationUniqueId
                        );
                
                        return $data;
                    }
                
                    
                }
            } else {
                return "failed";
            }
            

            $this->disconnect(); 
    
        }

        public function addBuilding($buildingUniqueId, $userUniqueId, $buildingName, $buildingQRLink, $buildingDateCreated) {

            if (!empty($buildingName)) {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT buildingName FROM building WHERE buildingName = ?");
                $stmt->execute([$buildingName]);
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return "Building is already exists!";
                } else {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO building (buildingUniqueId, buildingName, buildingQRLink, buildingDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$buildingUniqueId, $buildingName, $buildingQRLink, $buildingDateCreated]);
                    
                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Add New Building";
                        // $connection = $this->connect();
                        // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                        // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                        date_default_timezone_set('Asia/Manila');
                        $activityDateCreated = date('Y-m-d H:i:s');
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                        if ($stmt) {
                            return "success";
                        }
                        
                    }
                }
                
            } else {
                return "Please filled up all fields!";
            }
                
            $this->disconnect(); 
    
        }

        public function getBuilding() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM building");
            $stmt->execute();
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
            
            $this->disconnect(); 
    
        }

        public function getBuildingMyMab($myMab) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM building WHERE buildingName = ?");
            $stmt->execute([$myMab]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
            
            $this->disconnect(); 
    
        }

        public function getBuildings() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM building WHERE buildingDel = ? ORDER BY buildingId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
            $buildingCounter = $datacount;
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        
                        <button type="button" class="btn btn-danger btn-flat fs-5 deleteBBtn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Building" onmouseover="mouseOver()">
                            <i class="fa-solid fa-trash-can p-1"></i>
                        </button>
                    </div>';

                    // <button type="button" class="btn btn-primary btn-flat fs-5 updateBBtn">
                    //     <i class="fa-solid fa-pen-to-square p-1"></i>
                    // </button>

                    $arrayDatas[] = array(
                        "buildingNo" => $buildingCounter,
                        "buildingUniqueId" => $data['buildingUniqueId'],
                        "buildingName" => $data['buildingName'],
                        "actions" => $actions
                    );
                    $buildingCounter--;
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            // else {
            //     return false;
            // }

            $this->disconnect(); 
    
        }

        public function deleteBuilding() {

            if (isset($_POST['deleteBBtn'])) {
                $deleteBuildingUniqueId = $_POST['deleteBuildingUniqueId'];
                $userUniqueId = $_POST['userUniqueId'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE building SET buildingDel = ? WHERE buildingUniqueId = ?");
                $stmt->execute([1, $deleteBuildingUniqueId]);

                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete Building";
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {
                        echo "<script>
                            swal('Success!', 'Deleted successfully!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                }
                
            }

            $this->disconnect(); 
    
        }

        public function addQuestion($questionUniqueId, $userUniqueId, $question, $choices, $questionType, $questionDateCreated) {

            if (!empty($question) && !empty($choices)) {
                
                foreach ($choices as $choice) {
                    $saveChoice = $choice;
                }

                if (!empty($saveChoice)) {

                    if ($questionType == "d60ecb9edcdfd8ab0222ddd158bbbdc3") {
                        $questionType = 1;
                        $newChoices[] = array_push($choices, "None of the Above"); 
                        $choices[] = array_pop($choices);
                    } else if ($questionType == "c310d750ebfc431206b6585aafbbb56f") {
                        $questionType = 2;
                    }

                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO questions (questionUniqueId, questionType, questionText, questionDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$questionUniqueId, $questionType, $question, $questionDateCreated]);
                    $choiceCounter = 1;
                    
                    if ($stmt) {

                        foreach ($choices as $choice) {
                            date_default_timezone_set('Asia/Manila');
                            $choiceUniqueId = "C-".date("ymd").substr(md5(uniqid(mt_rand() . time(), true)), 0, 13);

                            $saveChoice = $choice;
    
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO choices (choiceUniqueId, questionUniqueId, choiceNum, choiceText, choiceCreated) VALUES (?, ?, ?, ?, ?)");
                            $stmt->execute([$choiceUniqueId, $questionUniqueId, $choiceCounter, $saveChoice, $questionDateCreated]); 
                            
                            $choiceCounter++;
                        }
    
                        if ($stmt) {
                            $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                            $activityDone = "Add New Question";
                            // $connection = $this->connect();
                            // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                            // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                            date_default_timezone_set('Asia/Manila');
                            $activityDateCreated = date('Y-m-d H:i:s');
                            $connection = $this->connect();
                            $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                            $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                            if ($stmt) {
                                return "success";
                            }
                            
                        }
                        
                    }
                } else {
                    return "Please filled up all fields!";
                }
                
            } else {
                return "Please filled up all fields!";
            }

            $this->disconnect(); 
    
        }

        public function getQuestions() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM questions WHERE questionDel = ? ORDER BY questionId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
            $questionCounter = $datacount;
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-primary btn-flat fs-5" href="index.php?route=questions&action=edit-question&qid='.$data['questionUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Question" onmouseover="mouseOver()">
                            <i class="fa-solid fa-pen-to-square p-1"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-flat fs-5 deleteQBtn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Question" onmouseover="mouseOver()">
                            <i class="fa-solid fa-trash-can p-1"></i>
                        </button>
                    </div>';

                    $arrayDatas[] = array(
                        "questionNo" => $questionCounter,
                        "questionUniqueId" => $data['questionUniqueId'],
                        "questionText" => $data['questionText'],
                        "actions" => $actions
                    );
                    $questionCounter--;
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            // else {
            //     return false;
            // }

            $this->disconnect(); 
    
        }

        public function getQuestionsEdit($questionUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT questions.*, choices.* FROM questions LEFT JOIN choices ON questions.questionUniqueId = choices.questionUniqueId WHERE questions.questionUniqueId = ?");
            $stmt->execute([$questionUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
            
            $this->disconnect(); 
    
        }

        public function editQuestion($editQuestionUniqueId, $userUniqueId, $editChoicesId, $editQuestion, $editChoices) {

            // foreach ($choices as $choice) {
            //     $saveChoice = $choice;
            // }

            // if (!empty($saveChoice)) {
                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE questions SET questionText = ? WHERE questionUniqueId = ?");
                $stmt->execute([$editQuestion, $editQuestionUniqueId]);

                if ($stmt) {

                    foreach ($editChoicesId as $index => $editChoiceId) {
                        $saveChoiceId = $editChoiceId;
                        $saveChoice = $editChoices[$index];

                        $connection = $this->connect();
                        $stmt = $connection->prepare("UPDATE choices SET choiceText = ? WHERE choiceId = ?");
                        $stmt->execute([$saveChoice, $saveChoiceId]); 
                        
                    }

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Update Question";
                        // $connection = $this->connect();
                        // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                        // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                        date_default_timezone_set('Asia/Manila');
                        $activityDateCreated = date('Y-m-d H:i:s');
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                        if ($stmt) {
                            return "success";
                        }
                        
                    }
                    
                }
            // } else {
            //     return "Please filled up all fields!";
            // }
           
            $this->disconnect(); 
    
        }

        public function deleteQuestion() {

            if (isset($_POST['deleteQBtn'])) {
                $deleteQuestionUniqueId = $_POST['deleteQuestionUniqueId'];
                $userUniqueId = $_POST['userUniqueId'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE questions SET questionDel = ? WHERE questionUniqueId = ?");
                $stmt->execute([1, $deleteQuestionUniqueId]);

                if ($stmt) {
                    $connection = $this->connect();
                    $stmt = $connection->prepare("UPDATE choices SET choiceDel = ? WHERE questionUniqueId = ?");
                    $stmt->execute([1, $deleteQuestionUniqueId]);

                    if ($stmt) {
                        $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                        $activityDone = "Delete Question";
                        // $connection = $this->connect();
                        // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                        // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                        date_default_timezone_set('Asia/Manila');
                        $activityDateCreated = date('Y-m-d H:i:s');
                        $connection = $this->connect();
                        $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                        if ($stmt) {
                            echo "<script>
                                swal('Success!', 'Deleted successfully!', 'success').then(function() {
                                    window.location = document.referrer;
                                });
                            </script>";
                        }
                    }
                }
            }

           
            $this->disconnect(); 
    
        }

        public function deleteDeclarationForm() {

            if (isset($_POST['deleteHDFBtn'])) {
                $deleteHDFUniqueId = $_POST['deleteHDFUniqueId'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE declarations SET declarationDel = ? WHERE declarationUniqueId = ?");
                $stmt->execute([1, $deleteHDFUniqueId]);

                if ($stmt) {
                    echo "<script>
                        swal('Success!', 'Deleted successfully!', 'success').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }
            }

           
            $this->disconnect(); 
    
        }

        public function deleteContactUs() {

            if (isset($_POST['deleteCUBtn'])) {
                $deleteContactUniqueId = $_POST['deleteContactUniqueId'];
                $userUniqueId = $_POST['userUniqueId'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE contactus SET contactusDel = ? WHERE contactusUniqueId = ?");
                $stmt->execute([1, $deleteContactUniqueId]);


                if ($stmt) {
                    $activityUniqueId = md5(uniqid(mt_rand() . time(), true));
                    $activityDone = "Delete Contact Us";
                    // $connection = $this->connect();
                    // $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone) VALUES (?, ?, ?)");
                    // $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone]);
                    date_default_timezone_set('Asia/Manila');
                    $activityDateCreated = date('Y-m-d H:i:s');
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO activities (activityUniqueId, userUniqueId, activityDone, activityDateCreated) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$activityUniqueId, $userUniqueId, $activityDone, $activityDateCreated]);

                    if ($stmt) {
                        echo "<script>
                            swal('Success!', 'Deleted successfully!', 'success').then(function() {
                                window.location = document.referrer;
                            });
                        </script>";
                    }
                }

            }

            $this->disconnect(); 
    
        }

        public function deleteActivityLog() {

            if (isset($_POST['deleteALBtn'])) {
                $deleteActivityUniqueId = $_POST['deleteActivityUniqueId'];
                $userUniqueId = $_POST['userUniqueId'];

                $connection = $this->connect();
                $stmt = $connection->prepare("UPDATE activities SET activityDel = ? WHERE activityUniqueId = ?");
                $stmt->execute([1, $deleteActivityUniqueId]);

                if ($stmt) {
                    echo "<script>
                        swal('Success!', 'Deleted successfully!', 'success').then(function() {
                            window.location = document.referrer;
                        });
                    </script>";
                }

            }

            $this->disconnect(); 
    
        }

        public function getHealthDecForms() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, users.* FROM declarations LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE declarationDel = ? ORDER BY declarationId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-success btn-flat fs-5" href="index.php?route=declaration-forms&view='.$data['declarationUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Health Dec Form" onmouseover="mouseOver()">
                            <i class="fa-solid fa-eye p-1"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-flat fs-5 deleteHDFBtn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Health Dec Form" onmouseover="mouseOver()">
                            <i class="fa-solid fa-trash-can p-1"></i>
                        </button>
                    </div>';

                    $arrayDatas[] = array(
                        "declarationId" => $data['declarationId'],
                        "declarationUniqueId" => $data['declarationUniqueId'],
                        "userFullName" => $data['userFName'] . " " . $data['userLName'],
                        "userType" => $data['userType'],
                        "declarationResult" => $data['declarationResult'],
                        "declarationDateCreated" => date('m/d/Y h:i a', strtotime($data['declarationDateCreated'])),
                        "actions" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            // else {
            //     return false;
            // }

            $this->disconnect(); 
    
        }

        public function getHealthDecFormsReport() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, users.* FROM declarations LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE declarationDel = ? ORDER BY declarationId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-success btn-flat fs-5" href="index.php?route=declaration-forms-report&view='.$data['declarationUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Health Dec Form" onmouseover="mouseOver()">
                            <i class="fa-solid fa-eye p-1"></i>
                        </a>
                    </div>';

                    $arrayDatas[] = array(
                        "declarationId" => $data['declarationId'],
                        "userFullName" => $data['userFName'] . " " . $data['userLName'],
                        "userType" => $data['userType'],
                        "declarationResult" => $data['declarationResult'],
                        "declarationDateCreated" => date('m/d/Y h:i a', strtotime($data['declarationDateCreated'])),
                        "actions" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            $this->disconnect(); 
    
        }

        public function getMyHealthDecForms($userUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, users.* FROM declarations LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE declarations.userUniqueId = ? ORDER BY declarationId DESC");
            $stmt->execute([$userUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-success btn-flat fs-5" href="index.php?route=my-settings&action=my-hdf&view='.$data['declarationUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Health Dec Form" onmouseover="mouseOver()">
                            <i class="fa-solid fa-eye p-1"></i>
                        </a>
                    </div>';

                    $arrayDatas[] = array(
                        "declarationId" => $data['declarationId'],
                        "userFullName" => $data['userFName'] . " " . $data['userLName'],
                        "declarationResult" => $data['declarationResult'],
                        "declarationDateCreated" => date('m/d/Y h:i a', strtotime($data['declarationDateCreated'])),
                        "action" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            // else {
            //     return false;
            // }

            $this->disconnect(); 
    
        }

        public function getDeclarationForm($declarationUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, answers.*, questions.*, choices.*, users.*, queueing.* FROM declarations LEFT JOIN answers ON declarations.declarationUniqueId = answers.declarationUniqueId LEFT JOIN questions ON answers.questionUniqueId = questions.questionUniqueId LEFT JOIN choices ON questions.questionUniqueId = choices.questionUniqueId LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId LEFT JOIN queueing ON declarations.declarationUniqueId = queueing.declarationUniqueId WHERE answers.choiceUniqueId = choices.choiceUniqueId AND declarations.declarationUniqueId = ?");
            $stmt->execute([$declarationUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
            
            $this->disconnect(); 
    
        }

        public function getDeclarationFormReport() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT questions.*, choices.* FROM questions LEFT JOIN choices ON questions.questionUniqueId = choices.questionUniqueId");
            $stmt->execute();
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
            
            $this->disconnect(); 
    
        }

        public function getQueues($buildingUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT queueing.*, declarations.*, users.* FROM queueing LEFT JOIN declarations ON queueing.declarationUniqueId = declarations.declarationUniqueId LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE buildingUniqueId = ? ORDER BY queueNo DESC");
            $stmt->execute([$buildingUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-success btn-flat fs-5" href="index.php?route=queues&view='.$data['declarationUniqueId'].'&vbuid='.$data['buildingUniqueId'].'&bn='.$data['queueBuilding'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Health Dec Form" onmouseover="mouseOver()">
                            <i class="fa-solid fa-eye p-1"></i>
                        </a>
                        
                    </div>';

                    // <button type="button" class="btn btn-danger btn-flat fs-5 deleteFBtn">
                    //     <i class="fa-solid fa-trash-can p-1"></i>
                    // </button>

                    $arrayDatas[] = array(
                        "declarationId" => $data['declarationId'],
                        "userFullName" => $data['userFName'] . " " . $data['userLName'],
                        "declarationDateCreated" => date('m/d/Y h:i a', strtotime($data['declarationDateCreated'])),
                        "action" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];
            return $json_data;

            $this->disconnect(); 
    
        }

        public function submitContactUs($contactUsUniqueId, $userFirstName, $userLastName, $userContact, $userEmail, $userMessage, $contactusDateCreated) {

            if (!empty($userFirstName) && !empty($userLastName) && !empty($userContact) && !empty($userEmail) && !empty($userMessage)) {
                if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                   
                    $connection = $this->connect();
                    $stmt = $connection->prepare("INSERT INTO contactus (contactusUniqueId, contactusFName, contactusLName, contactusContact, contactusEmail, contactusMessage, contactusDateCreated) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$contactUsUniqueId, $userFirstName, $userLastName, $userContact, $userEmail, $userMessage, $contactusDateCreated]);

                    if ($stmt) {
                        return "success";
                    }

                } else {
                    return $userEmail . " is invalid email format!";
                }
            } else {
                return "Please filled up all fields!";
            }

            $this->disconnect(); 
    
        }

        public function getContactUs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM contactus WHERE contactusDel = ? ORDER BY contactusId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <button type="button" class="btn btn-danger btn-flat fs-5 deleteCUBtn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Contact Us" onmouseover="mouseOver()">
                            <i class="fa-solid fa-trash-can p-1"></i>
                        </button>
                    </div>';

                    $arrayDatas[] = array(
                        "contactusId" => $data['contactusId'],
                        "contactusUniqueId" => $data['contactusUniqueId'],
                        "contactusFullName" => $data['contactusFName'] . " " . $data['contactusLName'],
                        "contactusContact" => $data['contactusContact'],
                        "contactusEmail" => $data['contactusEmail'],
                        "contactusMessage" => $data['contactusMessage'],
                        "contactusDateCreated" => date('m/d/Y h:i a', strtotime($data['contactusDateCreated'])),
                        "action" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];
            return $json_data;

            $this->disconnect(); 
    
        }

        public function getActivityLogs() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT activities.*, users.* FROM activities LEFT JOIN users ON activities.userUniqueId = users.userUniqueId WHERE activityDel = ? ORDER BY activityId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <button type="button" class="btn btn-danger btn-flat fs-5 deleteALBtn">
                            <i class="fa-solid fa-trash-can p-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete History Log" onmouseover="mouseOver()"></i>
                        </button>
                    </div>';

                    $arrayDatas[] = array(
                        "historyId" => $data['activityId'],
                        "historyUniqueId" => $data['activityUniqueId'],
                        "historyFullName" => $data['userFName'] . " " . $data['userLName'],
                        "historyUserType" => $data['userType'],
                        "historyDone" => $data['activityDone'],
                        "historyDateCreated" => date('m/d/Y h:i a', strtotime($data['activityDateCreated'])),
                        "action" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];
            return $json_data;

            $this->disconnect(); 
    
        }

        public function getHealthDecFormsDash() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, users.* FROM declarations LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE declarationDel = ? ORDER BY declarationId DESC");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        public function getPositiveHealthDecFormsDash() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, users.* FROM declarations LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE declarationDel = ? AND declarationResult = ? ORDER BY declarationId DESC");
            $stmt->execute([0, "Positive"]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
            $positiveCounter = $datacount;
            
            if ($datacount > 0) {
                foreach ($datas as $data) { 

                    $arrayDatas[] = array(
                        "declarationId" => $positiveCounter,
                        "userFullName" => $data['userFName'] . " " .  $data['userLName'],
                        "userType" => $data['userType'],
                        "declarationResult" => $data['declarationResult'],
                        "declarationDateCreated" => date('m/d/Y h:i a', strtotime($data['declarationDateCreated'])),
                        "userAddress" => $data['userAddress']
                    );

                    $positiveCounter--;
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];
            return $json_data;

            $this->disconnect(); 
        }

        public function getNegativeHealthDecFormsDash() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT declarations.*, users.* FROM declarations LEFT JOIN users ON declarations.userUniqueId = users.userUniqueId WHERE declarationDel = ? AND declarationResult = ? ORDER BY declarationId DESC");
            $stmt->execute([0, "Negative"]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
            $positiveCounter = $datacount;
            
            if ($datacount > 0) {
                foreach ($datas as $data) { 

                    $arrayDatas[] = array(
                        "declarationId" => $positiveCounter,
                        "userFullName" => $data['userFName'] . " " .  $data['userLName'],
                        "userType" => $data['userType'],
                        "declarationResult" => $data['declarationResult'],
                        "declarationDateCreated" => date('m/d/Y h:i a', strtotime($data['declarationDateCreated'])),
                        "userAddress" => $data['userAddress']
                    );

                    $positiveCounter--;
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];
            return $json_data;

            $this->disconnect(); 
        }

        public function getHealthDecFormsSevenDaysDash() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT DATE_FORMAT(declarationDateCreated, '%b. %d, %Y') as healthDecDays, count(declarationDateCreated) as healthDecTotalDays FROM declarations WHERE declarationDel = ? GROUP BY DATE_FORMAT(declarationDateCreated, '%M %d, %Y') ORDER BY declarationId DESC LIMIT 7");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        public function getAllUsersDash() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userDel = ? AND userVerify = ?");
            $stmt->execute([0, 1]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        public function getAllQuestionsDash() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM questions WHERE questionDel = ?");
            $stmt->execute([0]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        public function getPatientsGuestsDataReport($userUniqueId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userUniqueId = ?");
            $stmt->execute([$userUniqueId]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if ($datacount > 0) {
                return $datas;
            } else {
                return false;
            }
        }

        public function getPatientsDataReport() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userDel = ? AND userType = ? ORDER BY userId DESC");
            $stmt->execute([0, "Patient"]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-success btn-flat fs-5" href="index.php?route=patients-report&view='.$data['userUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View More Patient Data" onmouseover="mouseOver()">
                            <i class="fa-solid fa-eye p-1"></i>
                        </a>
                    </div>';

                    $arrayDatas[] = array(
                        "userId" => $data['userId'],
                        "userFullName" => $data['userFName'] . " " . $data['userLName'],
                        "userDateCreated" => date('m/d/Y h:i a', strtotime($data['userDateCreated'])),
                        "actions" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            $this->disconnect(); 
    
        }

        public function getGuestsDataReport() {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userDel = ? AND userType = ? ORDER BY userId DESC");
            $stmt->execute([0, "Guest"]);
            $datas = $stmt->fetchAll(); 
            $datacount = $stmt->rowCount();
           
            if($datacount > 0) {
                foreach ($datas as $data) { 
                    $actions = 
                    '<div class="justify-content-center hstack gap-2">
                        <a class="btn btn-success btn-flat fs-5" href="index.php?route=patients-report&view='.$data['userUniqueId'].'" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View More Patient Data" onmouseover="mouseOver()">
                            <i class="fa-solid fa-eye p-1"></i>
                        </a>
                    </div>';

                    $arrayDatas[] = array(
                        "userId" => $data['userId'],
                        "userFullName" => $data['userFName'] . " " . $data['userLName'],
                        "userDateCreated" => date('m/d/Y h:i a', strtotime($data['userDateCreated'])),
                        "actions" => $actions
                    );
                }
                
            } 
            
            $json_data['data'] = $arrayDatas ?? [];

            return $json_data;

            $this->disconnect(); 
    
        }

    }

    $class = new allClass();
?>
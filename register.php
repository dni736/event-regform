<?php

$name = $status = $attend = $higher_edu = $phone = $email = $confirm = "";
$name_err = $higher_edu_err = $phone_err = $email_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(empty(trim($_POST["name"]))){
        $name_err = "Пожалуйста, введите Ваше ФИО.";
    }

    if(empty(trim($_POST["higher_edu"]))){
        $higher_edu_err = "Введите ваш ВУЗ.";
    }else{
        $higher_edu = trim($_POST["higher_edu"]);
    }

    if(empty(trim($_POST["phone"]))){
        $phone_err = "Введите ваш телефон.";
    }else{
        $phone = trim($_POST["phone"]);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Введите вашу почту.";
    }else{
        $email = trim($_POST["email"]);
    }

    if (isset($_POST["attend"])) {
      $attend = 1;
    } else {
      $attend = 0;
    }

    if (isset($_POST["confirm"])) {
      $confirm = 1;
    } else {
      $confirm = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          background-color:lightblue;
          width: 100%;
          height: 100%;
        }
        label,h1,p{
          color:#fff;
          font-size: 20px;
        }
        .wrapper{
          width: 100%;
          height: 100%;

        }
        form{
          background-color:rgba(f, f, f, 0.5);
        }

        input{
          border: 1px solid white;
        }
    </style>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="wrapper">

        <section class="form1 cid-rl0Nlyl3vi" id="form1-o">

            <div class="container">
                <div class="row main-row justify-content-center">
                    <div class="col-sm-12 col-lg-8 col-md-6" data-form-type="formoid">
                        <div data-form-alert="" hidden="">Спасибо, что заполнили форму!</div>
                        <!--Form-->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                          <h1 style="color:white; font-size:30px; margin-left:5px;">Регистрация</h1>

                          <p style="color:white; font-size:20px; margin-left:5px;">Пожалуйста, заполните эту форму.</p>

                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>ФИО</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <span class="help-block"><?php echo $name_err; ?></span>
                            </div>

                            <div class="form-group">
                              <label>Статус: </label>
                              <select name="status" onchange="java_script_:show(this.options[this.selectedIndex].value)">
                                <option value="студент" selected="selected">Студент</option>
                                <option value="преподаватель">Преподаватель</option>
                              </select>
                            </div>

                            <div class="form-group" id="hiddenDiv" style="display:none">
                                <label>Хотели бы ли вы выступить на этом мероприятии?</label>
                                <input type="checkbox" name="attend">
                            </div>

                            <div class="form-group" >
                                <label>Вуз</label>
                                <input type="text" name="higher_edu" class="form-control" value="<?php echo $higher_edu; ?>">
                            </div>

                            <div class="form-group" >
                                <label>Телефон</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            </div>

                            <div class="form-group" >
                                <label>Почта</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            </div>


                            <div class="form-group" >
                                <label>Согласие на обработку персональных данных</label>
                                <input type="checkbox" name="confirm">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Зарегистрироваться" name="register">
                            </div>

                            <?php
                              if (isset($_POST["register"])) {
                                  $to      = 'admin@gmail.com';
                                  $subject = 'Данные';
                                  $message = 'Фио: ' . $_POST['name'] . ', Статус: ' . $_POST['status'] . ', Вуз: ' . $_POST['higher_edu'] . ', Телефон: ' . $_POST['phone'] . ', Почта: ' . $_POST['email'] . '.';
                                  $headers = 'From: webmaster@example.com' . "\r\n";

                                  mail($to, $subject, $message, $headers);

                                  $to      = '' . $_POST['email'] . '';
                                  $subject = 'Регистрация';
                                  $message = 'Здравствуйте, ' . $_POST['name']. '! Спасибо за регистрацию! Ждём Вас ....';

                                  mail($to, $subject, $message);

                                  echo '<p style="color:white; font-size:10px; margin-left:10px;">Письма отправлены.</p>';
                              }
                            ?>

                        </form>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-6 text-block">
                        <div class="content-panel">
                            <h2 class="mbr-section-title mbr-fonts-style align-left mbr-white pb-2 display-2">
                                Регистрация</h2>
                            <p class="content-block mbr-fonts-style align-left m-0 display-7">
                                Преподавателей и студентов</p>
                        </div>
                    </div>
                </div>
           </div>
        </section>

    </div>

    <script>
        function show(aval) {
          if (aval == "преподаватель"){
            hiddenDiv.style.display='inline';
            Form.fileURL.focus();
          }
          else{
            hiddenDiv.style.display='none';
          }
        }
    </script>
</body>
</html>

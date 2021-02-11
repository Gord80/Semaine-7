 <?php
 $('#login').blur(function () {
        $.post('../../controler/connexionControler.php', {loginVerify: $(this).val()}, function (data) {
            if (data == 1) {
                $('#loginError').html('Pseudo déja existant');
                $('#loginError').addClass('error');
            } else {
                $('#loginError').html('');
            }
        },
                'HTML');
    });'    
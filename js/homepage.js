window.onload = function(){
    let $body = $('#body');

    let $registerButton = $('#register');
    let $college = $('#college');
    let $firstname = $('#firstname');
    let $surname = $('#surname');
    let $id = $('#id');
    let $email = $('#email');

    $registerButton.click(function(){
        let formData = {
            'firstname': $firstname.val(),
            'surname': $surname.val(),
            'college': $college.val(),
            'id': $id.val(),
            'email': $email.val()
        };
        const styledSwal = swal.mixin({
            confirmButtonClass: 'btn-large green darken-2',
            cancelButtonClass: 'btn-large red darken-4',
            buttonStyling: false
        });
        styledSwal({
            title: 'Confirmation',
            html: '<strong class="light">Please double-check your details below. Press the confirm button if you are sure with your details.</strong>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'CONFIRM',
            cancelButtonText: 'Input again',
            reverseButtons: true
        }).then((result) => {
            if(result.value){
                $.ajax({
                    url: './action/register.php',
                    type: 'post',
                    data: formData,
                    success: function(data){
                        console.log(data);
                        let filename = data.substring(3, data.length);
                        swal({
                            //html: '<img class="responsive-img" src="'+filename+'"><br/><small class="light grey-text">Screenshot this and present this to the on-site registration.</small>',
                            type: 'success',
                            title: 'Congratulations!',
                            html: '<p class="light">You have successfully registered for CSExpo 2k18. Please check your e-mail for the qrcode that you will present to the on-site registration.</p>'
                        });
                        $firstname.val('');
                        $surname.val('');
                        $college.val('');
                        $id.val('');
                        $email.val('');
                    }
                });
            }
        });
    });

    $('select').formSelect();
    window.scrollTo(0, 0);
    let $icons = $('.material-icons');
    let $eyes = $('.eye');
    let $tmrw = $('#tmrw');
    let $hp = $('#home_page');
    let $white = $('.white');
    let $container = $('.con');
    let $title = $('#title');
    let $particlejs = $('#particles-js');
    $tmrw.hide();
    $particlejs.hide();
    $icons.hide();
    $('.parallax').parallax();
    $body.css('overflow-y', 'hidden');
    setTimeout(function() {
        $tmrw.fadeIn(3000);
    }, 1000);
    setTimeout(function() {
        $eyes.addClass('start-blinking');
    }, 5000);
    setTimeout(function() {
        $white.addClass('start-lightning');
    }, 7250);
    setTimeout(function() {
        $eyes.hide();
        $icons.fadeIn(1500);
        $tmrw.attr('src', './images/logo1.png');
        $tmrw.attr('alt', 'logo.jpg');
        $tmrw.css('width', '480px');
        $tmrw.css('height', '480px');
        $tmrw.addClass('responsive-img');
        $body.css('background-color', '#fff');
        $body.css('overflow-y', 'visible');
        $container.css('margin-top', '-240px');
        $container.css('margin-left', '-240px');
        $particlejs.show();
    }, 7750);
};
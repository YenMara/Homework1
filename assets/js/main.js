$(document).ready(function () {
    $('#user-upload').on('submit', function (event) {
        event.preventDefault();
        let isValid = true;

        $('.error').text('').hide();
        $('.form-control').removeClass('border-danger');

        const username = $('#username').val().trim();
        const email = $('#email').val().trim();
        const avatar = $('#avatar')[0].files.length; 

        if (!username) {
            $('#username-error').text('Username is required').show();
            $('#username').addClass('border-danger');
            isValid = false;
        }

        if (!email) {
            $('#email-error').text('Email is required').show();
            $('#email').addClass('border-danger');
            isValid = false;
        } else if (!validateEmail(email)) {
            $('#email-error').text('Invalid email format').show();
            $('#email').addClass('border-danger');
            isValid = false;
        }

        if (avatar === 0) {
            $('#avatar-error').text('Please upload an avatar image').show();
            $('#avatar').addClass('border-danger');
            isValid = false;
        }

        if (!isValid) {
            return;
        }

        let formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('avatar', $('#avatar')[0].files[0]);

        axios.post('/check/user', formData)
            .then(function (response) {
                if (response.data.usernameExists) {
                    $('#username-error').text('Username is already taken').show();
                    $('#username').addClass('border-danger');
                    return;
                }
                if (response.data.emailExists) {
                    $('#email-error').text('Email is already taken').show();
                    $('#email').addClass('border-danger');
                    return;
                }

                $('#user-upload')[0].submit();
            })
            .catch(function (error) {
                alert('Error checking username and email. Please try again.');
            });
    });

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
});

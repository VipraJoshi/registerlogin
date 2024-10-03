<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#inputCountry').change(function (e) {
        e.preventDefault(); 
        let cid = $(this).val();
        $.ajax({
            url: '/getState',
            type: 'POST',
            data: {
                cid: cid,
                _token: '{{ csrf_token() }}' 
            },
            success: function (result) {
                $('#inputState').html(result);
                $('#inputCity').html('<option value="">Select City...</option>');
            },
            error: function (xhr, status, error) {
                console.error(error); 
            }
            })
        })

        
        $('#inputState').change(function (e) {
        e.preventDefault(); 
        let sid = $(this).val();
        $.ajax({
            url: '/getCity',
            type: 'POST',
            data: {
                sid: sid,
                _token: '{{ csrf_token() }}' 
            },
            success: function (result) {
                $('#inputCity').html(result);
            },
            error: function (xhr, status, error) {
                console.error(error); 
            }
            })
        })

        $('#registerform').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/registerstore',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        Swal.fire({
                            title: 'Successfully',
                            type: 'success',
                            showCloseButton: true
                        });

                        window.location.href = "{{ url('/login') }}";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error response
                        Swal.fire({
                            title: 'Please Check Some Error Occured',
                            type: 'error',
                            showCloseButton: true
                        });
                        var proderror = JSON.parse(jqXHR.responseText).errors;

                        $('.error-first_name').html(proderror.first_name ? proderror.first_name[0] : '');
                        $('.error-last_name').html(proderror.last_name ? proderror.last_name[0] : '');
                        $('.error-dob').html(proderror.dob ? proderror.dob[0] : '');
                        $('.error-email').html(proderror.email ? proderror.email[0] : '');
                        $('.error-mobile').html(proderror.mobile ? proderror.mobile[0] : '');
                        $('.error-country').html(proderror.country ? proderror.country[0] : '');
                        $('.error-state').html(proderror.state ? proderror.state[0] : '');
                        $('.error-city').html(proderror.city ? proderror.city[0] : '');
                        $('.error-locality').html(proderror.locality ? proderror.locality[0] : '');
                        $('.error-pincode').html(proderror.pincode ? proderror.pincode[0] : '');
                        $('.error-password').html(proderror.password ? proderror.password[0] : '');

                    }
                });
            })
    })

    function togglePasswordVisibility() {
            var passwordField = document.getElementById('userPassword');
            var eyeIcon = document.getElementById('toggleEye');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';  
                eyeIcon.classList.remove('fa-eye');  
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';  
                eyeIcon.classList.remove('fa-eye-slash'); 
                eyeIcon.classList.add('fa-eye');
            }
        }
</script>
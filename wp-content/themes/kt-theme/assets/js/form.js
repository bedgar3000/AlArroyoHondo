(function($) { 
    "use strict";

    $(document).ready(function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.form-ajax')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', async(event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');

                if (form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();

                    $(form).find('.kt-overlay').toggleClass('d-none');

                    let formData = new FormData(form);
                    
                    let response = await fetch(form_ajax_obj.ajaxurl, {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        console.error(response);
                    }

                    let result = await response.json();

                    $(form).find('.kt-overlay').toggleClass('d-none');

                    if (result.status == 'OK') {
                        // form.innerHTML = alertSuccess({title: 'Mensaje enviado!', body: 'Su mensaje fue enviado exitosamente'});
                        form.innerHTML = alertSuccess(result.message);
                    } else {
                        $(form).find('.errores').html(alertDanger(result.message));
                    }
                }
                
            }, false)
        });

        function alertSuccess(message) {
            var html = `
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">${message.title}</h4>
                <p>${message.body}.</p>
            </div>
            `;

            return html;
        }

        function alertDanger(message) {
            var html = `
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">${message.title}</h4>
                <p>${message.body}.</p>
            </div>
            `;

            return html;
        }


        // $('.form-ajax').on('submit', function (e) {
        //     e.preventDefault();
        //     var id = $(this).attr('id');

        // });
    });
})(jQuery); 
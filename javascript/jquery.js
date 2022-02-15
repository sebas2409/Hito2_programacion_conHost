
    $(function () {
        let boton = $('#boton-registrarse');

        function fade() {
            boton.fadeToggle(900, function () {
                fade();
            });
        }

        fade();
    })


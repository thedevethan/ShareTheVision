<script>
    function hide_password(selector, cible, path)    // La fonction servira a rendre le mot de passe visible ou invisible
    {

        var inputType = $('#password').attr('type')

        $(".password_container " + selector).click(

            function() {

                if (inputType == 'password') {
                    $(cible).attr('type', 'text');
                    this.setAttribute('src', path + 'image/hide.png'); // Change icon to hide
                    inputType = $(cible).attr('type')
                } else {
                    $(cible).attr('type', 'password');
                    this.setAttribute('src', path + 'image/show.png'); // Change icon to show
                    inputType = $(cible).attr('type')
                }

            }

        )

    }
</script>
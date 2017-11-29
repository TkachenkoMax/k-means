$(document).ready(function () {
    const MainController = {
        /**
         * Button initialisation
         */
        initButtons: () => {
            
        },

        /**
         * Events handlers initialisation
         */
        initHandlers: () => {
            $('#km-form').parsley().on('form:submit', function() {
                $.ajax({
                    url: "src/handler.php",
                    data: {
                        dataset: $('#dataset').val(),
                        clusters: $('#clusters').val(),
                        iterations: $('#iterations').val(),
                    },
                    type: 'POST'
                }).done(function(data) {
                    
                });

                return false;
            });
        },

        /**
         * Initialize function.
         *
         * @return void
         */
        init: () => {
            MainController.initButtons();
            MainController.initHandlers();
        }
    };

    MainController.init();
});

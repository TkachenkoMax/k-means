$(document).ready(function () {
    const MainController = {
        /**
         * Chart.
         */
        chart: null,
        
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
                    MainController.initChart(JSON.parse(data));
                });

                return false;
            });
        },

        /**
         * Create chart.
         *
         * @param chartData
         */
        initChart: (chartData) => {
            console.log(chartData);
            const colors = ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Azure","Beige","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];

            MainController.destroyChart();

            const datasets = [];
            const ctx = document.getElementById('chart').getContext('2d');

            $.each(Object.keys(chartData), key => {
                const id = key + 1;
                const color = colors.shift();

                datasets.push({
                    label: 'Cluster #' + id,
                    data: chartData[id],
                    pointBackgroundColor: color,
                    backgroundColor: color
                });
            });

            this.chart = new Chart(ctx, {
                type: 'scatter',
                data: { datasets },
                options: {
                    animation: false,
                    tooltips: {
                        enabled: false
                    }
                }
            });
        },

        /**
         * Destroy chart.
         */
        destroyChart () {
            if (this.chart) {
                this.chart.destroy();
            }
        },

        /**
         * Initialize function.
         *
         * @return void
         */
        init: () => {
            MainController.initHandlers();
        }
    };

    MainController.init();
});

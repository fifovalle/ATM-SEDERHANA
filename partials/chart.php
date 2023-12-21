<script>
    $(window).on("load", function() {
        // ICO TOKEN (SUPPLY & DEMAND)
        var verticalBar3 = new Chartist.Bar(
            "#ico-token-supply-demand-chart", {
                labels: ["Q1 2018", "Q2 2018"],
                series: [
                    [4000, 7000]
                ],
            }, {
                axisY: {
                    labelInterpolationFnc: function(value) {
                        return value / 1000 + "k";
                    },
                    scaleMinSpace: 40,
                },
                axisX: {
                    showGrid: false,
                    labelInterpolationFnc: function(value, index) {
                        return value;
                    },
                },
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: true,
                        pointClass: "ct-point",
                    }),
                ],
            }
        );
        verticalBar3.on("draw", function(data) {
            if (data.type === "bar") {
                data.element.attr({
                    style: "stroke-width: 25px",
                    y1: 250,
                    x1: data.x1 + 0.001,
                });
                data.group.append(
                    new Chartist.Svg(
                        "circle", {
                            cx: data.x2,
                            cy: data.y2,
                            r: 12,
                        },
                        "ct-slice-pie"
                    )
                );
            }
        });
        verticalBar3.on("created", function(data) {
            var defs = data.svg.querySelector("defs") || data.svg.elem("defs");
            defs
                .elem("linearGradient", {
                    id: "barGradient3",
                    x1: 0,
                    y1: 0,
                    x2: 0,
                    y2: 1,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "rgb(28, 120, 255)",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "rgb(41, 188, 253)",
                });
            return defs;
        });

        // TOKEN DISTRIBUTION
        var chart = new Chartist.Pie(
            "#token-distribution-chart", {
                series: [{
                        name: "Saldo Awal",
                        className: "ct-crowdsale",
                        value: <?php echo $saldo_awal; ?>,
                    },
                    {
                        name: "Jumlah Uang Yang Tersedia",
                        className: "ct-team",
                        value: <?php echo $jumlah_uang_tersedia; ?>,
                    },
                ],

                labels: ["Saldo Awal", "Jumlah Uang Yang Tersedia"],
            }, {
                donut: true,
                startAngle: 310,
                donutSolid: true,
                donutWidth: 30,
                labelInterpolationFnc: function(value) {
                    var total = chart.data.series.reduce(function(prev, series) {
                        return prev + series.value;
                    }, 0);
                    return "Rp " + total;
                },
            }
        );

        chart.on("created", function() {
            var defs = chart.svg.elem("defs");

            defs
                .elem("linearGradient", {
                    id: "ct-crowdsale",
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "#2191ff",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "#2abbfe",
                });

            defs
                .elem("linearGradient", {
                    id: "ct-team",
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "#892ffe",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "#c37bfe",
                });

            defs
                .elem("linearGradient", {
                    id: "ct-advisors",
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "#6aecae",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "#39d98c",
                });

            defs
                .elem("linearGradient", {
                    id: "ct-project-advisors",
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "#f19686",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "#e85d44",
                });

            defs
                .elem("linearGradient", {
                    id: "ct-masternodes",
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "#e67ea5",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "#fa679d",
                });

            defs
                .elem("linearGradient", {
                    id: "ct-program",
                    x1: 0,
                    y1: 1,
                    x2: 0,
                    y2: 0,
                })
                .elem("stop", {
                    offset: 0,
                    "stop-color": "#99f3f3",
                })
                .parent()
                .elem("stop", {
                    offset: 1,
                    "stop-color": "#33d4d8",
                });
        });
        chart.on("draw", function(data) {
            if (data.type === "label") {
                if (data.index === 0) {
                    data.element.attr({
                        dx: data.element.root().width() / 2,
                        dy: data.element.root().height() / 2,
                    });
                } else {
                    data.element.remove();
                }
            }
        });
    });
</script>
<div class="svg ">
    <svg class="mountains" width="100%" viewBox="0 0 2000 400">
        <defs>
            <style type="text/css">
                .mount3 {
                    fill: snow
                }

                .mount2 {
                    fill: #feffff
                }

                .mount4 {
                    fill: #7abcf5e0
                }

                .mount1 {
                    fill: #1b6180
                }

                .snow {
                    fill: white
                }
            </style>
            <filter id="fireblur" x="0" y="0">
                <feGaussianBlur in="SourceGraphic" stdDeviation="3" />
            </filter>
            <linearGradient id="firegradient">
                <stop offset="5%" stop-color="#fd4" />
                <stop offset="95%" stop-color="red" />
            </linearGradient>
            <linearGradient id="water">
                <stop offset="5%" stop-color="#CBA8C2" />
                <stop offset="95%" stop-color="#46B0EA" />
            </linearGradient>
        </defs>
        <g id="mounts">
            <path class="mount1" d="M0 275 150 250 550 100 800 250 1200 150 1500 25 2000 300 2000 400 0 400" />
            <path class="snow" d="M 495 120 550 100 600 130 575 125 550 130 535 115" />
            <path class="snow" d="M 1380 75 1500 25 1635 100 1550 75 1500 85 1450 75" />
            <path class="mount3"
                d="M0 350 350 225 500 300 800 200 1000 275 1250 200 1500 250 1850 175 2000 250 2000 400 0 400" />
            <path class="mount2" d="M0 400 650 250 900 300 1550 250 2000 300 2000 400" />
            <path class="mount4" d="M0 350 450 300 800 350 1200 300 1500 350 1750 275 2000 200 2000 400 0 400" />
            <symbol id="trees-group">
                <use xlink:href="#tree" fill="#163546" x="1500" y="250" />
                <use xlink:href="#tree" fill="#1E1F26" x="1530" y="240" />
                <use xlink:href="#tree" fill="#1E1F26" x="1510" y="245" />
                <use xlink:href="#tree" fill="#163546" x="1520" y="245" />
                <use xlink:href="#tree" fill="#226282" x="1510" y="255" />
                <use xlink:href="#tree" fill="#226282" x="1535" y="250" />
            </symbol>
            <g>
                <use xlink:href="#trees-group" y="5" />

                <use xlink:href="#campfire" x="3075" y="545" transform="scale(0.5)"
                    filter="url(#fireblur)" />

                <use xlink:href="#trees-group" x="45" y="15" />

                <g class="lake" fill="url(#water)">
                    <ellipse cx="1480" cy="300" rx="80" ry="10" />
                    <ellipse cx="1430" cy="305" rx="50" ry="6" />
                </g>

                <use xlink:href="#trees-group" transform="translate(2990,-35) scale(-1,1.3)" />
            </g>
            <g id="sendit">
                <use xlink:href="#bear" fill="#1B0D03" x="3880" y="350" transform="scale(0.5)" />
            </g>
        </g>
    </svg>
   
    <svg class="baloon">
        <g id="baloon">
            <circle cx="50" cy="50" r="20" fill="#29ABE2" />
            <polygon points="34 62 66 62 56 75 45 75" fill="#29ABE2" />
            <path d="M45 75 Q 20 40 50 30 Q 37 40 48 75" fill="crimson" />
            <path d="M56 75 Q 80 40 50 30 Q 63 40 53 75" fill="crimson" />
            <rect x="44" y="78" width="14" height="10" ry="5" fill="#1D1E22" />
        </g>
    </svg>

    <svg class="birds" width="100px" height="100px" viewbox="-5 -5 100 100">
        <style>
        </style>
        <symbol id="bird" viewbox="-5 -5 100 100">
            <path class="wing" d="M 15 0 Q 10 0 20 10 Q 10 7 5 0" fill="#1E1F26" />
            <path class="wing" d="M 5 0 Q 5 10 10 10 Q 10 3 15 0" fill="#5A5E72" />
            <path class="corpus" d="M 0 0 15 -1 15 1" fill="#1E1F26" />
        </symbol>
        <g id="birds">
            <use xlink:href="#bird" x="0" y="0" transform="scale(0.9)" />
            <use xlink:href="#bird" x="10" y="20" />
            <use xlink:href="#bird" x="30" y="15" transform="scale(0.8)" />
        </g>
    </svg>
    <svg class="forest" viewBox="0 0 4000 1000" xmlns="http://www.w3.org/2000/svg">
        <path d="M4000 1000H0V274l12-2-6 10c9-3 14-11 19-18 2 4 6 8 3 12-3 5-10 9-10 16l-9 3c4 2 9 8 14 6l6-12c5 3 10 4 15 1-1-4-3-9-7-12v-10c8-2 16 1 23 1l2-13c-2 3-3 6-6 7l-10-3c-2-8 5-14 12-14 3-5 6-12 13-11l-5-3c5-3 10-5 16-6l1 14 7 2-1 9h7l-7 9 8 7c-1 4-4 7-7 10l12 2-1 6c-8 5-16 8-25 9 9 3 18-2 28-4-1 4 0 10-5 13-6 7-15 10-23 12 7 0 15 1 22 4 6 1 12-2 17 0l-1 9 10-16 3 3-1-9c5 3 11 3 16 0-5-1-10-4-9-10l13-1-6-7c6-1 11-2 16-5l1 15 4-2v-6l12 1c4-4 5-8 8-12l-7-8c6-3 4-10 4-16l8 1-3-5 13-4c2 8 0 16-2 23l-4 3c5 6 10 13 19 13-4 2-7 5-11 6h-6l5 12c1 10 7 19 11 28 2 6 6 8 10 12l8-4c-2-11 3-21 8-30 9 2 13 11 20 16 1 7-7 5-11 4l10 9 5-7c2 6 0 11-2 16h8c2 5 6 9 11 12v5l-5 1 1 3h12v6c7 0 12-4 17-8-8-1-14-3-21-6l-1-5h17c-7-3-16-5-19-14 6 0 10 3 15 5h10l6 6 1-14c-6 2-12 3-19 3 0-4 1-7-1-11-4-5-11-9-13-16l14 7v-3l9 2-9-13 13-4-10-15 11 5c-3-5-3-11-3-17l18 5-7 8 15-1-2 10h-7l6 7 12-6-11 16 11-3c-4 5-11 7-17 10 1 5 8 6 12 9 4-3 8-5 13-6 0 4 1 9-2 13l-13 8c-4-1-7-2-11-1l10 7-15-5v1l1 3v1c10 5 20 1 29-3-2 6-5 12-10 15 7-2 13-6 21-3-5 5-11 6-17 5v5l9-3-8 11 14-4c-2 2-3 5-6 6-5 2-10 2-12 8l12-3 12 9-2-18 5-2 1 6 1-12 4 8 8-2c-5 4-9 9-7 15l6-4 1 5c3-2 5-6 8-4 8 2 14 8 22 8l12 3-13-15h4l-7-8 5-6-6-4v-4l11 6-4-12 14 6c-1-5-3-10-3-16l9-10 2 10 8-4c-5 4-9 9-8 16l8-5v4l9-1c-4 6-6 14-10 21l19-5c-4 5-9 9-11 16l14-7c-2 5-4 10-8 14l1 8-8 7 15 1c-6 6-14 12-16 21 5-1 11-2 14-7 4-4 9-6 14-7l5 6 5-4v9c0 5-2 12 5 14 4 4 9 2 12-1l-8-10c1-4 0-9 4-11l19 2 1-13-4 9-12-4c1-3 0-8 4-9 7-4 14-11 18-19 4 0 8-1 11-3 2 6 3 12 9 15l-1 8 6-2c-1 4-3 7-6 11 5 2 9 6 15 7l12 2c-9-6-12-16-17-24l4-5-7-4 9-5 3-6 11 7-2-16 8-11 3 9 6-3-8 13 15 5-1 15c10-2 19-9 26-17l-4-2-4-14 2-8 11 2-1 6 7-2c-1 6-3 12 2 17-5 5-4 12-3 19l17-1v6l9 3-10 3 12 6c-7 9-16 2-23-3l-2 11 13-2c-2 5-5 9-9 13 3 5 10 3 15 4l1-8c7-4 14-8 18-16 3-6 10-6 15-7 1 6 3 12 9 15l-1 7 6 1-7 9 8 6-3 10 10 2-8 11h9v8l-14 12c13 3 26 4 39 5l-7-11 11 5 5-4c-4-2-7-5-8-9l13-2-7-6 17-4c0 5 0 10-3 15l9-3-8 12c7 3 15 3 22 0l-9-11 8 3-2-14 17 4-8 6 11 1-3 9c1 3 2 7 1 10 0 4-3 9 0 13 6 7 15 10 19 17 6 9 6 19 8 28 4 8 14 10 21 11l39 11c4 0 7 2 9 3l-8-16 13 7c-4-8-9-17-9-26l13 1-5-8 13 2c-4-6-15-4-17-13l14 4c-6-6-11-12-15-19 7-2 13 3 20 4-5-3-9-8-11-15l20 6-2 7c3-6 8-10 13-14l-17 4c4-2 8-4 10-8l-12 1-1-4h-8c-3-5-5-11-4-17l14 8 12-9c-6-3-13-6-18-11l11 3-11-16 11 6 7-5c-5-2-10-6-9-12h16l-9-8c6-1 14 1 18-5 1 6 2 13-2 18l12-5-11 15 13 4-9 12 9 2c5-3 10-6 15-7-2 7-9 10-13 16l-4 11c-6 1-12-1-17-3v13c7-4 16-3 23-7 3-3 6-3 10-2-5 7-13 10-20 13h12c4 0 4 5 6 7l4-5 7-1v-8l11-1c-3-4-5-9-5-14l14 2v-5h-8v-5c6-5 11-12 19-17l7 12c5 7-1 19 9 23 3-3 9-6 10-11l9-18c4-7 5-16 8-24l-9 2-8-7 10-1 10-14-7 2c3-6 0-11-1-17l1-9 12 3-1 7 8-3-3 12 5 5-5 7 1 13 18-2-2 7 9 3 1 3h-6l-2 2 11 7-12 3c-3-3-6-6-10-7l-4 10 14-2c-2 5-6 9-9 13 3 5 11 4 16 5l-10 4 18 2-4 6 11-1v-7l15 1c1-7 2-13-3-19l4-4-2-9h6c1-6 6-7 11-8 2 7 1 13-2 19l3 3-7 1c4 7 10 12 18 14l-16 5c3 5 5 11 6 17 4 12 12 22 19 32 3 7 10 4 15 5 1-4 4-7 8-9l12 9 7-4-9-2-6-15c8 3 17 7 26 8l13-5v-4-1c-6 2-13 7-20 6 4-2 8-5 13-6l-1-1-1-3-1-1c-4 1-8 2-10 6l-5-5v-1l3-2 1-1-14-1-5-9 1-12 16 9c6-2 10-6 15-10l1-2c-9-3-17-6-23-13l15 4c-5-7-11-13-15-21l16 8 8-9-8-1c-4-3-3-8-4-13l20 2c-2-5-7-8-12-11 7-1 14-3 21-2l3-6c2 8 4 17-1 24l14-7c-3 10-13 15-14 25l4-3 13 2-11 17 12 2 16-9c2 5 6 8 11 10v4l6-1c0 6-1 12 4 16l-6 7 1 13 17-1v6l10 4v-9c-8-4-17-8-20-16l5-2 12 7c7 3 15 2 22 6l-10-12c1-6-4-9-7-12l6-2c-3-4-6-7-7-12l12 7-3-12c4 1 9 3 13 6-1-5-3-11-2-16l8-8 2 7 6-1c-3 3-6 8-6 13l14 1c-1 6-1 12-6 16l1 2-5 5c7-4 14-8 22-10-3 6-10 10-11 17l13-7-7 14 1 8-8 7 15 1c-6 6-13 12-16 20l25-5-6 9c8-2 13-10 18-16l3 10-11 16-8 3 10 10c5-4 7-10 10-16l8 4 6-4-8-10 2-10 8-1v11l3-9 10 1 1-13c-2 3-3 6-6 7l-10-3c0-5 1-9 6-10 6-3 10-9 14-14 2-6 9-6 13-8l3 12 7 3-3 8h7l-6 9 8 6-6 9 10 2c6 10 13 20 17 31 1 6 7 6 12 7l-8-13a576 576 0 0111 5v-2h1c-4-5-5-11-4-17l12 6c-5-7-13-12-14-21l1-1 2-1h1l16 11 7-2c-7-6-10-15-16-21-5-5-5-12-6-18 5 5 11 10 19 10l1-10c-8-4-16-8-20-16l1-1h3l1-1 12 7c7 3 15 2 22 6l-10-12c1-6-4-8-7-11l5-3c-2-4-5-7-6-12l12 7-3-12c4 1 9 3 13 6l-2-12c-2-6 4-9 7-12l3 7 6-1c-3 3-6 8-6 13l14 1c-1 6-1 12-6 16l1 2-5 5c7-4 14-8 22-10-3 6-10 10-11 17l13-7-7 14 1 8-8 7 15 1c-6 6-13 12-16 20l25-5-6 9c8-2 13-10 18-16l3 10-11 16-8 3 10 10c5-4 7-10 10-16l8 4 6-4-8-10c0-5 2-9 4-12l7 3-1 9 3-9 10 1 1-13c-2 3-3 6-6 7l-10-3c0-5 1-9 6-10 6-3 10-9 14-14 2-6 9-6 13-8l3 12 7 3-3 8h7l-6 9 7 6-4 11h10c-1 3-3 6-6 8-6 5-13 6-20 7 9 3 18-2 27-4-1 6-3 13-9 16-5 5-12 5-18 7l21 3 17 1-5 14h-7l4 9h13-9l6-14 12 5 9-6-16-9h8l-7-12 10 5 8-6h-8l-3-8h12l-5-7c6 0 11-2 16-5l-1 15 7-2-8 12 10 2-4 11 6 2v-1l2-1h1l-3-9 8-4-6-10 7 2-2-12 15 2-6 6 12 1c0 4-3 7-7 9l5 3 10-3-7 8 5 4-13 8 9 4 11-3 5 9 5-1c-4-6-6-12-8-18 12 0 23-2 35-4-11-1-25-8-24-21 8 2 17 7 25 2-10 1-20-4-25-12l10-1-4-11 7-5c-3-3-8-8-2-11l1-4c5-3 7-9 9-14h1l2 1h1c8 2 11 11 17 15 3 3 10 6 9 12l-9 5c-3-2-4-6-6-9l2 13h9l3 8-1-9h10c1 7-3 14-7 20 5 1 10 2 15 1 2 4 2 10 7 10 3-1 6-4 8-7l-6-2-9-17c-1-3 1-5 2-8 5 6 9 12 17 15l-6-9 23 5c0-9-9-13-14-19 5 0 10-2 15-1l-8-6 1-9c-4-4-6-8-8-12l13 6c-1-7-8-10-10-16 7 2 15 5 21 9-5-5-9-13-9-21l13-2c-1-5-3-9-7-13l6 2 4-8 1 9 2-3 4 2-2 16 10-3v9c5-2 9-6 11-11 7 3 13 7 19 12 5-8 16-8 19-16l-15-5c-5-2-10-7-14-12l17 6c-3-10-12-16-17-25 8 2 14 7 20 11l3-6c-1-5-4-9-7-13 1-4 1-7-1-11 8 3 16 3 25 2-3-6-10-9-16-13 6-1 14 2 18-3l9 3 2-10c4 5 3 12 4 18 0 5-4 9-6 13l19-10c-3 10-11 17-17 24l10 5h11c-4 8-10 15-15 22 6 0 11 0 16 3 6-6 13-10 21-12-1 3-1 8-4 11-7 5-14 10-19 17l1 14c-10 2-21 1-30-4v20l11-2-5-6 21 3 14-10 8 3-8 10c-7 3-15 4-21 10 9-1 19-2 27 2l-1 5c-8 3-16 5-24 10l-8-2c4 5 8 12 15 13h20c-9 5-21 3-29 11l22 8-17 1 1 7-7-7c1 5 4 9 7 11l-1 5c-5-3-12-6-18-3l7 6c8 6 18 2 26 5l5-9h10l-5-8 21-1-10-6c7-1 16-1 22-8l-10-4-7-10-11-4 1-4 11-6-9-2 1-5h10l-3-9 22 2 2-16-7-9 7-4-3-15 10 2-3-7 16-4-2 10h4c-3 6-7 14-2 21l-10-2 13 16 12 2-11 7h-10l7 15-3 4 10 13-5 1c7 4 10 13 13 20 5 4 10 8 11 14 7 2 13 4 20 4l-9-4c-2-8-4-16-2-24 0-8 7-14 11-22 9 6 16 15 24 22l-8 6-7-5c3 5 7 9 12 12l5-7c5 6 1 13-2 18l12 2 1 10h10v8l-7 5 14 1c2 1 3 4 4 6 8 2 14-3 18-9-9-2-20-2-25-11 6-3 14-2 21-2-8-4-17-6-22-14l4-4c6 5 12 9 20 8 5 0 8 6 13 4l1-15c-7 4-15 4-23 4v-12c-6-7-16-11-18-21l13 6c4 4 10 1 16 1l-11-15 16-5c-5-6-10-11-14-18l15 7c-6-7-5-16-2-24l2 7c7-1 13 0 20 1l-11 10h17c0 3 2 7-1 9-2 3-6 2-10 3l9 8 14-8c-3 7-9 12-12 20l12-4c-5 7-14 10-22 13l15 11 15-9 2 6 16-9c5-6 10-14 13-22-5 5-9 11-16 13-6 1-14 1-17-5l8-10-2-5c5-4 9-8 15-10 0-5 1-9 3-13 2-5 7-7 10-11a320 320 0 01-4-1l-1-2 11-12-4-6c3-5 9-11 7-18l-8 1-3 5 1-8-5 3-6-9 17 1-3-7c5-3 9-8 13-13l-11 2 5-5-6-6 3-3c-4-6-3-13-1-20 6 0 11 4 17 4l-4 5 2 4 9-4v13l-1 1-3 1-1 1 12 6-11 10c3 6 3 12 2 18 9 1 18-2 26-1-2 3-3 7-1 10l9-1 3 7h-10l-2 3 13 5 1 4-16 7-4 9c-2 3-6 4-10 5 5 10 17 6 25 11h-13v6c8-1 17-1 25 1l-7 7 14 3-1 7h-10c3 5 8 8 13 11l-10-4-8 5-7-6c0 6 3 10 6 14-6-2-8-8-10-14h-15c1 5 1 10 5 14 3 2 6 2 9 2l-3 7 6 1-1 5c9 2 18 7 28 5l5 15c-3 2-6-3-9-4l-3 3c-4-2-8-3-13-3l6 7c-6 1-13 0-19-2 5 4 10 9 13 16l4-1 6 6-1 6c5 5 9 13 18 13 21 4 42-2 63 2-8-6-18-4-26-9-5-4-5-9-4-14l13 6 11-9c-6-2-12-5-17-10l8 1-9-13 12 6 6-5-7-3-1-8h14l-8-7c6-1 12-2 18-5 0 6 0 12-3 17l11-5-10 14 12 3-8 12c8 2 15-2 22-5-3 7-9 11-13 16l-2 10-17-3 1 12 4-1 1-4 6 1c7 1 12-7 18-4-3 6-10 9-16 11l15 3c-4 2-7 6-10 10 6 1 12 0 18-1l-5-3v-6h8l1-8 8-2-3-11c3-4 8-1 12-1l-7-6c6-6 11-15 19-18l7 14c1 7 0 15 7 19 4-4 9-7 11-12 6-12 11-24 14-37-5-1-11-2-15-5 7-2 13-7 17-13-5-7-7-16-5-24 9 1 17 9 16 19l3 3c-5 5-4 12-3 19l16-1-1 6 9 1-4 7 7 6c-4 0-7 2-10 1l-12-6-2 11 12-2c-3 4-5 9-9 13l16 3c-3 1-7 1-9 5h17l-4 5 19 8v-7c-5-4-10-7-13-13 9 3 18 7 28 9-6-6-12-15-11-24l5-7 9 4c-1-4-3-8-2-12l5-6 3 5 4-1-6 9 12 1-2 12 9-1-7 10 9-2-7 19 7 1-10 15 12-2 4 4 12-10c0 9-6 16-13 21l7 6a394 394 0 016-8l1 1h1l8-4c-3-5-5-10-4-15l16 1-12-8c6-4 11-9 15-15 2-3 6-4 9-5l9 17v17l7 1c-4 6-11 9-18 11l19-4c-1 10-11 14-19 17l23 3c6 3 12 5 19 6l-8-6c1-3 0-6-2-9l8 3c1-3-1-6-2-9l8-1-3-6h9c3 5 4 10 1 15l6 2-3 8 12-3-6 9c18 4 36 8 55 8 7-2 6-9 5-14-4 0-6 4-9 6l-2-6-9 10-7-6c-7 1-14-1-21-3 3-5 7-9 13-12 7-3 11-10 17-17 3-4 10-5 14-9 4-6 8-12 11-20-6 6-11 13-19 13-4 0-8 1-11-2-2-5 3-9 5-13l-2-5 15-10 3-12c2-5 7-8 11-11l-6-1 10-13-2-7c3-6 7-10 7-16l-8-1-4 5 1-5c-4-2-12-2-10-8 5-1 11 0 16 1l-3-7c5-3 9-8 13-12l-11 2 5-6-6-5 4-2-6-8 3-5v-8c5 0 10 2 13 5l4-1-3 8 11-2-2 17 7 3-9 10c2 6 2 12 2 18 8 1 17-1 25-2-1 3-5 7-1 10 3 1 11-1 11 5l-12 3c4 3 8 6 14 6v6c-6 0-15 5-18-2-3-3-7-4-11-5l-4 14 19-3c-1 8-8 13-14 17l11 6v9l15-2-14-6 18-4c6 5 14 9 23 6-4-3-9-4-14-5 1-7-3-12-6-19 9 5 18 8 27 10 9 3 16-4 24-5l-2-6c-8 3-15 9-25 8l2-4c5-1 11-2 15-5-2-2-4-6-7-5-5 0-8 4-10 6l-6-5 5-6-16 1-7-10c-3-5 0-12 0-17 8 2 15 6 21 11 4-1 5-6 10-7 3-2 11-4 9-9l-14-4c-6-3-10-8-14-13l17 6c-3-10-14-16-17-26l20 11c1-2 4-4 3-7-1-4-4-7-6-11l-1-12c7 3 15 3 24 2-2-7-10-9-16-13l16-1 2-4 9 5 4-11 3 18c1 5-4 9-6 13l19-8-7 13-11 10c7 5 14 7 23 6-5 8-11 15-15 23 5-1 11-3 15-6l-3 9c9-4 16-11 26-13-1 4-2 9-6 12l-20 17c2 4 5 10 1 14-10 3-21 2-29-5l-1 16c0 2-1 5 2 5 3 3 7-1 10-2l-5-5c8 1 15 3 22 2l16-10 6 4-4 6c-6 8-18 6-25 14 9-1 19-2 27 2l-1 6c-7 2-13 7-21 5l-1 4-11-1c5 5 9 12 16 13h21c-11 5-23 4-32 11l24 8-17 2 1 5-6 2 7 4-2 5c-6-3-12-5-19-4 3 3 5 6 8 7 7 6 17 2 26 5v-7l7-1-1-10 6-5-6-7 5-2 7-20c5 2 10 2 13 6 4 7 11 11 17 16 2 6-5 10-9 13h16c0 7-3 13-6 20h14c1 5 4 10 8 12 2-3 10-6 5-9-7-6-14-15-12-24l16 13-3-8 21 5c0-9-9-13-14-19l12-1c-6-7-6-17-11-25l12 4c-3-5-6-10-11-14l14 2-4-16c5-1 11-1 15 4-1-6-2-11-6-16l4 1 4-6c3 3 6 5 7 8l-2 14 10-5 8 7-3 14c-2 7-7 12-11 17 5 0 11 0 16-2 5-3 11-6 18-7-3 8-11 11-17 15l-1 8c7 0 13-3 18-5-2 11-10 21-18 30l2 6c7-4 13-9 21-12 1 11-12 13-16 22l13-5 2 7c-5 5-10 10-11 18 24-2 48-1 71-5-4-2-11-5-7-12 7 0 15-3 22-6-2-4-5-7-10-9 2-2 3-5 6-6h17c-7-7-19-6-28-7l3-5c-10-1-17-8-25-12l3-5c6 1 11-1 14-6 7 4 16 8 23 3v-7l-5-2-7 5-3-21c6-1 11-4 17-7l1 9 5-4h6c-3-5-7-11-6-18 1-4 5-7 8-10 3 2 5 5 9 6 7-1 14-5 16-12l-6 3-2-11-9 1v-5l6-3-5-8 6-7c10 5 21 5 32 6-1-3-2-7-5-8l-18-6-2-13c6-1 9-4 11-9l9 2v-7c8-6 12-14 16-22l6 5 7-8h7c1 6-1 12 1 18s10 4 14 5l-4 16 8-6 1 9c-2 4-7 6-11 9l16 10c-3 6-7 13-12 17l20 2-4 12-6 1 3-11c-4 4-5 10-8 14-8 6-18 7-27 6 9 9 23 1 33-1 6-2 12-3 13-9l16 1c0-4 1-9-1-13-2-6 0-13 0-20h5c1-5 6-7 11-7 1 8 1 17-5 23l8 10 9 2c-4 5-10 5-15 6 3 8 4 17 8 25 5 8 8 18 17 22 10 3 20 0 30 2 1-6-1-11-4-15h7l4-11-6 1-7-11 2-12 15 9c5-6 11-9 18-11-9-3-18-6-24-14l14 4-14-20 16 8 9-10-7 3c-4-4-6-10-6-16 7 1 14 3 21 0l-13-10 21-2 3-5c2 8 4 17-2 24 5-2 9-5 14-6-2 7-8 13-13 18 5 3 11 5 17 5l-11 18 12-5-1 7 12-12c11 2 21-5 32-6l-3-6 7-1-4-7 12-3c4-5 6-12 4-18-5 2-11 3-16 1l-4 7-1-8-7 9-10-6-11 4 13-8 1-4-9 1c-4-1-3-7-4-10l17-2c-3-3-7-6-7-10 9-2 19-2 27 1l1-8-15 1c6-6 15-4 22-7l7-7c-5 0-10-3-15-5l4-6c-7-6-16-10-24-13l1-5c4-1 10 0 13-4 2-2 0-5 0-7l-10 4 1-9c5 1 11 2 14-4l-5-9c10 2 20 5 30 3-1-7 0-14 2-21l-11-11 12-7-5-2c1-5 2-11 0-16l10 4 3-4-5-7 6 2c3-5 9-7 15-6l-1 10 4 3c-3 4-5 9-5 14l-4 7 8 5-15-2c4 6 10 10 15 15l-1 6 18 2c-3 2-5 6-7 9l-10-8 5 9c-5-2-12-3-14 3 2 6 7 10 9 16 0 3-3 4-4 7 5 6 12 10 13 18h-6l9 7c4 6 5 13 6 19l19 13-5 3 9 12-2 6c-6 1-11 3-17 1-8-2-13-10-18-16 2 10 8 17 13 25 4 6 13 4 17 11 6 7 11 16 20 20 7 3 12 9 16 15l12-3-1-5-10-7 1-6c8 5 16 9 25 7v-1l1-3 1-1-12-9-7 5c-8-6-17-12-19-22 11 0 20 13 32 8-4-7-11-11-18-15l-2-12c-7-1-12-5-15-11 6-1 11-3 16-6 8 8 19 15 31 11l-4-5-15-2 3-12c-6-3-11-8-9-15l13 7c7 4 14 3 20 6 5 2 12 5 16 1 6-4 12-6 18-6v-9l-8 1c-5 3-8 7-13 9h-14l1-5c7 0 15-2 21-5-1-3-2-6-5-8l-12 1-5 9c-2-3-5-6-9-8l-1-11c-4 2-8 4-13 4-5-6-9-13-12-20l3-20c4 3 9 6 14 7 7 2 9 12 18 11l1-8c9-3 20-5 22-15l-21-6c-7-4-14-9-19-16 9 1 16 6 25 7l-7-11c-5-9-17-14-18-25 11 3 18 12 27 16 3-4 5-9 6-13l5 4c2-3 2-7 1-11l-8 5-12-13 6-5-6-9c12 4 23 5 35 3-1-11-15-11-20-18h22l1-8c4 4 9 6 14 8l2-15c8 9 4 22 8 32-4 3-11 7-9 13 8-6 17-11 27-14l-11 21c-8 1-11 8-15 13l10 2 4 6c5-2 11-2 16-2-3 12-16 20-19 32 8 0 15-4 22-7-3 3-6 7-6 12 5-1 9-5 12-8 7-5 15-8 23-11l-3 11h9l6 7 6-3-6 7 4 4 11-4c-2 6-1 12 0 18l-5 1c3 4 8 6 12 8-4 4-9 8-11 13 1 7 3 14 2 21 10 1 20 0 29-3l2 4-6 8c5 3 11 3 16 2a390 390 0 00-2 4h4l-2 6-11-6 1 8h5v5l9-1 2 8-20 4 2 3-1 1-5 5 1 5-13 8c7 11 22 4 30 13l-16-1v8c10-1 22-4 31 2-4 2-7 5-9 8l18 2-2 9-6 3-6-4 5 10-12 7-9-11c1 4 0 8 2 12l8 6-9-1-4-14-18-1-3 8 8-1c2 5 3 10 9 12 11 5 24 6 37 8 5-5 10-11 13-18l-8-7c2-13 20-16 19-29l-12-4c1-9 12-11 17-18 7-8 8-20 9-31 5-11 16-18 24-27v511zm-864-313c-2 2-4 5-4 8 3-1 8-2 10-6l-6-2zm357 1l1 3 3-1c0-3-2-3-4-2zm-259-10l7 8c6-2 12-8 10-16-7 1-12 5-17 8zm-339 3c-1 1-1 3 1 3h4c2-3-3-6-5-3zm148-1v4c1 1 3 1 4-1 2-3-3-5-4-2zm318-6c2 2 2 6 5 6 2-2 2-6 3-9l-8 3zm166-1l-3 3c-1 1-2 2-1 4 3 1 8-6 4-7zm-29-2l8 7 2-8-10 1zm-242-1l6 7 6-7h-12zm-172-2c1 3 3 5 6 6l8 2c-2-6-9-6-14-8zm652-2l-2 3c0 2 1 3 2 3 3 0 3-6 0-6zm-1143-23l-1 7c-7-3-15-5-22-2 1 4 4 9 9 10 1 3 2 6 5 8 5 2 11 3 17 3-4-3-9-7-9-13 6 1 11 6 16 9l3-3-14-19h-4zm1007 13c0 3 2 5 4 7l8 5c-4-4-7-9-12-12zm-905 8l1 3 1-1c1-2 1-3-2-2zm571-20l1 7 8 1v14l6-8-2-10-13-4zm-623 18l-1 3 8-3 2-3-9 3zm860-2l1 3 1-1c1-2 1-3-2-2zm-1007-6l1 7c3 1 7 1 10-1l-11-6zm384 3v3h3c1-3 0-4-3-3zm53-4c-1 0-2 1-2 3v3c4 3 7-9 2-6zm-63-17c-4 7 2 16 10 16 7 4 15 11 23 5 0-4-5-6-8-9 1-5 5-2 7 0 4 2 8 2 12 2l2-4-8-5h-13l-8-5c0 4 2 9 4 12l-4-1c0-4-1-7-3-11-4 2-9 1-14 0zm782-6c-1 4 0 11 5 13l27 15-14-13c-2-2-2-6-5-9h-9c-2-1-4-4-4-6zm-143 23l11 5c1-3 1-7 3-10-6 0-11 1-14 5zm215 1v3h4c1-3 0-4-4-3zm-1192-5l-10-1-12 4 24 3c5-4 7-10 10-15-4 3-7 8-12 9zm833 1c-1 1 0 3 1 3h3c2-2-2-5-4-3zm-427-5l1 7c4 0 4-5 5-7l-2-1h-3-1v1zm643-7c1 6 7 10 11 14-1-7-3-14-8-19l-3 5zm-89 6l1 7 3 1v-8h-4zm212 1v4h5c3-3-2-7-5-4zm27-2c-2 1-1 3 0 4h4c2-3-2-7-4-4zm-471-19l-6 5 9-2-3 9c8-5 16-9 25-9l-5 8 5-2 1 12c7-2 14-1 20 3l3-5c2-1 5-2 4-5h-1l-2-1h-1c-11 1-18-11-29-12-7 0-13 1-19-1h-1zm63 9l-1 12 16 2 1-5-13-4c6-4 12-5 18-7-7 0-14 0-21 2zm-830 11l1 3 1-2c1-1 1-2-2-1zm1016-23c7 0 14-2 21 1v5c-7 3-14 3-20 7l-6-1c3 8 11 14 20 12l9-12c-2-6 3-11 0-17-8-2-18-2-24 5zm-1488 21c0 2 1 3 2 3l4-1c0-3-5-3-6-2zm1611-62l-3 13c5 5 10 10 17 13 9 2 14 12 21 17 9 5 16 12 23 19 4 1 4-3 4-6-5-6-8-13-14-18-9-8-3-21-9-30l-10-3c-2 4-4 8-8 9l-10-12-1 6h-6c0-3-2-6-4-9v1zm-1644 54l1 7 13 1-14-8zm1635 2c-1 2 0 3 2 4 1 2 3 2 4 2 1-3-4-7-6-6zm-133-8l4 5-4 6 7 2c0-4 2-9 5-12h7c-3-7-13-4-19-1zm-219 8c-3 2-3 3-1 4 1 1 4 1 5-1 2-3-3-4-4-3zm458-1c-2 2 0 3 2 3s4 0 4-3-5-2-6 0zm-813-3l-2 2 2 2c3-1 3-3 0-4zm-16-1l5 2 5 1c0-5-7-2-10-3zm53-9l3 11 7 1v-8c-3-3-6-4-10-4zm951 7c-1 2 1 4 3 4h4c-1-3-4-5-7-4zm-1870-27l-8 5-6-5 3 6-17 14c6 2 14 1 21 0-6 4-13 6-19 8l2 4c9-1 17-3 26-6l-1-5h1l2-1h1v-5l8-2c2-4 6-8 3-13l-13 1-3 8-5 3c3-3 6-7 6-12h-1zm601 18v8l5-6-5-2zm465 1c1 3 3 7 7 7v-8l-7 1zm259-20l-17 15c-7 2-15-1-20 5 5-1 11 0 15 3l7-5c3 5 8 8 14 9l-4-6 17-1c-1-4-6-3-9-4 5-2 12-1 16-6-5-2-9-6-10-11l11 2v-11c-6 4-13 8-20 10zm-916 21l1 5c4 1 7 0 9-3l-10-2zm-293 0c-2 1-2 2-1 3s3 2 4 1c5-2 0-7-3-4zm-211 0c-2 2-1 3 0 4l4-1c2-3-3-5-4-3zm1677-8l-2 5 12 7-10-12zm-1481 4c-2 2 2 3 3 5l7-1 3-9 10 4 1-4c-8-1-16 0-24 5zm783 4l10-2-9-7-1 9zm37-8v5l11 3-1-10-10 2zm-755-5c7 0 11 6 12 12 3-1 5-2 6-4l-6-2 4-7c-5-1-12-5-16 1zm705 10l9 2-4-10c-2 2-7 4-5 8zm781-8v6l7 3c4-2 2-6 2-9h-9zm-1828 5v3h3c1-3 0-4-3-3zm-269-5c-4 1-5 4-7 7 5 3 7-1 9-5l7 2 2-4h-11zm664-11v8l-9 2c3 2 4 6 6 9l11-1 2-3c-4 1-9 1-14-1l8-6-4-8zm-425 11l8 2 10 5c-3-8-11-11-18-7zm1944 3l7 3 7-1c-2-6-9-4-14-2zm-1686-20c2 8 7 15 12 21 3-1 6-3 9-2 7 0 14-2 21-4-5 0-10-2-14-6-4 2-9 4-14 3-6-2-10-7-14-12zm1443-16c-4 5-9 8-14 11 2 4 2 8 1 13l-5 1c-6-1-13-2-19-5l-1 16c3 1 7 2 9-2l-3-4 17 2 11-7 9-1 6-5-5-2c-1-6-6-12-2-18l-4 1zm-583 29v3c0 1 1 2 3 0 2-1 0-6-3-3zm-714-3c-2 1-2 3-2 4 1 2 2 3 4 2 3-1 2-7-2-6zm736-3c-5-1-9 1-12 3 1 8 13 9 15 1l7 3c0-6-6-12-10-7zm-997 5l-1 4 10-1c-2-2-6-2-9-3zm306-10c-1 4-2 8-7 8l-2-6-6 10c5 2 12 1 17 0 0-4 1-9-2-12zm-676-5l-3 6 6 4 2 7c1-2 2-6 1-9l-6-4 5-5-5 1zm102 8l-2 9h4v-4l7-5h-9zm19 0l9 7v-7h-9zm-156 3c-3 3-1 4 2 4 2 0 5-1 5-4h-7zm1366-2v4c0 2 2 2 3 1 3-2 0-7-3-5zm349-2l-8 1v1l-1 2 12 2v-6h-3zm654 2h2v1c-1 2-2 2-2-1zm-386 0l1 2 1-1c1-1 1-2-2-1zm-1329-7c0 4 2 5 5 7l9 2c-4-4-8-9-14-9zm1606 7c4-1 7-4 10-6v-10c-2 6-8 10-10 16zm-278-9l5 3v5c9 0 9-10 11-16-6 2-12 3-16 8zm194 3v4h4c1-4 0-5-4-4zm-1940-2c2 1 3 3 4 6l11-2 1-10c-5 1-11 3-16 6zm-207-2l14-5 2 11 11 1 6-5-22-8c-5-1-9 1-11 6zm40-1l-3 7 10 1 1-2-8-3 7-4-7 1zm153-1l4 3-6 6 10-2-1-6-7-1zm1704 0l3 8c4-1 9-2 11-6l-14-2zm-1263 1l-1 5 6 1 4-6h-9zm1557-6l1 4c4 3 9 9 14 5 0-4 2-8-1-10l-14 1zm-2207 3c-2 1-3 2-3 4s2 3 4 2c3-1 3-7-1-6zm267 1v4h3c3-2-1-6-3-4zm1904 0c-1 0-2 1-1 3 0 1 1 2 3 2 3-1 2-6-2-5zm-451 3c6 1 11 2 17 1l-3-4-14 3zm67-4l-2 2 2 2c3-1 3-2 0-4zm-1417-6l-4 3v4c3 2 7-6 4-7zm1791 6a71 71 0 002-8c-5 0-7 6-2 8zm-2236-7c1 3 5 4 7 5v-6l-7 1zm408 1v3h4c1-3 0-4-4-3zm1631-2c-1 2 0 3 1 3h3c2-3-3-5-4-3zm-1591-6v5c1 2 2 3 4 3 1-3 2-9-4-8zm-554 5l8 3-2-6-6 3zm802-4l8 5c3 1 6 0 8-4-5-2-11-1-16-1zm1604 0v4c2 1 4 2 5 0 3-3-2-7-5-4zm-61 1v3h3c0-3-1-4-3-3zm-1520 0v3l2-2c1-1 0-2-2-1zm-239-2l1 4h3c1-3 0-4-4-4zm1762-8l4 11c5-1 3-7 5-12l-9 1zm-406 10c3 0 8 3 9-2l-4-4-5 6zm-1919-6l-4 2 1 3c4 2 9-5 3-5zm398 1v3c1 1 3 1 4-1 2-3-3-5-4-2zm-217 0l8 3-2-6-6 3zm2199-1l1 3 3-1c0-3-2-3-4-2zm-2455-3v5c7-1 13-5 16-11-5 2-10 7-16 6zm2476 0l-12 1h-1v3l-1 1c6-1 12-2 15-5h-1zm-29-1c-1 2 0 3 1 4h4c2-3-3-6-5-4zm-2508-2c6 2 12 8 18 4-3-5-8-7-11-12-4-1-5 5-7 8zm2443 1v3h3c1-3 0-4-3-3zm-2103-3l-4 2 1 3c4 2 9-5 3-5zm235-7c3 6 9 9 16 10l-1-3-15-7zm1100 2c-5 2 0 10 5 8 6 0 9-4 13-8-6 2-12 1-18 0zm-992-11l2 6-3 4 3 8h6c0-5-2-9-5-13l8 1-2-8-9 2zm-48 12c-2 1-3 2-2 4 0 1 2 3 4 2 4-1 1-7-2-6zm1893-11c-3 4-8 7-13 8 9-1 15 6 23 9v-7c3-3 5-7 5-11l6-4c-7 2-14 6-21 5zM886 558v4h4c1-4-1-5-4-4zm2059-2c-2 0-3 2-4 3-1 2 0 3 2 3 4 0 7-6 2-6zm-1395 1v5c7-1 13-5 16-11-5 2-10 7-16 6zm-298-31c-7 0-13 2-19 6 8 1 16-2 23 2l-1 5-27 7c6 7 15 9 24 11-1-6 3-10 7-14l-3-3c3-4 5-8 6-13l-7-1 2-8-5 8zm791 20l-1 6c4 1 9 3 14 3-2-4-4-9-3-14l-10 5zm1673 8l3-3 1-5c-4 1-7 5-4 8zm-2435-11l-4 10 11-3-1-5-6-2zm652-1l1 10 8-2-9-8zm-718 5v3h7v-4l-7 1zm2553-13c1 5 2 10 5 15l8 1v-11c-4-4-8-7-13-5zm-1844 12v3h4c1-3 0-4-4-3zm1808-3l-2 2 2 3c3 0 3-5 0-5zm-2517-1c4 2 9 3 12-1l8-1-5-3c-6 0-13-2-15 5zm-7-1v2h2c1-1 1-2-2-2zm2347-7c2 2 1 3 0 4-2 2-4 2-5 2-7 0 3-5 5-6zm-2359 2v3l3 1c1-4 0-5-3-4zm2102-2l-2 3c0 1 0 2 2 3 4 1 5-8 0-6zm-1314-4c-5 2-13-1-15 6 3 4 8 3 12 4l2-5 9 1c-2-3-5-8-8-6zm-24 6v3h2c1-1 2-2-2-3zm-626-1l-1 3 3 1c2-2 1-4-2-4zm2498-47c-10-5-18 4-27 7l-1 3 22-2 15 4-2 9c-7 1-16 2-19 9l-10-5-1 9c-5 1-10-6-15-2 1 5 5 5 9 6l2 7c8 5 18 7 28 4v-7c6-4 10-10 15-15l-7-3c2-8 10-13 11-22l-12-3c-1 2-1 6-3 7-1-7 3-11 7-16-5 3-9 6-12 10zm-898 43l8 5-5-7-3 2zm-984 5a123 123 0 010-8c-6-1-6 9 0 8zm-637-4v3l2-1c1-2 1-3-2-2zm2408 1c4 0 9 0 13-2-5-3-8-7-11-11-3 4-2 9-2 13zm-2628-23h-18l4 7-4-2c0-3 0-6-2-8h-11l-1 4c1 4 5 8 10 8v5l4 1-3 3c7 2 15 4 23 4v-3h-9l16-5c-4-4-7-8-8-13l11 3-2-11c-4 1-7 4-10 7zm2677 13l1 6 15 3-3-12-13 3zm112-11v13l-1 1-3 2-1 1 2 2c7 1 13-2 19-4l-2-10c-5-1-11 0-14-5zm-1962 10l-2 8 3 1 3-7-4-2zm1780 6c4 3 9 4 14 2l-4-12c-5 2-7 6-10 10zm-2162-1l-1 3 3 1c2-2 1-4-2-4zm-21-3v3l2-1c1-2 1-3-2-2zm-265-34c-4 4-7 8-12 10 1 5 2 9 1 13-8 2-17 1-24-4v17l9-2-4-4 18 2c5-3 9-9 15-7 5 1 8-3 9-7l-4-1c0-5-6-12-1-17-2-1-5-3-7 0zm688 23l-4-3-10 10c8 1 16 5 24 5l15-6-1-6c-6 1-10 4-14 7-4 1-11 2-10-3l11-2c4 0 5-4 2-6-4-3-11-1-13 4zm1756 7l-1 1-1 2c2 7 10-4 2-3zm-2724-5c4 0 7 3 10 6 4 2 7 4 11 1-6-5-13-7-21-7zm-78 3c-1 0-2 2-1 3 0 1 1 2 3 2 3-1 1-7-2-5zm2864 0c2 0 3-1 4-3l1-4c-4 0-4 4-5 7zm-2423-10v9h4l3-7-7-2zm2454-1c-3-1-6-5-10-2-4 1-9 5-5 9 4 3 8 4 13 3 2-2 4-5 4-8l10 4c0-2 1-3 3-4l-10-7c-3 0-4 3-5 5zm-1877-19l-1 5 1 1h3l1 1-9 8 3 3-10 11c5-2 11-2 16-3l24-10c-6-1-11-2-16 0l-12-16zm-892 22l-11-1-11 4 25 4 9-15c-4 3-7 7-12 8zm2316 2l-2 2 2 2c3-1 3-2 0-4zm-1456-8c1 3 0 10 5 9l2-7-7-2zm1859-1l-1 7 6 2c1-3 2-7 0-10l-5 1zm-2200-2a219 219 0 011 8h3l3-7-7-2v1zm1399 1v4c1 2 2 2 4 1 2-2 0-7-4-5zm-1959 2v3h3c1-3 0-4-3-3zm238-4l1 6c6 1 11-1 14-5l-15-1zm-11 1v3h3c1-3 0-4-3-3zm-215-1v3l2-1c1-2 1-3-2-2zm-233-5l-2 6 10 1-3-7h-5zm1564-16c2 6 3 13-3 16 6 1 13-2 19-3l-4-8c-5 0-9-2-12-5zm-350 7c0 3 0 8 4 8 6 1 10-3 14-7l-18-1zm-1046-4c0 4 2 6 5 5l7-4-12-1zm2914-60l-3 1c-5 4-13 7-10 14-5 1-11 1-13 6-3 4 3 8 5 11-2 3-2 6-2 10-4 0-8 1-11 4l-9-6-4 6c-6-4-12-10-19-11-1 7-2 14 1 20l-3 7c5 5 16 4 18-4l-8-4 20 2c4 1 9 2 13 0l18-13c3-1 5 3 7 4 7-3 13-8 17-14-5-2-10 0-15 1l8-5-2-7-6 1c2-3 4-7 3-10l-5-5v-1l2-2h7c-3-2-6-5-9-5zm-2641 57v4l4 1c1-3-2-6-4-5zm-554 1c-1 2 1 3 3 4 1 0 4 0 4-2-1-3-5-4-7-2zm3194-5v2h4c2-3-3-5-4-3zm-3174-1l1 3 3-1c0-3-2-4-4-2zm-30-9l1 8h7l-1-9-7 1zm3089 0v3h3c1-3 0-4-3-3zm-1773-4h-1l-1 1-1 1 8 5-5-7zm1617-11l-4 10c7 1 14 6 22 3-7-3-8-11-5-17-3 4-8 5-13 4zm178 7v3h3c1-3 0-4-3-3zm-3249-5c-1 1 0 3 1 4h3c2-3-2-6-4-4zm3278-11c-1 6 2 13 9 12 8 0 13-6 18-10-9 1-18-1-27-2zm-3117 4l-20-3v5c8-2 16 0 23 5v-14l-3 7zm3094 4v2h1c2-1 2-2-1-2zm-50-1v3h2c1-1 2-3-2-3zm54-3c-1 1 0 2 1 3h4c2-3-3-6-5-3zm-3239 1v3l2-1c1-2 1-3-2-2zm1435-11v4c1 1 2 2 3 1 3-2 0-8-3-5zm-1414-1c-1 1-2 2-1 3 0 1 1 2 3 2 3-1 1-6-2-5zm65-35l-10 8v2l-1 3v1l11-4c1 5-3 8-6 11l2 8c-2 4-7 6-9 10 5-1 9-5 13-8l-2-4c3-4 8-8 5-14l6-9-9-4zm-216 29v4h4c2-3-2-6-4-4zm111-1v2h2c1-1 1-2-2-2zm-129-7v8c5 0 7-4 7-8h-7zm209-8l1 9c5-1 8-6 5-10l-6 1zm3170-1v3c1 2 2 2 4 1 3-2-1-7-4-4zM380 394l-1 13c5 1 9-1 13-3l-3 10 7-1 1-9-17-10zm24 14l-2 2 2 2c3-1 3-2 0-4zm3339-1v4c1 1 3 1 4-1 3-2-2-6-4-3zM297 394c-1 2-1 3 1 4 1 1 2 1 3-1 3-2-2-5-4-3zm134-8v8c5 0 8-5 5-9l-5 1zm-158-9v7l-7 3c6 0 12 2 17 5l9-5-11-1 12-4c-3-7-13-7-20-5zm44 9v4h3c1-4 0-5-3-4zm3471 1v2h1c2-1 3-2-1-2zm-3456-8v2h2c1-1 2-2-2-2zm101-1v3l2-1c1-2 1-3-2-2zm-130-8c3 2 2 7 2 10 6-1 4-8 4-12-3-2-4 1-6 2zm28-3l-4 2c-1 2-1 3 1 4 4 1 6-5 3-6zm3426 1l1 2 1-1c1-1 1-3-2-1zM200 350c3 7 7 13 12 18l2-7-14-11zm98 9l-2 3c4 1 10 6 12 0-1-4-6-2-10-3zm23 0v3h3c1-3 0-5-3-3zM26 348c-3 1-3 5-4 8 5 0 7-4 9-8l7 3 2-4c-5 0-10-1-14 1zm12-18c4 4 8 8 8 13l3-2-1-8-10-3zm-34 7l-1 5c3-1 7-2 9-5H4zm149-2c-1 2 0 3 2 3 2 1 4 0 4-2 0-3-5-3-6-1zm145-3c0 6 6 3 9 4v-5l-9 1zM51 319c1 4-1 9 2 12l11 2 6-6-19-8zm26 4v8h10l-8-6 7-3-9 1zm-58-3c-2 0-3 1-4 3-1 1-1 3 1 3 4 1 7-5 3-6zm143-3l-2 3c0 2 0 3 2 4 4 0 5-8 0-7zm4-9l1 4h5l2-5-8 1zm-121-8c-1 2 1 4 2 4 2 1 4 0 5-2-1-3-5-4-7-2zM0 254l2 2-2 2v-4z" style="fill:#020746;"/>
      
      </svg>
    <div class="invisible">
        <svg id="tree">
            <symbol id="cone">
                <polygon points="6 0 0 5 12 5" />
            </symbol>
            <g>
                <use xlink:href="#cone" x="10" />
                <use xlink:href="#cone" x="7" y="3" transform="scale(1.2)" />
                <use xlink:href="#cone" x="4" y="5" transform="scale(1.5)" />
                <use xlink:href="#cone" x="3" y="7" transform="scale(1.7)" />
                <use xlink:href="#cone" x="1.5" y="8" transform="scale(2)" />
            </g>
        </svg>

        <svg id="bear">
            <g>
                <path
                    d="
                 M10 25
                 18 22
                 20 20
                 30 20
                 40 22
                 55 30
                 80 30
                 90 40
                 92 50
                 90 60
                 92 75
                 85 80
                 70 80
                 70 75
                 75 70
                 70 60
                 62 62
                 50 62
                 48 75
                 45 80
                 35 80
                 30 75
                 35 72
                 32 60
                 30 50
                 25 38
                 15 35
                 10 30">
                    <animate id="bearhead" dur="3s" begin="3s;bearhead.end+5s" attributeName="d"
                        fill="freeze"
                        values="
                 M10 25
                 18 22
                 20 20
                 30 20
                 40 22
                 55 30
                 80 30
                 90 40
                 92 50
                 90 60
                 92 75
                 85 80
                 70 80
                 70 75
                 75 70
                 70 60
                 62 62
                 50 62
                 48 75
                 45 80
                 35 80
                 30 75
                 35 72
                 32 60
                 30 50
                 25 38
                 15 35
                 10 30;
                 
                 M12 20
                 20 18
                 22 17
                 30 18
                 40 22
                 55 30
                 80 30
                 90 40
                 92 50
                 90 60
                 92 75
                 85 80
                 70 80
                 70 75
                 75 70
                 70 60
                 62 62
                 50 62
                 48 75
                 45 80
                 35 80
                 30 75
                 35 72
                 32 60
                 30 50
                 25 38
                 15 30
                 12 25;
                
                M10 25
                 18 22
                 20 20
                 30 20
                 40 22
                 55 30
                 80 30
                 90 40
                 92 50
                 90 60
                 92 75
                 85 80
                 70 80
                 70 75
                 75 70
                 70 60
                 62 62
                 50 62
                 48 75
                 45 80
                 35 80
                 30 75
                 35 72
                 32 60
                 30 50
                 25 38
                 15 35
                 10 30;" />
                </path>
            </g>
        </svg>

        <svg id="campfire">
            <g>
                <path d="M15 30 C 0 25 20 20 15 10 Q 30 20 15 30" fill="url(#firegradient)">
                    <animate id="fire" dur="2s" repeatCount="indefinite" attributeName="d"
                        fill="freeze"
                        values="M15 30 C 0 25 20 20 15 10 Q 30 20 15 30; M15 30 C 0 25 20 20 10 10 Q 30 20 15 30; M15 30 C 0 25 20 20 15 10 Q 30 20 15 30" />
                </path>
            </g>
        </svg>

    </div>
    <footer class="bg-faded pt-70 pb-70 bg-theme-color-2">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-item footer-widget-one">
                            @if (!empty($sitesetting->logo))
                                <img class="footer-logo mb-25" src="{{ $sitesetting->logo }}" alt="">
                            @endif
                            <h6>Follow<span> Us</span></h6>
                            <ul class="social-icon bg-transparent bordered-theme">
                                @if ($sitesetting)
                                    <li><a href="{{ $sitesetting->twitter }}"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $sitesetting->instagram }}"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $sitesetting->facebook }}"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $sitesetting->youtube }}"><i class="fa fa-youtube"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $sitesetting->pinterest }}"><i class="fa fa-pinterest"
                                                aria-hidden="true"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-item">
                            <div class="footer-title">
                                <h4>Our <span>Services</span></h4>
                                <div class="border-style-3"></div>
                            </div>
                            <ul class="footer-list">
                                <li><a href="{{ route('travelwithus') }}">Why Travels With Us</a></li>
                                <li><a href="{{ route('paymentmethod') }}">Payment Method</a></li>
                                <li><a href="{{ route('termsconditions') }}"">Terms and Conditions</a></li>
                                <li><a href="{{ route('privacypolicy') }}"">Privacy Policies</a></li>
                                <li><a href="{{ route('customer.register') }}">Sign up </a></li>
                                <li><a href="{{ route('customer.login') }}">Log in account</a></li>
                            </ul>

                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-item">
                            <div class="footer-title">
                                <h4>Usefull <span>Links</span></h4>
                                <div class="border-style-3"></div>
                            </div>
                            <ul class="footer-list">
                                <li><a href="{{ route('introduction') }}">About Us</a></li>
                                <li><a href="{{ route('ourteam') }}">Team</a></li>
                                <li><a href="{{ route('allgallery') }}">Gallery</a></li>
                                <li><a href="{{ route('allblogs') }}">Blogs</a></li>
                                <li><a href="{{ route('all.reviews') }}">Read Reviews</a></li>
                                <li><a href="{{ route('contactus') }}">Contact</a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-item">
                            <div class="footer-title">
                                <h4>Quick <span>Contact</span></h4>
                                <div class="border-style-3"></div>
                            </div>
                            <ul class="footer-list footer-contact mb-10" style="color:black;font-weight:bold">
                                @if (isset($getcontact))
                                    <li><i class="pe-7s-call"></i> <a
                                            href="tel:{{ $getcontact->phone }}">{{ $getcontact->phone }}</a></li>
                                    <li><i class="pe-7s-print"></i> <a
                                            href="tel:{{ $getcontact->fax }}">{{ $getcontact->fax }}</a></li>
                                    <li><i class="pe-7s-mail"></i> <a
                                            href="mailto:{{ $getcontact->email }}">{{ $getcontact->email }}</a></li>
                                @endif
                            </ul>
                            <div class="footer-item">
                                <h6>News <span>letter</span></h6>
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <p>{{ \Session::get('success') }}</p>
                                    </div><br />
                                @endif
                                @if (\Session::has('failure'))
                                    <div class="alert alert-danger">
                                        <p>{{ \Session::get('failure') }}</p>
                                    </div><br />
                                @endif
                                <form method="post" action="{{ url('newsletter') }}">
                                    @csrf
                                    <div class="input-group subscribe-style-two">
                                        <input type="email" class="form-control input-subscribe"
                                            placeholder="Email" name="email">

                                        <span class="input-group-btn">
                                            <button class="btn btn-subscribe" type="submit">Subscribe</button>
                                        </span>

                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section class="footer-copy-right  text-white p-0">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>© {{ Carbon\Carbon::now()->format('Y') }}, All Rights Reserved, Design & Developed By:<a
                            href="https://www.dristicode.com/" target="__blank"> Dristicode Solutions Pvt. Ltd</a></p>

                </div>
            </div>
        </div>
    </section>
</div>

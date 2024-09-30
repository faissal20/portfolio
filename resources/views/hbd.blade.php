<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

        body {
            font-family: "Pacifico", cursive;
        }

        .main-section {
            margin-top: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .main-section h1 {
            font-size: 3rem;
            color: #333;
            position: relative;
        }

        .main-section h2 {
            font-size: 2.5rem;
            color: #333;
            position: relative;
        }

        .main-section p {
            font-size: 2rem;
            color: #333;
            position: relative;
        }

        .sunflower {
            position: absolute;
            top: -100%;
            right: -30%;
            width: 200px;
            width: 100px;
            height: 100px;
        }

        button{
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1;
            width: 200px;
            height: 200px;

        }

        button video{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .gift-button {
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1;
            width: 200px;
            height: 200px;
        }

        button.gift-button video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .gift-button {
            cursor: pointer;
            margin: auto;
            padding: 0.5em 1em;
            transition: background .15s linear, color .15s linear;
        }

        .gift-button:focus,
        .gift-button:hover {
        }

    

        .gift-button::-moz-focus-inner {
        border: 0;
        }

        .gift-button:active {
            transform: translateY(0.1em);
        }

        .exploding,
        .exploding:focus,
        .exploding:hover {
            background: transparent;
            color: transparent;
        }


        .exploding {
            pointer-events: none;
            position: relative;
            will-change: transform;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .exploding video{
            display: none;
        }
        

        .particle {
            position: absolute;
            top: 0;
            left: 0;
        }

        .particle--debris {
            background: #255ff4;
        }

        .particle--fire {
            border-radius: 50%;
        }

        .hidden {
            display: none;
        }

        #message {
            width: 70%;
            text-align: center;
        }
    </style>

</head>

<body>

    {{-- birthday --}}

    <div class="main-section">

        <h1>
            Happy Birthday
            <img src="{{ asset('assets/sunflower.png') }}" class="sunflower" alt="">
        </h1>
        <h2>Dear Tasnim</h2>
        <p>24 years of you making the word beautifull by existing in it</p>

        {{-- gift --}}

        <div class="gift-card" style="max-si">
            <button class="gift-button" >
                <video autoplay loop muted>
                    <source src="{{ asset('assets/Gifts.mp4') }}" type="video/mp4">
                </video>
            </button>
            <div class="hidden" id="gift-content">
                <img src="{{ asset('assets/chick.jpg') }}" alt="">
            </div>
        </div>

        <div class="hidden" id="message"> 
            <p>
                May your birthday be as beautiful as you are. <br>
                May all your wishes come true.  <br>
                May you have a great year ahead and a super amazing life (with me).  <br>
                May you always be happy and healthy.  <br>
                May you always be surrounded by people who love you (specially me). <br>
                I love you so much. <br>
                I will try to be next to you always. <br>
                I will try to make you happy always. <br>
                I will protect you always. <br>
                I will love you always.  <br>

                Happy Birthday my love. I really happy to have you in my life. your birthday is my favorite day of the year. I love you so much.
            </p>
        </div>
    </div>

    <script>
        const duration = 15 * 1000,
            animationEnd = Date.now() + duration,
            defaults = {
                startVelocity: 20,
                spread: 360,
                ticks: 60,
                zIndex: 0,
                particleCount: 90,
                shapes: ["heart"],
                colors: ["FFC0CB", "FF69B4", "FF1493", "C71585"],
            };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        const interval = setInterval(function() {
            const timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            const particleCount = 50 * (timeLeft / duration);

            // since particles fall down, start a bit higher than random
            confetti(
                Object.assign({}, defaults, {
                    particleCount,
                    origin: {
                        x: randomInRange(0.1, 0.3),
                        y: Math.random() - 0.2
                    },
                })
            );
            confetti(
                Object.assign({}, defaults, {
                    particleCount,
                    origin: {
                        x: randomInRange(0.7, 0.9),
                        y: Math.random() - 0.2
                    },
                })
            );
        }, 250);
    </script>

    <script>
        // const giftButton = document.getElementById('gift-button');
        // const giftContent = document.querySelector('.gift-content');

        // giftButton.addEventListener('click', () => {
        //     giftContent.innerHTML = `
    //     <img src="{{ asset('assets/gift.jpg') }}" alt="">
    //     `;
        // });

        document.addEventListener("DOMContentLoaded", () => {
            let button = new ExplosiveButton(".gift-button")[0];
        });

        class ExplosiveButton {
            constructor(el) {
                this.element = document.querySelector(el);
                this.width = 0;
                this.height = 0;
                this.centerX = 0;
                this.centerY = 0;
                this.pieceWidth = 0;
                this.pieceHeight = 0;
                this.piecesX = 9;
                this.piecesY = 4;
                this.duration = 1000;

                this.updateDimensions();
                window.addEventListener("resize", this.updateDimensions.bind(this));

                if (document.body.animate)
                    this.element.addEventListener("click", this.explode.bind(this, this.duration));
            }
            updateDimensions() {
                this.width = pxToEm(this.element.offsetWidth);
                this.height = pxToEm(this.element.offsetHeight);
                this.centerX = this.width / 2;
                this.centerY = this.height / 2;
                this.pieceWidth = this.width / this.piecesX;
                this.pieceHeight = this.height / this.piecesY;
            }
            explode(duration) {
                let explodingState = "exploding";

                if (!this.element.classList.contains(explodingState)) {
                    this.element.classList.add(explodingState);

                    this.createParticles("fire", 25, duration);
                    this.createParticles("debris", this.piecesX * this.piecesY, duration);
                }   

                
                setTimeout(() => {
                    const giftContent = document.querySelector('#gift-content');
                    // remove the element
                    this.element.remove();
                    giftContent.classList.remove('hidden');
                    const message = document.querySelector('#message');
                    console.log(message);
                    message.classList.remove('hidden');

                    console.log('done');
                }, duration );
            }
            createParticles(kind, count, duration) {
                for (let c = 0; c < count; ++c) {
                    let r = randomFloat(0.25, 0.5),
                        diam = r * 2,
                        xBound = this.centerX - r,
                        yBound = this.centerY - r,
                        easing = "cubic-bezier(0.15,0.5,0.5,0.85)";

                    if (kind == "fire") {
                        let x = this.centerX + randomFloat(-xBound, xBound),
                            y = this.centerY + randomFloat(-yBound, yBound),
                            a = calcAngle(this.centerX, this.centerY, x, y),
                            dist = randomFloat(1, 5);

                        new FireParticle(this.element, x, y, diam, diam, a, dist, duration, easing);

                    } else if (kind == "debris") {
                        let x = (this.pieceWidth / 2) + this.pieceWidth * (c % this.piecesX),
                            y = (this.pieceHeight / 2) + this.pieceHeight * Math.floor(c / this.piecesX),
                            a = calcAngle(this.centerX, this.centerY, x, y),
                            dist = randomFloat(4, 7);

                        new DebrisParticle(this.element, x, y, this.pieceWidth, this.pieceHeight, a, dist, duration,
                            easing);
                    }
                }
            }
        }
        class Particle {
            constructor(parent, x, y, w, h, angle, distance = 1, className2 = "") {
                let width = `${w}em`,
                    height = `${h}em`,
                    adjustedAngle = angle + Math.PI / 2;

                this.div = document.createElement("div");
                this.div.className = "particle";

                if (className2)
                    this.div.classList.add(className2);

                this.div.style.width = width;
                this.div.style.height = height;

                parent.appendChild(this.div);

                this.s = {
                    x: x - w / 2,
                    y: y - h / 2
                };
                this.d = {
                    x: this.s.x + Math.sin(adjustedAngle) * distance,
                    y: this.s.y - Math.cos(adjustedAngle) * distance
                };
            }
            runSequence(el, keyframesArray, duration = 1e3, easing = "linear", delay = 0) {
                let animation = el.animate(keyframesArray, {
                    duration: duration,
                    easing: easing,
                    delay: delay
                });
                animation.onfinish = () => {
                    let parentCL = el.parentElement.classList;

                    el.remove();

                    if (!document.querySelector(".particle"))
                        parentCL.remove(...parentCL);
                };
            }
        }

        class DebrisParticle extends Particle {
            constructor(parent, x, y, w, h, angle, distance, duration, easing) {
                super(parent, x, y, w, h, angle, distance, "particle--debris");

                let maxAngle = 1080,
                    rotX = randomInt(0, maxAngle),
                    rotY = randomInt(0, maxAngle),
                    rotZ = randomInt(0, maxAngle);

                this.runSequence(this.div, [{
                        opacity: 1,
                        transform: `translate(${this.s.x}em,${this.s.y}em) rotateX(0) rotateY(0) rotateZ(0)`
                    },
                    {
                        opacity: 1,
                    },
                    {
                        opacity: 1,
                    },
                    {
                        opacity: 1,
                    },
                    {
                        opacity: 0,
                        transform: `translate(${this.d.x}em,${this.d.y}em) rotateX(${rotX}deg) rotateY(${rotY}deg) rotateZ(${rotZ}deg)`
                    }
                ], randomInt(duration / 2, duration), easing);
            }
        }

        class FireParticle extends Particle {
            constructor(parent, x, y, w, h, angle, distance, duration, easing) {
                super(parent, x, y, w, h, angle, distance, "particle--fire");

                let sx = this.s.x,
                    sy = this.s.y,
                    dx = this.d.x,
                    dy = this.d.y;

                this.runSequence(this.div, [{
                        background: "hsl(60,100%,100%)",
                        transform: `translate(${sx}em,${sy}em) scale(1)`
                    },
                    {
                        background: "hsl(60,100%,80%)",
                        transform: `translate(${sx + (dx - sx)*0.25}em,${sy + (dy - sy)*0.25}em) scale(4)`
                    },
                    {
                        background: "hsl(40,100%,60%)",
                        transform: `translate(${sx + (dx - sx)*0.5}em,${sy + (dy - sy)*0.5}em) scale(7)`
                    },
                    {
                        background: "hsl(20,100%,40%)"
                    },
                    {
                        background: "hsl(0,0%,20%)",
                        transform: `translate(${dx}em,${dy}em) scale(0)`
                    }
                ], randomInt(duration / 2, duration), easing);
            }
        }

        function calcAngle(x1, y1, x2, y2) {
            let opposite = y2 - y1,
                adjacent = x2 - x1,
                angle = Math.atan(opposite / adjacent);

            if (adjacent < 0)
                angle += Math.PI;

            if (isNaN(angle))
                angle = 0;

            return angle;
        }

        function propertyUnitsStripped(el, property, unit) {
            let cs = window.getComputedStyle(el),
                valueRaw = cs.getPropertyValue(property),
                value = +valueRaw.substr(0, valueRaw.indexOf(unit));

            return value;
        }

        function pxToEm(px) {
            let el = document.querySelector(":root");
            return px / propertyUnitsStripped(el, "font-size", "px");
        }

        function randomFloat(min, max) {
            return Math.random() * (max - min) + min;
        }

        function randomInt(min, max) {
            return Math.round(Math.random() * (max - min)) + min;
        }
    </script>
</body>

</html>

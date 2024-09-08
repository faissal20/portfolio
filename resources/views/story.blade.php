<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Story</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nerko+One&display=swap');

        body {

            font-family: "Nerko One", cursive;
            font-weight: 200;
            font-style: normal; 
            /* background-image: url("{{ asset('assets/particlesjs-examples.gif') }}"); */
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .story {
            background: #fff;
            width: 60%;
            margin: 0 auto;
            text-align: center;
            font-size: 1.5rem;
        }

        .image {
            max-width: 200px;
            display: flex;
            margin: auto;
        }

        .image img {
            width: 100%;
        }

        .btn-yes,
        .btn-no {
            padding: 0.5rem 2rem;
            margin: 1rem;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            border-radius: 7px;
            transform: scale(1);
            transition: .2s ease-in;

        }

        .btn-yes:hover{
            transform: scale(1.2);
            background-color: green;
        }
        .btn-no:hover {
            transform: scale(1.2);
            background-color: red;
        }

        .btn-no {
            background-color: #EE957E;
            color: white;
        }

        .btn-yes {
            background-color: #A3E94A;
            color: white;
        }

        .tile {
            height: 400px;
            margin-top: 0px;
            padding: 5%;
            -webkit-transform: translateY(50px) rotate(-5deg) translateZ(0) scale(0.5);
            transform: translateY(50px) rotate(-5deg) translateZ(0) scale(1);
            -webkit-transition-delay: .6s;
            -o-transition-delay: .6s;
            transition-delay: .6s;
            -webkit-transition: .7s;
            -o-transition: .7s;
            transition: .7s;
            opacity: 0;
            /* -webkit-filter: grayscale(1); */
            /* filter: grayscale(1); */
        }

        .bottom-right.inView {
            opacity: 1;
            -webkit-transform: translateY(0px) rotate(0deg) translateZ(0) scale(1);
            transform: translateY(0px) rotate(0deg) translateZ(0) scale(1);
        }

        .inView {
            opacity: 1;
            -webkit-transform: translateY(0px) rotate(0deg) translateZ(0);
            transform: translateY(0px) rotate(0deg) translateZ(0);
        }


        @media (max-width: 768px) {
            .story {
                width: 100%;
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="story">
        <p>
            <b> This is a story of two persons let's call them the little chick 🐥 and the charming kitten 🐈. </b>
        </p>

        <div class="image">
            <img src="{{ asset('assets/kittenandchick.png') }}" alt="">
        </div>
        <div class="tile">
            <p>

                Once upon a time, a little chick 🐥 and a charming kitten 🐈 were enjoying the happiest moments of their
                lives. They spent their days together, playing and eating side by side. They were the best of friends
                and
                lovers,
                completely inseparable.
            </p>
        </div>

        <div class="image">
            <img src="{{ asset('assets/angrykitten.jpg') }}" alt="">
        </div>
        <div class="tile">
            <p>
                However, one day, the little chick 🐥 and the charming kitten 🐈 had a disagreement,
                and the kitten went to bed upset, while the little chick couldn’t sleep, troubled by thoughts of the
                fight.
                He wondered why he kept making the same mistakes and feared that maybe she no longer wanted to talk to
                him.
                He forgot that the kitten had a hard time expressing her feelings, which only amplified from his fear of
                losing
                her.

            </p>
        </div>

        <div class="image">
            <img src="{{ asset('assets/sad_little_chick.jpg') }}" alt="">
        </div>

        <div class="tile">
            <p>

                As he lay in bed, he felt a deep sadness, finding solace only in the thought of the kitten’s smile.
                Eventually, he drifted off to sleep and dreamed of her. In the dream, she was smiling at him just as she
                always did. He reached out, took her hand, and said, “I’m sorry. I love you! I want you to be mine now
                and
                forever.” She smiled back, and he woke up feeling elated, as dreams of her always brought him joy.
            </p>
        </div>

        <div class="image">
            <img src="{{ asset('assets/back_together.jpg') }}" alt="">

        </div>

        <div class="tile">
            <p>

                Determined to make things right, he went to her and expressed how deeply sorry he was for the previous
                night. He promised to always wil try to be better for her. With heartfelt sincerity, he told her, <b>My
                    dear
                    reader please read this and imagine I told you this staring directly to your eyes</b> “I love you,
                my
                beloved kitten 🐈, more than anything.”
            </p>
        </div>


        <div class="image">
            <img src="{{ asset('assets/hands.jpg') }}" alt="">

        </div>


        <div class="tile">
            <p>

                In the end, they married, had children, and lived happily in a beautiful home. Their lives were filled
                with
                joy, and they cherished every moment together. Tasnim, I hope our story can have a similar ending. But
                first, will you forgive me, my love?
            </p>
        </div>

        @if($forgive !=  true)
        <form action="{{ route('story.submit') }}" method="post">
            @csrf
            <button  type="submit" class="btn-yes" >Yes</button>
            <button  type="submit" class="btn-no">Yes</button>
        </form>
        @else
            <button class="btn-yes" disabled>Thank you !</button>
        @endif
    </div>


    <script>
        let elementsArray = document.querySelectorAll(".tile");
        console.log(elementsArray);
        window.addEventListener('scroll', fadeIn);

        function fadeIn() {
            for (var i = 0; i < elementsArray.length; i++) {
                var elem = elementsArray[i]
                var distInView = elem.getBoundingClientRect().top - window.innerHeight + 20;
                if (distInView < 0) {
                    elem.classList.add("inView");
                } else {
                    elem.classList.remove("inView");
                }
            }
        }
        fadeIn();
    </script>
</body>

</html>

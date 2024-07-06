<script setup>
import { ref } from 'vue';


const animes = [
    {
        "title": "Kimitsu no Yaiba",
        "genre": "Action",
        "rating": 9.5,
        "thumbnail": "https://cdn.myanimelist.net/images/anime/1286/99889l.jpg",
    },
    {
        "title": "One Piece",
        "genre": "Action - Comedy - Drama",
        "rating": 10.0,
        'thumbnail': 'https://cdn.myanimelist.net/images/anime/6/73245l.jpg'
    },
    {
        "title": "Attack on Titan",
        "genre": "Action - Phycological - Drama",
        "rating": 9.0,
        "thumbnail": "https://cdn.myanimelist.net/images/anime/10/47347l.jpg"
    },
    {
        "title": "Death Note",
        "genre": "Action - Horror - Mystery",
        "rating": 9.0,
        "thumbnail": "https://cdn.myanimelist.net/images/anime/9/9453l.jpg"
    },
    {
        "title": "My Hero Academia",
        "genre": "Action",
        "rating": 9.0,
        "thumbnail": "https://cdn.myanimelist.net/images/anime/10/78745l.jpg"
    },
    {
        "title": "Jujustu Kaisen",
        "genre": "Action - Drama - Fantasy",
        "rating": 9.0,
        "thumbnail": "https://cdn.myanimelist.net/images/anime/1046/107701l.jpg"
    },
    {
        "title": "Made in Abyss",
        "genre": "Action - Mystery",
        "rating": 9.7,
        "thumbnail": "https://cdn.myanimelist.net/images/anime/6/86733l.jpg"
    }
]

</script>

<template>
    <div class="container">
        <div class="animes">
            <div v-for="anime in animes" :key="anime.title" class="anime">
                <div class="card-body">
                    <div class="card-body-thumbnail" :style="{ backgroundImage: `url(${anime.thumbnail})` }"></div>
                    <div class="card-body-content">
                        <h3>{{ anime.title }}</h3>
                        <p>{{ anime.genre }}</p>
                    </div>
                    <div class="rating">{{ anime.rating }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

.container {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;

}
.animes {
    display: grid;
    grid-template-columns: repeat(3, minmax(250px, 1fr));
    gap: 2rem;
    @media screen and (max-width: 768px){
        grid-template-columns: repeat(2, minmax(130px, 1fr));
        gap: 1.5rem;
    }
    @media screen and (max-width: 480px){
        grid-template-columns: repeat(1, minmax(100px, 1fr));
        gap: 1rem;
    }
}

.anime {
    .card-body {
        position: relative;
        cursor: pointer;
        height: 400px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        padding: 1rem;
        color: white;
        text-align: center;
        box-shadow: 0 0 20px rgba(0,0,0,0.4);
        transition: all 0.3s;

        .card-body-thumbnail{
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            transition: all 0.3s;
        }


        h3 {
            opacity: 0;
            font-size: 1.5rem;
            margin: 0;
            transform: translateY(-50px);
            transition: all 0.3s;
        }
        p {
            opacity: 0;
            margin: 0;
            transform: translateY(50px);
            transition: all 0.3s 0.1s;
        }

        .rating {
            opacity: 0;
            transform: translate(10px, 0);
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 12px;
            background-color: rgba(0,0,0,0.6);
            padding: 0.5rem;
            border-radius: 12px;
            transition: all 0.3s 0.2s;
            background-color: #FFD70090;
        }

        &:hover {
            box-shadow: 0 0 20px rgba(0,0,0,0.6);
            transform: scale(1.05);
            .card-body-thumbnail {
                filter: blur(2px) brightness(0.5);
            }
            h3, p {
                opacity: 1;
                transform: translateY(0);
            }
            .rating {
                opacity: 1;
                transform: translateY(0);
            }
        }
    }

    
}
</style>
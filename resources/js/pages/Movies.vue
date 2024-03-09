<script setup>
import { ref } from 'vue';

</script>

<template>
    <div>
    <div class="movies-header">
        <h1><i class="fa-solid fa-film"></i> movies</h1>
        <div>
            <input type="text" class="input " placeholder="search for a movie">
            <button>search</button>
            <button>
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="movies-list">
        <div class="movie" >
            <div class="movie-image">
                <img src="https://via.placeholder.com/100" alt="movie image">
            </div>
            <div class="movie-details">
                <h2>title</h2>
                <p><span>categorie</span><span>categorie</span><span>categorie</span></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nemo porro placeat ducimus sed. Consequuntur et blanditiis a possimus quasi unde soluta corrupti nesciunt incidunt! Est at delectus nisi sed.</p>
                <div>
                    <h4>Who should watch it </h4>
                    <div>
                        <div>user 1</div>
                        <div>user 2</div>
                    </div>
                </div>
                <div>
                    <button>See reviews</button>
                    <button>Mark as watch</button>
                    <button>See Trailer</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<style>
.movies-list {
    margin: 1rem 0;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.movie {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px;
    display: flex;
    gap: 15px;

}
</style>
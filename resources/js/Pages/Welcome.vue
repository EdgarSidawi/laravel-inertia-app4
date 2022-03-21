<template>
    <div>

        <div class="container">
            <h3 class="header">The names of Sports</h3>

            <div class="field">
                <input class="input" type="text" v-model="sport" placeholder="Sports name"> 
                <input class="input" type="submit" value="Add" @click="saveSport"> <br>
                <span v-if="errors"> {{errors.name}} </span>
            </div>

            <div class="display">
            <ul>
                <li v-for="(sport) in sports" :key="sport.id">
                    <div>
                    {{sport.name}}
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from 'vue'
import {Inertia} from '@inertiajs/inertia'

export default {
    props:['name', 'sports', 'errors' ],

    setup() {
        let sport = ref('')

        let saveSport = () => {
            Inertia.post('/create', 
                {'name' : sport.value}
            )
            sport.value = ""
        }

        return{
            sport, saveSport,
        }

    },
}
</script>

<style >
    .container {
        max-width: 960px;
        text-align: center;
        margin: 0 auto;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .header {
        width: 100%;
        text-align: center;
        margin:  auto;
    }
    .field {
        padding: 4px 10px;
        margin: 6px auto;
        text-align: center;
    }
    .input {
        margin: 6px 10px;
    }
    .display {
        width: 1;
    }
    .add {
        color: white;
        background-color: violet;
        text-decoration: none;
        border-color: violet;
        cursor: pointer;
    }
    h1 {
        padding-top: 40px;
    }
    button {
        background-color: violet;
        color: white;
        border: none;
        height: 24px;
        cursor:pointer;
        margin:0 10px;
       
    }
    ul{
        border: 1px solid;
        border-radius: 20px;
    }

    li {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: initial;
        margin: 3px;
    }
    span {
        color: red;
        font: 10px sans-serif;
    }
</style>
<template>
  <div>
    <h1>{{count}}</h1>
   
      <div v-for="number in numbers" :key="number.id"> 
        {{number.date}}
        {{number.status}}
        {{number.count}}
        {{number.description}}
      </div>
 
    <button @click="increment">increment</button>
    <button @click="decrement">decrement</button>
    <button @click="reset">reset</button>
    <button @click="setCount">setCount</button>
  </div>
</template>

<script>
import {HTTP} from '../HTTP.js'
export default {
  data() {
    return { 
      count: 0,
      numbers: [],

    }
  },
  mounted(){
    HTTP.get('/incomeOutcome')
    .then(res => (
      console.log("res",res.data[1].count),
      this.numbers = res.data
    ))
  },
  methods: {
    increment(){
      this.count++
    },
    decrement(){
      this.count--
    },
    reset(){
      this.count = 0
    },
    setCount(){
      this.number = this.count
    }
  },
}
</script>

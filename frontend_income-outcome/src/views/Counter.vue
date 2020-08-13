<template>
  <div>
    <h1 style="color: red">{{count}}</h1>
    <h1>{{list}}</h1>
    <h1>sum: {{sum}}</h1>

    <button class="btn btn-warning" @click="increment" style="margin-right: 10px">increment</button>
    <button class="btn btn-primary" @click="decrement" style="margin-right: 10px">decrement</button>
    <button class="btn btn-danger" @click="reset" style="margin-right: 10px">reset</button>
    <button class="btn btn-success" @click="listCount" style="margin-right: 10px">addCount</button>
    <button class="btn btn-dark" @click="sumCount" style="margin-right: 10px">sum</button>
    <button class="btn btn-dark" @click="saveCount" style="margin-right: 10px">add</button>

    <br><br>
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :style="{width: count+'%'}" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{count}}%</div>
    </div>
    <div v-for="result in results" :key="result.id"> 
      {{result.date}}
      {{result.status}}
      {{result.count}}
      {{result.description}}
    </div>

    <div v-for="balance in balance" :key="balance.balance"> 
      {{balance.balance}}
    </div>
  </div>
  
</template>

<script>
import { HTTP } from '../HTTP.js'
export default {
  data() {
    return { 
      count: 0,
      setCount: 0,
      results: [],
      list:[],
      sum:0,
      balance:2000,
    }
  },

  mounted(){
    HTTP.get('/incomeOutcome')
    .then(res => (
      console.log("res",res.data),
      this.results = res.data
    )),

    HTTP.get('/balance')
    .then(res => (
      console.log("resBalance",res.data),
      this.balance = res.data
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
      this.count = 0;
      this.sum = 0;
      this.list = [];
    },
    listCount(){
      this.list.push(this.count)
    },
    sumCount(){
      this.sum = 0;
      for (let i = 0; i < this.list.length; i++) {
          this.sum += this.list[i]
      }
    },
    saveCount(){
      const myData = {
        balance:this.sum
      }
    
      HTTP.post(`/balance`,myData)
          .then(res => (
              console.log("res",res.data)
          ))
    }
  }
}
</script>

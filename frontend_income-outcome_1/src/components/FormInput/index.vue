<template>
<v-container>

  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
    
  >
         <v-menu
        ref="menu"
        v-model="menu"
        :close-on-content-click="false"
        :return-value.sync="date"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="state.date"
            label="วันที่"
            readonly
            v-bind="attrs"
            v-on="on"
            clearable
          ></v-text-field>
        </template>
        <v-date-picker v-model="state.date" no-title scrollable >
          <v-spacer></v-spacer>
          <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
          <v-btn text color="primary" @click="$refs.menu.save(state.date)">OK</v-btn>
        </v-date-picker>
      </v-menu>

    <v-select
      v-model="state.status"
      :items="items"
      label="สถานะ"
      required
    ></v-select>

    <v-text-field
      v-model="state.count"
      label="จำนวนเงิน"
      :rules="nameRules"
      required
    ></v-text-field>

    <v-text-field
      v-model="state.description"
      label="รายละเอียด"
      required
    ></v-text-field>

    <v-btn
      color="success"
      class="mr-4"
      @click="submit"
    >
      ยืนยัน
    </v-btn>
    <v-btn
      color="error"
      class="mr-4"
      @click="reset"
    >
      รีเซ็ต
    </v-btn>
   
  </v-form>

  </v-container>
  
</template>

<script>
import { API } from '../../API'
  export default {
    data: () => ({
      valid: true,
      state:{
            date: null,
            status: '',
            count: '',
            description: '',
            tmpDate:''
      },
      menu: false,
      items: [
        'รายรับ',
        'รายจ่าย',
      ],
      nameRules: [
        v => !!v || 'Count is required',
        v => (v && v.length <= 10) || 'Count must be less than 10 characters',
      ],
    }),

    methods: {
      reset () {
        this.$refs.form.reset()
      },
      submit(){
          API.post(`incomeOutcome`,this.state)
          .then(res => (
            console.log('post',res.data),
            alert("บันทึกข้อมูลเรียบร้อย"),
            this.$refs.form.reset()
          ))
          .catch(err => (
              console.log('post',err),
              alert("ข้อมูลไม่ถูกต้อง")
          ))
          
      }
    },
  }
</script>
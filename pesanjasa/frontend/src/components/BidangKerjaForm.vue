<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center><br>
    <router-link to="/bidangkerja">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Data Bidang Kerja</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Kerja</label></td>
        <td><input type="text" v-model="bidangkerja.nama_kerja"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Jenis Kerja</label></td>
        <td><input type="text"  v-model="bidangkerja.jenis_kerja" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Tarif</label></td>
        <td><input type="text" v-model="bidangkerja.tarif" class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-info" style="position:relative; left:360px;">Save</button>
    </form>
    </center>
  </div>
</template>
<script>
import {api} from '@/helper/api'

export default {
  name: 'Tambahbidangkerja',
  data () {
    return {
      bidangkerja: {
        id: null,
        nama_kerja: '',
        jenis_kerja: '',
        tarif: '',
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:83/pesanjasa/public/bidangkerja/'
      api.get(url + id).then(res => {
        this.bidangkerja = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.bidangkerja
      let url = 'http://localhost:83/pesanjasa/public/bidangkerja'

      if (this.bidangkerja.id) {
        url += '/' + this.bidangkerja.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/bidangkerja')
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>

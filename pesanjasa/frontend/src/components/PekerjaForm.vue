<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center><br>
    <router-link to="/pekerja">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Data pekerja</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama pekerja </label></td>
        <td><input type="text" v-model="pekerja.nama_lengkap"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Bidang Kerja</label></td>
        <td><input type="text"  v-model="pekerja.bidang_kerja" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Jenis Kelamin</label></td>
        <td><input type="text" v-model="pekerja.jenis_kelamin" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>No HP</label></td>
        <td><input type="text" v-model="pekerja.no_hp" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Alamat</label></td>
        <td><input type="text" v-model="pekerja.alamat" class="form-control" required></td>
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
  name: 'TambahPekerja',
  data () {
    return {
      pekerja: {
        id: null,
        nama_lengkap: '',
        bidang_kerja: '',
        jenis_kelamin: '',
        no_hp: '',
        alamat: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:83/pesanjasa/public/pekerja/'
      api.get(url + id).then(res => {
        this.pekerja = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.pekerja
      let url = 'http://localhost:83/pesanjasa/public/pekerja'

      if (this.pekerja.id) {
        url += '/' + this.pekerja.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/pekerja')
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

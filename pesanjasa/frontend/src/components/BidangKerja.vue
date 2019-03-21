<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center>
    <h1>Daftar Bidang Kerja</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:350px;">back</button>
    </router-link>
    <router-link to="/bidangkerja/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:350px;">tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>Nama Kerja</th>
        <th>Jenis Kerja</th>
        <th>Tarif</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(bidangkerja, i) in data_bidangkerja" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ bidangkerja.nama_kerja }}</td>
          <td>{{ bidangkerja.jenis_kerja }}</td>
          <td>{{ bidangkerja.tarif }}</td>
          <td>
            <router-link :to="'/bidangkerja/' + bidangkerja.id">
            <button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(bidangkerja.id)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
    </table>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'bidangkerja',
  data () {
    return {
      data_bidangkerja: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:83/pesanjasa/public/'
      let url2 = 'bidangkerja'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_bidangkerja = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:83/pesanjasa/public/bidangkerja/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
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

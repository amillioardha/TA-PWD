<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center>
    <h1>Data pekerja</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:350px;">back</button>
    </router-link>
    <router-link to="/pekerja/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:350px;">tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>Nama Pekerja</th>
        <th>Bidang Kerja</th>
        <th>Jenis Kelamin</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(pekerja, i) in data_pekerja" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ pekerja.nama_lengkap }}</td>
          <td>{{ pekerja.bidang_kerja }}</td>
          <td>{{ pekerja.jenis_kelamin }}</td>
          <td>{{ pekerja.no_hp }}</td>
          <td>{{ pekerja.alamat }}</td>
          <td>
            <router-link :to="'/pekerja/' + pekerja.id"><button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(pekerja.id)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
    </table>
    </center>
    </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'pekerja',
  data () {
    return {
      data_pekerja: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:83/pesanjasa/public/'
      let url2 = 'pekerja'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_pekerja = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:83/pesanjasa/public/'
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

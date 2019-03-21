import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Pekerja from '@/components/Pekerja'
import PekerjaForm from '@/components/PekerjaForm'
import BidangKerja from '@/components/BidangKerja'
import BidangKerjaForm from '@/components/BidangKerjaForm'

import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/pekerja',
      name: 'Pekerja',
      component: Pekerja
    },
    {
      path: '/pekerja/create',
      name: 'PekerjaCreate',
      component: PekerjaForm
    },
    {
      path: '/pekerja/:id',
      name: 'PekerjaEdit',
      component: PekerjaForm
    },
    {
      path: '/bidangkerja',
      name: 'BidangKerja',
      component: BidangKerja
    },
    {
      path: '/bidangkerja/create',
      name: 'BidangCreate',
      component: BidangKerjaForm
    },
    {
      path: '/bidangkerja/:id',
      name: 'BidangKerjaEdit',
      component: BidangKerjaForm
    }
  ]
})

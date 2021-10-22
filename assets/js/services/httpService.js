// services/httpService.js
// import http from "./http-conf";
// import axios from '@/services/axios'

class HttpService {
//   getAll() {
//     return http.get("/products;
//   }

//   get(id) {
//     return http.get(`/products/${id}`);
//   }

  get(url) {
    return axios.get(url);
  }

  login(data) {
    return axios.post("/login", data);
  }

  register(data){
    return axios.post("/register", data);
  }

  post(url, data){
    return axios.post(url, data);
  }
//   update(id, data) {
//     return http.put(`/tutorials/${id}`, data);
//   }

//   delete(id) {
//     return http.delete(`/tutorials/${id}`);
//   }

//   deleteAll() {
//     return http.delete(`/tutorials`);
//   }

//   findByTitle(title) {
//     return http.get(`/tutorials?title=${title}`);
//   }
}

export default new HttpService();
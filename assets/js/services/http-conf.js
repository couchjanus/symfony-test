import axios from "axios";

// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
// axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

export default axios.create({
  baseURL: "http://localhost:8000/api",
  // withCredentials: true,
  headers: {
    // common: {
    //   'Authorization': `Bearer ${localStorage.getItem('token')}`
    // },
    'Content-Type': 'application/json',  Accept: 'application/json'
  }
});

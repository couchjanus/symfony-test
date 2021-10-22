import axios from 'axios';

// Создаем образец используя настройки по умолчанию
const instance = axios.create({
    // Установка дефолтных настроек при создании экземпляра
    baseURL: "http://localhost:8000/api",
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json'
    }
});
// Alter defaults after instance has been created
// instance.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;

export default instance;

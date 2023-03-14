import axios from 'axios'
const token = document.head.querySelector('meta[name="csrf-token"]');
axios.interceptors.request.use(config => {
    config.headers['X-CSRF-TOKEN'] = token.content;
    return config;
});
export default axios;

import store from './index';
import http from "@/services/httpService";

export default {
    namespaced: true,
    state:{
        token: null,
        user: null
    },
    getters:{
        isAuthenticated(state){
            return state.token && state.user
        },
        getUser(state){
            return state.user
        },
        getToken(state){
            return state.token
        }
    },
    mutations:{
        // `state` указывает на локальное состояние модуля
        setToken(state, token){
            state.token = token
        },
        setUser(state, user){
            state.user = user
        }
    },
    actions:{
        async login({dispatch}, credentails){
            store.commit('setLoading', true)
            let response = await http.login(credentails)
                 .catch((e)=>{
                    store.commit('setLoading', false);
                    console.log(e);
                });
            return dispatch('attempt', response.data.token)
        },
        async attempt({commit, state}, token){
            // обработка успешного исхода
            if(token){
                commit('setToken', token)
            }
            // обработка неудачного исхода
            if(!state.token){
                return
            }
            // вызов асинхронного API и инициализация нескольких мутаций:
            try{
                let response = await http.get('/profile')
                commit('setUser', JSON.parse(response.data))
            }catch(e){
                commit('setUser', null)
                commit('setToken', null)
            }
            store.commit('setLoading', false)
        },
        async register(_, form){
            store.commit('setLoading', true)
            return await http.register(form)
                .then(()=>{
                    store.commit('setLoading', false)
                })
                .catch((e)=>{
                    store.commit('setLoading', false)
                    console.log(e)
                })
        },
        logout({commit}){
            store.commit('setLoading', true)
            localStorage.removeItem('token')
            commit('setUser', null)
            commit('setToken', null)
            store.commit('setLoading', false)
        }
    }
}

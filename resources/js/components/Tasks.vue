<template>
    <div>
        <div class="row justify-content-center" v-for="tsk in tasks">
            <div
                class="col-md-1 d-flex align-items-center justify-content-center"
            >
                <svg
                    @click="tickClicked(tsk)"
                    viewBox="0 0 512 512"
                    xmlns="http://www.w3.org/2000/svg"
                    style="width: 50px; height: 50px"
                    v-if="!tsk.status"
                >
                    <path
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                    />
                </svg>
                <svg
                    @click="tickClicked(tsk)"
                    height="20px"
                    version="1.1"
                    viewBox="0 0 16 20"
                    width="16px"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    v-else
                >
                    <title />
                    <desc />
                    <defs />
                    <g
                        fill="none"
                        fill-rule="evenodd"
                        id="Page-1"
                        stroke="none"
                        stroke-width="1"
                    >
                        <g
                            fill="#000000"
                            id="Core"
                            transform="translate(-424.000000, -463.000000)"
                        >
                            <g
                                id="undo"
                                transform="translate(424.000000, 464.000000)"
                            >
                                <path
                                    d="M8,3 L8,-0.5 L3,4.5 L8,9.5 L8,5 C11.3,5 14,7.7 14,11 C14,14.3 11.3,17 8,17 C4.7,17 2,14.3 2,11 L0,11 C0,15.4 3.6,19 8,19 C12.4,19 16,15.4 16,11 C16,6.6 12.4,3 8,3 L8,3 Z"
                                    id="Shape"
                                />
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-9">
                <div class="card border-dark border-top-0">
                    <div class="card-body text-dark">
                        <div class="card-title h4">
                            <a
                                :href="url + '/' + tsk.id + '/edit'"
                                class=""
                                style="text-decoration: line-through"
                                v-if="tsk.status"
                                >{{ tsk.title }}</a
                            >
                            <a :href="url + '/' + tsk.id + '/edit'" class="" v-else>{{ tsk.title }}</a>
                        </div>
                        <div class="card-text h5">{{ tsk.content }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import test from 'node:test';
import axios from "../axios-setup";
export default {
    data() {
        return {
            url : window.location.href      
        };
    },

    mounted() {
        console.log("task comp mounted");
    },

    methods: {
        tickClicked(task) {
            console.log(task);
            let message = "";
            if (task.status) {
                message = "status to false";
            } else {
                message = "status to true";
            }
            axios
                .post(
                    "http://localhost/learning/laravel/test_project/public/task/" +
                        task.id,
                    {
                        task: message,
                    }
                )
                .then((res) => {
                    console.log(res.data);
                    window.location.reload();
                })
                .catch((e) => {
                    console.log(e);
                });
        },
    },
    props: ["tasks"],
};
</script>
<style scoped>
svg path {
    fill: green;
}
svg {
    cursor: pointer;
}
</style>

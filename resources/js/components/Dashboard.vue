<template>
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-md-10">
                <div class="card border-dark">
                    <div class="card-header h3">{{ __("dashboard") }}</div>

                    <div class="card-body h4">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session("status") }}
                        </div>
                        @else
                        {{ __('welcome ') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TestProjectDashboard",

    data() {
        return {};
    },

    mounted() {},

    methods: {},
};
</script>

<style lang="scss" scoped></style>

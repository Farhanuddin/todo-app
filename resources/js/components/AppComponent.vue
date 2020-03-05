<template>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="card px-3">
                    <div class="card-body">
                        <h6 class="card-title"style="text-align:center;font-size: 1.875rem;margin-bottom:1.625rem">Todo list App (Vue.js + Laravel)</h6>
                		<add-task></add-task>
                		<task-list></task-list>
                    </div>
                    <div style="margin-left:40em">
                        <p>Authored by Farhan uddin.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('App Component Mounted...')
        },

        data() {
            return {
                test: 'farhan'
            };
        },
    }
</script>

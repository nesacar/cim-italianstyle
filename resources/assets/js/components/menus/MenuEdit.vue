<template>
    <div id="place">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="breadcrumbs">
                        <ul class="list-group list-group-flush">
                            <li><router-link tag="a" :to="'/home'">Home</router-link></li>
                            <li><router-link tag="a" :to="'/menus'">Menus</router-link></li>
                            <li>Menu edit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row bela">
                <div class="col-md-12">
                    <div class="card">
                        <h5>Menu edit</h5>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <form @submit.prevent="submit()">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" v-model="menu.title">
                                <small class="form-text text-muted" v-if="error != null && error.title">{{ error.title[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="prefix">Prefix</label>
                                <input type="text" name="prefix" class="form-control" id="prefix" placeholder="Prefix" v-model="menu.prefix">
                                <small class="form-text text-muted" v-if="error != null && error.prefix">{{ error.prefix[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="sufix">Sufix</label>
                                <input type="text" name="sufix" class="form-control" id="sufix" placeholder="Sufix" v-model="menu.sufix">
                                <small class="form-text text-muted" v-if="error != null && error.sufix">{{ error.sufix[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="class">Class</label>
                                <input type="text" name="class" class="form-control" id="class" placeholder="Class" v-model="menu.class">
                                <small class="form-text text-muted" v-if="error != null && error.class">{{ error.class[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label>Published</label><br>
                                <switches v-model="menu.publish" theme="bootstrap" color="primary"></switches>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <!--
                    <upload-image-helper
                            :image="menu.image"
                            :defaultImage="null"
                            :titleImage="'menu'"
                            :error="error"
                            @uploadImage="upload($event)"
                            @removeRow="remove($event)"
                    ></upload-image-helper>
                    -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
    import swal from 'sweetalert2';
    import Switches from 'vue-switches';

    export default {
        data(){
          return {
              menu: {},
              error: null
          }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon,
            'switches': Switches
        },
        created(){
            this.getMenu();
        },
        methods: {
            getMenu(){
                axios.get('api/menus/' + this.$route.params.id)
                    .then(res => {
                        if(res.data.menu != null){
                            this.menu = res.data.menu;
                        }
                    })
                    .catch(e => {
                        console.log(e);
                        this.error = e.response.data.errors;
                    });
            },
            submit(){
                axios.patch('api/menus/' + this.menu.id, this.menu)
                    .then(res => {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }).catch(e => {
                        console.log(e.response);
                        this.error = e.response.data.errors;
                    });
            }
        }
    }
</script>
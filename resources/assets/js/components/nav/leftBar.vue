<template>
    <div id="leftMenu" :class="{ 'hide': hideLeftBar }" v-if="user">
        <div class="logo-holder">
            <div class="logo">
                <a :href="domain" target="_blank">
                    <img :src="domain + 'img/logo.png'" alt="Vue Admin Panel">
                </a>
            </div>
        </div>
        <ul>
            <li>
                <font-awesome-icon icon="home" />
                <router-link tag="a" :to="'/home'">Home</router-link>
            </li>
            <li :class="{ 'active': showSettingsItemActive }" :style="{ 'display': showSettingsItem ? 'block' : 'none' }">
                <font-awesome-icon icon="angle-right" />
                <a href="#" @click="changeShowSettingsItemActive()">Settings</a>
                <font-awesome-icon icon="cogs"/>
                <ul>
                    <li><router-link tag="a" :to="'/settings/1/edit'">SEO</router-link></li>
                    <li><router-link tag="a" :to="'/themes'">Theme</router-link></li>
                    <li><router-link tag="a" :to="'/menus'">Menu</router-link></li>
                </ul>
            </li>
            <li :class="{ 'active': showUsersItemActive }" :style="{ 'display': showUsersItem ? 'block' : 'none' }">
                <font-awesome-icon icon="angle-right" />
                <a href="#" @click="changeShowUsersItemActive()">Users</a>
                <font-awesome-icon icon="users" />
                <ul>
                    <li><router-link tag="a" :to="'/users'">User review</router-link></li>
                    <!--
                    <li><a href="#">Roles</a></li>
                    -->
                </ul>
            </li>
            <li>
                <font-awesome-icon icon="images" />
                <a :href="domain + 'filemanager/show'" target="_blank">Media</a>
            </li>
            <li :class="{ 'active': showProductsItemActive }" :style="{ 'display': showProductsItem ? 'block' : 'none' }">
                <font-awesome-icon icon="angle-right" />
                <a href="#" @click="changeShowProductsItemActive()">Products</a>
                <font-awesome-icon icon="shopping-cart" />
                <ul>
                    <li><router-link tag="a" :to="'/products'">Products review</router-link></li>
                    <li><router-link tag="a" :to="'/collections'">Collection review</router-link></li>
                </ul>
            </li>
            <li :class="{ 'active': showPostsItemActive }" :style="{ 'display': showPostsItem ? 'block' : 'none' }">
                <font-awesome-icon icon="angle-right" />
                <a href="#" @click="changeShowPostsItemActive()">Posts</a>
                <font-awesome-icon icon="paste" />
                <ul>
                    <li><router-link tag="a" :to="'/posts'">Post review</router-link></li>
                    <li><router-link tag="a" :to="'/categories'">Category review</router-link></li>
                </ul>
            </li>
            <!--
            <li :class="{ 'active': showNewslettersItemActive }" :style="{ 'display': showNewslettersItem ? 'block' : 'none' }">
                <font-awesome-icon icon="angle-right" />
                <a href="#" @click="changeShowNewslettersItemActive()">Newsletter</a>
                <font-awesome-icon icon="envelope" />
                <ul>
                    <li><a href="#">Newsletter review</a></li>
                    <li><a href="#">Subscriber review</a></li>
                    <li><a href="#">Banner review</a></li>
                </ul>
            </li>
            -->
            <li>
                <font-awesome-icon icon="images" />
                <router-link tag="a" :to="'/sliders'">Slider</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import { apiHost } from '../../config';
    import FontAwesomeIcon from '@fortawesome/vue-fontawesome';

    export default {
        data(){
            return {
                domain : apiHost
            }
        },
        components: {
            'font-awesome-icon': FontAwesomeIcon
        },
        computed: {
            /** auth **/
            user(){
                return this.$store.getters.getUser;
            },

            /** nav **/
            hideLeftBar(){
                return this.$store.getters.getHideLeftBar;
            },

            /** settings **/
            showSettingsItem(){
                return this.$store.getters.getShowSettingsItem;
            },
            showSettingsItemActive(){
                return this.$store.getters.getSettingsItemActive;
            },

            /** users **/
            showUsersItem(){
                return this.$store.getters.getShowUsersItem;
            },
            showUsersItemActive(){
                return this.$store.getters.getUsersItemActive;
            },

            /** posts **/
            showPostsItem(){
                return this.$store.getters.getShowPostsItem;
            },
            showPostsItemActive(){
                return this.$store.getters.getPostsItemActive;
            },

            /** products **/
            showProductsItem(){
                return this.$store.getters.getShowProductsItem;
            },
            showProductsItemActive(){
                return this.$store.getters.getProductsItemActive;
            },

            /** newsletters **/
            showNewslettersItem(){
                return this.$store.getters.getShowNewslettersItem;
            },
            showNewslettersItemActive(){
                return this.$store.getters.getNewslettersItemActive;
            },
        },
        methods: {
            /** settings **/
            changeShowSettingsItemActive(){
                this.$store.dispatch('changeSettingsItemActive');
            },

            /** users **/
            changeShowUsersItemActive(){
                this.$store.dispatch('changeUsersItemActive');
            },

            /** posts **/
            changeShowPostsItemActive(){
                this.$store.dispatch('changePostsItemActive');
            },

            /** products **/
            changeShowProductsItemActive(){
                this.$store.dispatch('changeProductsItemActive');
            },

            /** products **/
            changeShowNewslettersItemActive(){
                this.$store.dispatch('changeNewslettersItemActive');
            },
        }
    }
</script>
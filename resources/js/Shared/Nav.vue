<template>
       <header>
        <!-- header-top-area-start -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="language-area">
                            <ul>
                                <li>
                                    <img src="/web/img/flag/1.jpg" alt="flag"/>
                                    <a href="#">
                                        English
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="account-area text-right">
                            <ul>
                                <li><a href="">Sign up</a></li>
                                <li><a href="">Sign in</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top-area-end -->
        <!-- header-mid-area-start -->
        <div class="header-mid-area ptb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <div class="header-search">
                            <form action="#">
                                <input type="text" placeholder="Search entire store here..." />
                                <a href="#"><i class="fa fa-search"></i></a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-12">
                        <div class="logo-area text-center logo-xs-mrg">
                            <a href="index.html"><img src="/web/img/logo/logo.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="my-cart">
                            <ul>
                                <li>
                                    <a href="#">
                                         Dashboard
                                </a>
                                    <div class="mini-cart-sub">
                                        <div class="cart-product">
                                            <div class="single-cart">
                                                <div class="cart-img">
                                                    <a href="#"><img src="/web/img/product/1.jpg" alt="book" /></a>
                                                </div>
                                                <div class="cart-info">
                                                    <h5><a href="#">Joust Duffle Bag</a></h5>
                                                    <p>1 x £60.00</p>
                                                </div>
                                                <div class="cart-icon">
                                                    <a href="#"><i class="fa fa-remove"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-totals">
                                            <h5>Total <span>£12.00</span></h5>
                                        </div>
                                        <div class="cart-bottom">
                                            <a class="view-cart" href="cart.html">view cart</a>
                                            <a href="checkout.html">Check out</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-mid-area-end -->
        <!-- main-menu-area-start -->
        <div class="main-menu-area d-md-none d-none d-lg-block sticky-header-1" id="header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-area">
                            <nav>
                                <ul>
                                    <li class="active">
                                        <a href="index.html">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details.html">
                                            New Arrival
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details.html">
                                            Category 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details.html">
                                            Category 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="membership.html">
                                            Membership
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-menu-area-end -->
        <!-- mobile-menu-area-start -->
        <div class="mobile-menu-area d-lg-none d-block fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul id="nav">
                                    <li>
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="product-details.html">
                                            New Arrival
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details.html">
                                            Category 1
                                        </a>
                                    </li>
                                    <li>
                                        <a href="product-details.html">
                                            Category 2
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-end -->
    </header>

    

</template>

<script>
import AuthComponent from "../Pages/AuthComponent";
export default {
    name: "Nav",
    components: {AuthComponent},
    data: () => ({
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }),
    methods: {
        async handleLogout(){
            await  axios.post('/user/logout',{});
            window.location.href = "/login";
            toastr.success('Logout Successfully', 'Success');
        }
    },
    computed: {
        user() {
            return this.$page.props.auth.user
        }
    }
}
</script>

<style scoped>

</style>
